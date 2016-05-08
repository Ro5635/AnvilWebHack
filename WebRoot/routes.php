<?php

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' => ['home', 'error'], 'posts' => ['index', 'show'], 'footer' => ['std', 'error'], 'ajax' =>['getzvalue', 'inczvalue' , 'deczvalue'] , 'game' =>['play', 'claw' , 'robot' , 'land']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      $footerType = "error";
      call('pages', 'error');
    }
  } else {
    $footerType = "error";
    call('pages', 'error');
  }


    function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'posts':
        // we need the model to query the database later in the controller
        require_once('models/post.php');
        $controller = new PostsController();
      break;
      case 'footer':
       $controller = new FooterController();
       break;

       case 'ajax':
         $controller = new AJAXController();
       break;

       case 'game':
          $controller = new GameController();
       break;
    }

    $controller->{ $action }();
  }


?>