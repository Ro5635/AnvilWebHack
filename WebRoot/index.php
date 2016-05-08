<?php
  	require_once('../Connection.php');

  	
  	  // $db = Db::getInstance();
     //  $req = $db->query('Select * from TestTable');

     //  // we create a list of Post objects from the database results
     //  foreach($req->fetchAll() as $line) {
     //    echo " thing: " . $line['Number'];
     //  }

	//Thsi should be changed to explode the URL and pull the neccasaray variables as array inde
	$URL =  $_SERVER['REQUEST_URI'];

	//Spits the request URI by the '/' deliminator:
	$requestSegments =  explode('/' , $URL);

	//Controller is in index 1 as index 0 contains the URL 
	$controller = $requestSegments[1];

	//The action will have the GET request paramters attached to it in the standard fassion, these will need to be removed:
	$actionAndGETVars = explode('?', $requestSegments[2]);

	//Action at index position 0:
	$action = $actionAndGETVars[0];

	//Check that there was at least a controller and action defined:
	if(!(count($requestSegments) > 2)){
		//A minimum of a controller and an action is not defined so set to home page:
		$controller = 'pages';
    	$action     = 'home';

	}

	if($controller == 'ajax'  || $controller == 'game'){
		require_once('routes.php'); 
	}

  	require_once('views/layout.php');
?>