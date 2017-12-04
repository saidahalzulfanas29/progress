<?php 
	$server     = 'localhost';
	$username   = 'root';
	$password   = '';
	$database   = 'db_elearning';
	
	mysql_connect($server, $username, $password) OR DIE ();
	mysql_select_db($database) OR DIE ();
?>