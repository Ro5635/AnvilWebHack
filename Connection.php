<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        
      //as you may notice security is.... weak.
        self::$instance = new PDO('mysql:host=anvilhackdatabase.cnd1uqnrsv3t.eu-west-1.rds.amazonaws.com;dbname=AnvilHackDB', 'robert', '5635258123', $pdo_options);
      //NB the above details will not beyond the end of AnvilHack 
        
      }
      return self::$instance;
    }
  }
?>






