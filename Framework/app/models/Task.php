<?php

require_once("core/database/Model.php");

/**
* The Task class
*/
class Task extends Model {
  // id - number
  private $id;
  // description - text
  private $description;
  // completed - boolean - 0 => false && 1 => true
  private $completed;
  // deadline - date : text
  private $deadline;

  // Function used to get all the tasks created by the same user
  public static function getTaskByCreator($login){
    if(is_numeric($login)){
      // Get the database
      $dbh = App::get("dbh");
      // Get all the tasks from the connected user
      $stmt = $dbh->prepare("SELECT task.id, task.description, task.completed, task.deadline FROM " . App::get("config")["database"]["dbname"] . "." . mb_strtolower(get_called_class()) . " JOIN todolist.login ON todolist.task.creator = todolist.login.id WHERE todolist.login.id=:login_id");
      $stmt->bindValue(":login_id", $login);
      // get the tasks
      $stmt->execute();
      // return them
      $tasks = $stmt->fetchAll(PDO::FETCH_CLASS, get_called_class());
      return $tasks;
    }
  }

  // Function used to return the task's creator
  public static function getCreator($id){
    if(is_numeric($id)){
      $dbh = App::get("dbh");
      $stmt = $dbh->prepare("SELECT * FROM " . App::get("config")["database"]["dbname"] . "." . mb_strtolower(get_called_class()) . " WHERE id=:element_id");
      $stmt->bindValue(":element_id", $id);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC)['creator'];
    }
  }

  // Function which display the task
  public function display(){
      $display = "";

      $isCompleted = ($this->completed) ? "Oui" : "Non";

      // Table line
      $display .= "<div class=\"flex-container\">";
        // ID
        $display .= "<div>";
          $display .= "<a href='?id=$this->id'>". htmlentities($this->id) . "</a>";
        $display .= "</div>";
        // Description
        $display .= "<div>";
          $display .= htmlentities($this->description);
        $display .= "</div>";
        // Completed
        $display .= "<div>";
          $display .= $isCompleted;
        $display .= "</div>";
        // Deadline
        $display .= "<div>";
          $display .= htmlentities($this->deadline);
        $display .= "</div>";
      $display .= "</div>";

      return $display;
  }
}
