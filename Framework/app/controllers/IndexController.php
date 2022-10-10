<?php

class IndexController {

    public function index() {
      if(isset($_SESSION['user'])){
        Helper::view("index");
      } else {
        header("Location:signin");
        exit(0);
      }
    }

}
