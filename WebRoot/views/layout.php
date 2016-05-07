<?php
//Set the footertype as the standard footer:
$footerType = "Std";

//render the standard header file:
require_once('StdHeader.php');
//Render the standard top of page content (menu):
require_once('StdPageTop.php');
//Router:
require_once('routes.php'); 

//Render the page footer:
call("footer", $footerType); //call call from routes.php

//require_once('StdFooter.php');

?>

 