<?php
  require_once('connection.php');

  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'pages';
    $action     = 'home';
  }
  /*The if statement is gonna check whether we have the parameters controller and action set and store them in variables. If we do not have such parameters 
   *we just make pages the default controller and home the default action. Every request when hiting our index file is going to be routed to a controller 
   *(just a file defining a class) and an action in that controller (just a method).
   */
  require_once('views/layout.php');
?>