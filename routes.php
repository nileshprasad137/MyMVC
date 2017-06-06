<?php
    /*
     * The only part we still need is the main area of our page. We can determine what view we need to put there depending on our previously set 
     * $controller and $action variables. The routes.php file is gonna take care of that.
     */
  function call($controller, $action) {
    // require the file that matches the controller name
    require_once('controllers/' . $controller . '_controller.php');

    // create a new instance of the needed controller
    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
    }

    // call the action
    $controller->{ $action }();
  }

  // just a list of the controllers we have and their actions
  // we consider those "allowed" values
  $controllers = array('pages' => ['home', 'error']);

  // check that the requested controller and action are both allowed
  // if someone tries to access something else he will be redirected to the error action of the pages controller
  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
  
  /*
   * The in_array() function searches an array for a specific value. in_array(search,array,type) 
   * The array_key_exists(key,array) function checks an array for a specified key, and returns true if the key exists and false if the key does not exist.
   * 
   * Ok so we want our routes.php to output the html that was requested one way or another. To fetch the right view (file containing the html we need) 
   * we have 2 things: a controller name and an action name.We can write a function call that will take those 2 arguments and call the action of the 
   * controller as done in the previous code sample.
   * 
   */
?>

