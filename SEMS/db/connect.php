<?php
	define('HOST', 'localhost');
	define('USER', 'id6628571_482');
	define('PASSWROD', '482482');
	define('DB', 'id6628571_482');

	$connection=mysqli_connect(HOST, USER, PASSWROD, DB);

	if(!$connection)
		die('Database connection failed!');
?>