<?php

	/**
	*	Mysql Database Connection
	**/

	$connection = mysql_connect("localhost","root") or
		die("Database Connection Failed!".mysql_error());

	$select_db = mysql_select_db("mipis_db") or
		die("No Database Found!".mysql_error());
	/**
	*	/Mysql Database Connection
	**/
?>