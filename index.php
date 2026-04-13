<?php
include_once('conn.php');
if (isset($_GET['controller'])) {
	session_start();
	include_once('lib/helper.php');
	include_once('controllers/'.$_GET['controller'].".php");
	// Close the connection
	pg_close($conn);	
	
} else if (isset($_GET['aaa'])) {
	$url = base64_decode($_GET['aaa']);
	header('Location: '.$url);
	exit();
} else {
	require_once('controllers/login/login.php');		
}

?>
