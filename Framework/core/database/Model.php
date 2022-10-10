<?php

class Model {
  // fetch all the results
  public static function fetchAll() {
    // Connection to the database
    $dbh = App::get("dbh");
    // Prepare the query which get all elements from the database
    $stmt = $dbh->prepare("SELECT * FROM " . App::get("config")["database"]["dbname"] . "." . mb_strtolower(get_called_class()) .  " ORDER BY id ASC");
    // Execute it
    $stmt->execute();
    // Return an array created from the query
    return $stmt->fetchAll(PDO::FETCH_CLASS, get_called_class());
  }

  // fetch one element as an associative array
  public static function fetchIdAsArray($id) {
    // Connection to the database
    $dbh = App::get("dbh");
    // Prepare the query which get an element from its id
    $stmt = $dbh->prepare("SELECT * FROM " . App::get("config")["database"]["dbname"] . "." . mb_strtolower(get_called_class()) .  " WHERE id=:element_id ORDER BY id ASC");
    // Bind the id to the query
    $stmt->bindValue(":element_id", $id, PDO::PARAM_INT);
    // Execute the query
    $stmt->execute();
    // Return the element fetched
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // fetch one element as an object
  public static function fetchIdAsObject($id) {
    // Connection to the database
    $dbh = App::get("dbh");
    // Prepare the query which get an element from its id
    $stmt = $dbh->prepare("SELECT * FROM " . App::get("config")["database"]["dbname"] . "." . mb_strtolower(get_called_class()) .  " WHERE id=:element_id ORDER BY id ASC");
    // Bind the id to the query
    $stmt->bindValue(":element_id", $id, PDO::PARAM_INT);
    // Execute the query
    $stmt->execute();
    // Return the element fetched
    return $stmt->fetchAll(PDO::FETCH_CLASS, get_called_class());
  }

  // erase one element
  public static function erase($id){
    // Connection to the database
    $dbh = App::get("dbh");
    // Prepare the query which delete an element from its id
    $stmt = $dbh->prepare("DELETE FROM " . App::get("config")["database"]["dbname"] . "." . mb_strtolower(get_called_class()) ." WHERE id=:element_id");
    // Bind the id to the query
    $stmt->bindValue(":element_id", $id, PDO::PARAM_INT);
    // Execute the query
    $stmt->execute();
  }

  // Configuration over convention : the $args array has keys which matches the database's
  // modify an element
  public static function update($id, $args) {
    // Connection to the database
    $dbh = App::get("dbh");
    // Start the treatement of the query
    // Start an index at 0 to know the last element
    $index = 0;
    // Start the query as a string to add elements to it
    $query = "UPDATE " . App::get("config")["database"]["dbname"] . "." . mb_strtolower(get_called_class()) . " SET ";
    // Add the different changes to the query
    foreach ($args as $key => $value) {
        $query = $query . $key . "=:element_" . $key;
        if($index < (count($args) - 1)){
          $query = $query . ", ";
        }
        $index++;
    }
    // Add the id part
    $query = $query . " WHERE id=:element_id";
    // Prepare the query
    $stmt = $dbh->prepare($query);
    // Bind all element to the query
    foreach ($args as $key => $value) {
      $stmt->bindValue(":element_" . $key, $value);
    }
    // Bind the id
    $stmt->bindValue(":element_id", $id);
    // Execute the query
    $stmt->execute();
  }

  // save an element
  public static function save($args) {
    // Connection to the database
    $dbh = App::get("dbh");
    // Start the treatement of the query
    // Start an index at 0 to know the last element
    $index = 0;
    // Start the query as a string to add elements to it
    $query = "INSERT INTO " . App::get("config")["database"]["dbname"] . "." . mb_strtolower(get_called_class()) . " (";
    // Add the different changes to the query
    // Different columns which are going to be insert
    foreach ($args as $key => $value) {
        $query = $query . $key;
        if($index < (count($args) - 1)){
          $query = $query . ", ";
          $index++;
        } else {
          $query = $query . ") ";
          $index = 0;
        }
    }
    // And their values
    $query = $query . "VALUES (";
    foreach ($args as $key => $value) {
        $query = $query . ":element_" . $key;
        if($index < (count($args) - 1)){
          $query = $query . ", ";
          $index++;
        } else {
          $query = $query . ")";
        }
    }
    // Prepare the query
    $stmt = $dbh->prepare($query);
    // Bind all element to the query
    foreach ($args as $key => $value) {
      $stmt->bindValue(":element_" . $key, $value);
    }
    // Execute the query
    $stmt->execute();
  }
}
