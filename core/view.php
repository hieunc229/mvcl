<?php
namespace Application\View;
class View {
     
    protected $variables = array();
     
    function __construct() {

    }
 
    function set($name,$value) {
        $this->variables[$name] = $value;
    }
     
    function render($view_name,$val = null) {
        extract($this->variables);
		$urls = explode(('\\'), $view_name);
		if( file_exists(ROOT . DS . app_name . DS . 'application' . DS . 'views' . DS . $urls[0] . DS . $urls[1] . '.php') ) {
			include (ROOT . DS . app_name . DS . 'application' . DS . 'views' . DS . $urls[0] . DS . $urls[1] . '.php');
		} else {
				include(ROOT . DS . app_name . DS . 'application' . DS . 'views' . DS . 'shared' . DS . 'exception' . '.php');
		}
    }
}
