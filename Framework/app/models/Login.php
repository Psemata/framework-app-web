<?php

require_once("core/database/Model.php");

/**
* The Login class
*/
class Login extends Model {
    // id - number
    private $id;
    // name - text
    private $name;
    // firstname - text
    private $firstname;
    // email -text
    private $email;
    // password - text -- crypting !!
    private $password;
    // password - text
    private $pseudo;
    // role - bool
    private $admin;

    // Function which checks if an email is present or not
    public static function isExisting($email){
        // Connection to the database
        $dbh = App::get("dbh");
        // Prepare the query which get the element with an email
        $stmt = $dbh->prepare("SELECT * FROM " . App::get("config")["database"]["dbname"] . "." . mb_strtolower(get_called_class()) . " WHERE email=:element_email");
        // Bind the email to the query
        $stmt->bindValue(":element_email", $email);
        // Execute the query
        $stmt->execute();
        // Get the element from the query
        $elem = $stmt->fetch(PDO::FETCH_ASSOC);
        // if the email exist, return true / false
        return !empty($elem);
    }

    // Function which returns an element's id by its email
    public static function getIDByEmail($email){
      // Connection to the database
      $dbh = App::get("dbh");
      // Prepare the query which get the element with an email
      $stmt = $dbh->prepare("SELECT * FROM " . App::get("config")["database"]["dbname"] . "." . mb_strtolower(get_called_class()) . " WHERE email=:element_email");
      // Bind the email to the query
      $stmt->bindValue(":element_email", $email);
      // Execute the query
      $stmt->execute();
      // Get the element from the query
      $elem = $stmt->fetch(PDO::FETCH_ASSOC);
      // return the user's id
      return $elem['id'];
    }

    // Function which compares the password entered and the password in the database
    public static function comparePassword($email, $password){
      // Connection to the database
      $dbh = App::get("dbh");
      // Prepare the query which get the element with an email
      $stmt = $dbh->prepare("SELECT * FROM " . App::get("config")["database"]["dbname"] . "." . mb_strtolower(get_called_class()) . " WHERE email=:element_email");
      // Bind the email to the query
      $stmt->bindValue(":element_email", $email);
      // Execute the query
      $stmt->execute();
      // Get the element from the query
      $elem = $stmt->fetch(PDO::FETCH_ASSOC);
      // return true if the password is the same, false otherwise
      return password_verify($password, $elem['password']);
    }
}
?>
