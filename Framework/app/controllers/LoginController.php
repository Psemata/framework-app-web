<?php

require_once("app/models/Login.php");

class LoginController {
  public function signIn(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $error = [1,"login"];
      if(isset($_POST['email']) && isset($_POST['password'])){
        if(Login::isExisting($_POST['email'])){
          if(Login::comparePassword($_POST['email'], $_POST['password'])){
            $_SESSION['user'] = Login::getIDByEmail($_POST['email']);
            file_put_contents("core/logs_logins.txt", "\n[" . date("Y-m-d H:i:s") . "] - Connexion de l'utilisateur - id : " . $_SESSION['user'], FILE_APPEND);
            header("Location:tasks");
            exit(0);
          } else {
            Helper::view("sign_in", $error);
          }
        } else {
          Helper::view("sign_in", $error);
        }
      }
    } else {
      Helper::view("sign_in");
    }
  }

  public function createAccount(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check is the checkbox is checked or not
        if(!isset($_POST['admin'])){
           $_POST['admin'] = 0;
        } else {
           $_POST['admin'] = intval($_POST['admin']);
        }
        // if the account already exists
        if(Login::isExisting($_POST['email'])){
          $error = [2, "create"];
          Helper::view("create_account", $error);
        } else {
          if(isset($_POST['password']) && isset($_POST['email'])){
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            Login::save($_POST);
            file_put_contents("core/logs_logins.txt", "\n[" . date("Y-m-d H:i:s") . "] - Création d'un utilisateur", FILE_APPEND);
            header("Location:signin");
            exit(0);
          }
        }
    }else{
      Helper::view("create_account");
    }
  }

  public function disconnect(){
    if(isset($_SESSION['user'])){
      $_SESSION = [];
      header("Location:signin");
      exit(0);
    } else {
      header("Location:signin");
      exit(0);
    }
  }
}
