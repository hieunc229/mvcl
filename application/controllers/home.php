<?php
namespace Application\Controller;
require_once(ROOT . DS . app_name . DS . 'core' . DS . 'controller.php');
class Home extends Controller {
	
	public function __construct($controller,$action) {
		// Load core controller functions
		parent::__construct($controller, $action);
		
	}
	
	public function index() {
		// Load search page
		$this->get_view()->render('home\index');
	}

}