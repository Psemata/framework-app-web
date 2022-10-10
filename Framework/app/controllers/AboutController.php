<?php

class AboutController {
    public function index() {
      if(isset($_SESSION['user'])){
        $company = "HE-Arc";
        return Helper::view("about", ['company' => $company]);
      } else {
        header("Location:signin");
        exit(0);
      }
    }
}
