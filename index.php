<?php
	// Directory separator is set up here because
	// separators are different on Linux and Windows operating systems
	define('app_name', 'me-mvcl');
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', dirname(dirname(__FILE__)));
	define('DEVELOPMENT_ENVIRONMENT', TRUE);
	define('ROLE','Visiter');
	$url = isset($_GET['url']) ? $_GET['url'] : 'home/index';
	require_once(ROOT . DS . app_name . DS . 'core' . DS . 'bootstrap.php');