<?php
  class PagesController {
    public function home() {
      $first_name = 'robert';
      $last_name  = 'curran';
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>