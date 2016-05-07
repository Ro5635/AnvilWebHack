<?php
//Standard footer for most use cases:
  class FooterController {
    public function std() {
      $first_name = 'robert';
      $last_name  = 'curran';
      require_once('views/StdFooter.php');
    }

//Footer for display in case of an error:
    public function error() {
      require_once('views/ErrorFooter.php');
    }
  }
?>