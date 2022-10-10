<?php

require_once("app/models/Task.php");
require_once("app/models/Login.php");

class TaskController {
    public function index() {
      if(isset($_SESSION['user'])){
        // if an id is received in get, then show only one task otherwise show them all
        if(Login::fetchIdAsArray($_SESSION['user'])['admin'] == 1) {
            $tasks = [0, Task::fetchAll()];
        } else {
            $tasks = [0, Task::getTaskByCreator($_SESSION['user'])];
        }
        // Check if the user is admin or has the right to see the task
        if(isset($_GET['id'])){
          if(Task::getCreator($_GET['id']) == $_SESSION['user'] || Login::fetchIdAsArray($_SESSION['user'])['admin'] == 1){
            $tasks = [0, Task::fetchIdAsObject($_GET['id'])];
            $_SESSION['id'] = $_GET['id'];
            $_SESSION['rights'] = true;
          } else {
            $tasks[0] = 3;
            $_SESSION['rights'] = false;
            Helper::view("show_tasks", $tasks);
            exit(0);
          }
        }
        // add a lign to the logs.txt file
        file_put_contents("core/logs_tasks.txt", "\n[" . date("Y-m-d H:i:s") . "] - Visionnage des tâches", FILE_APPEND);
        // Switch to the show_tasks view and display the task(s) got from the database
        Helper::view("show_tasks", $tasks);
      } else {
        header("Location:signin");
        exit(0);
      }
    }

    // to comment
    public function addTask() {
      if(isset($_SESSION['user'])){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['description'])) {
              if(isset($_POST['completed'])) {
                $_POST['completed'] = 1;
              } else {
                $_POST['completed'] = 0;
              }
              if($_POST['deadline'] === "") {
                  $_POST['deadline'] = date('Y-m-d');
              }
              $_POST['creator'] = $_SESSION['user'];

              Task::save($_POST);
              file_put_contents("core/logs_tasks.txt", "\n[" . date("Y-m-d H:i:s") . "] - Ajout d'une tâche : id - " . strval(App::get("dbh")->lastInsertId()), FILE_APPEND);
              header("Location:tasks");
              exit(0);
          } else {
            throw new Exception("Description can't be empty.", 1);
            file_put_contents("core/logs_tasks.txt", "\n[" . date("Y-m-d H:i:s") . "] - Ajout impossible, description nécessaire", FILE_APPEND);
          }
        } else {
            // Switch to the add_task view
            Helper::view('add_task');
        }
      } else {
        header("Location:signin");
        exit(0);
      }
    }

    // Function used to update a task
    public function updateTask() {
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['description'])) {
          if(isset($_POST['completed'])) {
            $_POST['completed'] = 1;
          } else {
            $_POST['completed'] = 0;
          }
          if(isset($_SESSION['id'])){
            // update the selected task
            Task::update($_SESSION['id'], $_POST);
            file_put_contents("core/logs_tasks.txt", "\n[" . date("Y-m-d H:i:s") . "] - Modification de tâche : id - " . $_SESSION["id"], FILE_APPEND);
            // for security, unset the session value which stored the id
            unset($_SESSION['id']);
            // return to the show tasks menu
            header("Location:tasks");
            exit(0);
          }
        }
      }
    }

    // Function used to delete a task
    public function eraseTask(){
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
          Task::erase($_SESSION['id']);
          file_put_contents("core/logs_tasks.txt", "\n[" . date("Y-m-d H:i:s") . "] - Suppression de tâche : id - " . $_SESSION["id"], FILE_APPEND);
          unset($_SESSION['id']);
          header("Location:tasks");
          exit(0);
      }
    }
}
