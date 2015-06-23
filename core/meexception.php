<?php
namespace Application;
class MeException extends \Exception {
	protected $mess;
	protected $code;
	protected $advice;

	public function __construct($code = 'Me000') {
		$this->code = $code;
		parent::__construct($this->me_exception_list($code));
	}

	private function me_exception_list($code) {
		$MeExpectionObj = array(
							'Me000' => 'Default Exception',
							'Me001' => 'Invalid role access',
							'Me404' => 'URL not found',
							'Me4C4' => 'Class not found');

		return $MeExpectionObj[$code];
	}

	public static function handler($ex) {
		//echo "<b>Exception:</b> ". $ex->getMessage();
		$view = new \Application\View\View();
		$view->set('message', $ex->getMessage());
		$view->render('shared\exception',$ex->getMessage());
		
	}
}
?>