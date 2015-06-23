<?php
namespace Application;
use Application\Controller as AppController;
use Application;
class Router {
	
	public static function route($url) {
	    // Split the URL into parts
	    $url_array = explode('/',$url);
	    
	    // The first part is controller name
	   
    	if(is_dir(ROOT . DS . app_name . DS . 'application' . DS . 'controllers' . DS . $url_array[0]))
    	{
    		if(!isset($url_array[2])) {
    			// if visitor access to a folder withou controller and action, take to default action home/index
    			$controllerStr = 'Application\Controller' . DS . ucwords($url_array[0]) . DS . 'home';
    			$action = 'index';
    		} else {
	    		// if controller is inside a folder
	    		$controllerStr = 'Application\Controller' . DS . ucwords($url_array[0]) . DS . ucwords($url_array[1]);
	    		$action = $url_array[2];
	    		echo 's';
			}
    	} else {
 			if(isset($url_array[0]))
	    	{
	    		// naked controller
	    		$controllerStr = 'Application\Controller'. DS . $url_array[0];
	    		$action = $url_array[1];

	    	} else {

		    	// if controller is empty, redirect to default controller
		    	$controllerStr = 'Application\Controller\Home';
	    	}
	    }

        // The second part is the method name and if action is empty, redirect to index page
	    if(empty($action)) $action = 'index';

        // The third part are the parameters
	    $query_string = $url_array;
	 
	    $controller_name = $controllerStr;
	    $controller = ucwords($controllerStr);
	    
	    $dispatch = new $controllerStr($controller_name,$action);
	    if ((int)method_exists($controller, $action)) {
	    	$dispatch = new $controllerStr($controller_name,$action);
	        call_user_func_array(array($dispatch,$action),$query_string);
	    } else {
	       throw new Application\MeException('Me404');
	    }
	}
	
}