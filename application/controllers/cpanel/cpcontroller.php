<?php
namespace Application\Controller\Cpanel;

require_once(ROOT . DS . app_name . DS . 'core' . DS . 'role.php');

//Admin role only
\Application\Role\Role::allow('Visiter');
class CpController extends \Application\Controller {
	public function __construct($controller, $action) {
		parent::__construct($controller, $action);
	}
}
?>