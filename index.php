<?php 
// @[index/admin].php?page=CONTROLLER&action=METHOD

require_once('autoload.php');
/*
 * Get page request and params
 * Searching for page and action
 * @params bool
 **/
$page = $_GET['page'] ?? "homepage";
$action = $_GET['action'] ?? "index"; 
//$id = $func->_int($_GET['id']);

$pages = array(
	"acceptions",
	"projects",
	"documents",
	"regulations",
	"teachers",
	"contacts",
	"history",
	"clubs",
	"search"
	);

$time_start = microtime(true); 

//sample script
if(in_array($page, $pages))
	try
	{
		$page = ucfirst(strtolower($page));
		$obj = $action ? new $page($action) : new $page("index");
	}
	catch(Exception $e)
	{
		$obj = new Homepage("index");
	}
else
	$obj = new Homepage("index"); //Shoud be error page!!
		
$obj->design->display();

$time_end = microtime(true);

//dividing with 60 will give the execution time in minutes other wise seconds
$execution_time = ($time_end - $time_start);

//execution time of the script
echo '<script>console.log('.$execution_time.');</script>';