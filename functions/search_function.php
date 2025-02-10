<?php
	
	//include Files
	require_once('includes/connection.php');
	//end of include Files

	/**
	*	search function code..
	**/
	function search_query($option, $name){

		if ($option == 1) {
			
			# code...
			$query = "SELECT * FROM patient_record ";
			$query .= "WHERE student_id = '$name'";
			$result_query = confirm_query($query);
			
			return $result_query;

		} elseif ($option == 2) {
			
			# code..
			$query = "SELECT * FROM patient_record ";
			$query .= "WHERE user_position = 'faculty' AND last_name = '$name'";
            $result_query = confirm_query($query);

            return $query;
		
		} elseif ($option == 3) {
		
			# code...
			$query = "SELECT * FROM patient_record ";
			$query .= "WHERE user_position ='student' AND last_name = '$name'";
			$result_query = confirm_query($query);

			return $result_query;

		} else {

			
		}
	}

	function confirm_query($query){

		$result = mysql_query($query);
		if(mysql_num_rows($result)>0){
			return $query;
		} else {

			return false;
		}
	}
	/**
	*	/search function code..
	**/

	
?>