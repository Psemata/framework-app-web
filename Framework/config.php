<?php
// return the app's config : database
return $config = [
    "database" => [
        "dbname" => "todolist",
        "hostname" => "localhost",
        "username" => "root",
        "password" => "",
        "connectiondesc" => "mysql:host=127.0.0.1",
        "connectionport" => "3306",
        "install_prefix" => "\\awb-brunocostadiogolopes\\",
        "options" => array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    ],
    "install_prefix" => "awb-brunocostadiogolopes/Framework"
];
