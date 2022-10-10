<?php

$router->define([
  // '' => 'controllers/index.php',  // by conventions all controllers are in 'controllers' folder
  '' => 'IndexController',
  'index' => 'IndexController',
  'about' => 'AboutController',
  'tasks' => 'TaskController',
  'add_task' => 'TaskController@addTask',
  'update_task' => 'TaskController@updateTask',
  'erase_task' => 'TaskController@eraseTask',
  'signin' => 'LoginController@signIn',
  'create' => 'LoginController@createAccount',
  'disconnect' => 'LoginController@disconnect'
]);
