<?php

	/**
	* Include Files
	**/
	require_once('../includes/session.php');		
	require_once('../includes/connection.php');
	require_once('../functions/functions.php');
	/**
	* /Include Files
	**/

	/**
	* Log in Function
	**/
	if(isset($_POST['log_in'])){

		//variables
		$username = $_POST['username'];
		$password = $_POST['password'];

        $new_password = base64_encode($password);

		$msg_err = array();
		$err_flag = false;

		//validation
		if(($username == NULL) || (empty($username))){

				$msg_err[] = 'Username is missing';
				$err_flag = true;
		}

		if(($new_password == NULL) || (empty($new_password))){

				$msg_err[] = 'Password is missing';
				$err_flag = true;
		}

		$query = "SELECT id, user_name, password, name ";
		$query .= "FROM user_tbl ";
		$query .= "WHERE user_name = '$username' ";
		$query .= "AND password = '$new_password' ";
		$query .= "LIMIT 1";

		$result = mysql_query($query);

		if(mysql_num_rows($result) == 1){

			$found_user =  mysql_fetch_array($result);
			$_SESSION['user_id'] = $found_user['id'];
			$_SESSION['type'] = $found_user['user_type'];
			$_SESSION['name'] = $found_user['name'];

			header("LOCATION: ../default.php");

		} else {

			$msg_err[] = "Username and Password Incorrect";
			$err_flag = true;

			if($err_flag){
				
				$_SESSION['MSG_ERR'] = $msg_err;
				session_write_close();
				header("LOCATION: ../login.php");
				exit();
			}
			

		}

	}
	/**
	* /Log in Function
	**/

?>