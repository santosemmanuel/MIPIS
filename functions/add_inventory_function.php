<?php

	require('functions.php');
	require_once('../includes/connection.php');

	/**
	* Add Inventroy Function
	**/

	if(isset($_POST['submit_inventory'])){

        $now_date = date("Y/m/d",time());
		$option = $_POST['option'];
		$med_name = $_POST['med_name'];
		$type_med = $_POST['type_med'];
		$num_items = $_POST['num_items'];
		$month = $_POST['month'];
		$day = $_POST['day'];
		$year = $_POST['year'];
		
		$date = $year."/".$month."/".$day;
		
		$result = mysql_query("INSERT INTO inventory SET medicine_name = '$med_name', status = '$type_med', invt_type = '$option', number_items='$num_items', expr_date='$date', date_invt = '$now_date', rep_num_item = '0'");
        if(!$result){
            header("LOCATION: ../add_inventory.php?warning=1");
        } else {
            header("LOCATION: ../add_inventory.php");
        }

    }
	/**
	* //Add Inventroy Function
	**/
?>