<?php 

// Load controller and model files
require_once('controller/controller.php');
require_once('model/model.php');

// Create controller instance
$controller = new Controller();

// Start session on website
session_start();

/** URI ROUTING **/
// Routing of pages internally
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// Root Uri - modify value according to index.php location
$index = '/basic_mvc/';

/** Route processing **/
switch ($uri) 
{
	case $index:
		$controller->main();
		break;

	case $index."dashboard":
		$controller->dashboard();
		break;

	case $index."signout":
		$controller->signout();
		break;	

	default:
		header("HTTP/1.0 404 Not Found");
		echo "<h1>Page Not Found.</h1>";
		break;
}



?>