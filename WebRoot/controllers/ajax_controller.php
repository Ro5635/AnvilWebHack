<?php
  class AJAXController {
    public function createnewgame() {

    	//Create the new game on the database

    	//add new game details to the users Session variables.

      
    }

    public function getzvalue() {


    $db = Db::getInstance();
    $req = $db->query('select ZValue from GamePlay WHERE GameID = 1');

    // we create a list of Post objects from the database results
    foreach($req->fetchAll() as $line) {
        echo $line['ZValue'];
    }

	die;
    }

//Increaces the Z value by 1:
    public function inczvalue() {


    	$db = Db::getInstance();
    	$req = $db->query('select ZValue from GamePlay WHERE GameID = 1');

    	$values = $req->fetchAll();
    	$currantValue = $values[0]['ZValue'];
    
    	$NewValue = $currantValue + 1/4;

    	$req = $db->prepare('UPDATE GamePlay SET ZValue = :NewValue');
    	$req->execute(array(':NewValue' => $NewValue));	


		die;
    }

    //Decreases teh Z valeu by one:
        public function deczvalue() {


    	$db = Db::getInstance();
    	$req = $db->query('select ZValue from GamePlay WHERE GameID = 1');

    	$values = $req->fetchAll();
    	$currantValue = $values[0]['ZValue'];
    
    	$NewValue = $currantValue - 1/4;

    	$stmt = $db->prepare('UPDATE GamePlay SET ZValue = :NewValue');
    	$stmt->execute(array(':NewValue' => $NewValue ));	


		die;
    }


  }
?>