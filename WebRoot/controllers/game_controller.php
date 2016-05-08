<?php
  class GameController {
    public function play() {
      
      require_once('views/game/playgame.php');
    }

    public function claw() {
        echo file_get_contents('http://cdn.ro5635.co.uk/claw.js');
        die();
    }
    public function robot() {
      
      echo file_get_contents('http://cdn.ro5635.co.uk/robot.js');
      die();
    }
    public function land() {
      
      echo file_get_contents('http://cdn.ro5635.co.uk/land.js');
      die();
    }
   
  }
?>