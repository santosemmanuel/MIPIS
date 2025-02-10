<?php 


	/**
	*	Functions
	**/
    /**function expiration($id){

            $message_alert = array();
            $result = mysql_query("SELECT * FROM inventory WHERE id = $id");
            $field_name = mysql_fetch_array($result);
            $message = "The Medicine".$field_name['']."Has Already Expired";
            $message_alert[] = $message;

    }**/

    function view_fields_cAndt($sql_query){

        $new_arr = array();
        $arr = array();
        $a = 0;

        $result_con_num = mysql_query($sql_query);
        while($field_name = mysql_fetch_array($result_con_num)){
            $new_arr[] = $field_name['id'];
        }
        foreach($new_arr as $value){
            $result = mysql_query("SELECT * FROM patient_record WHERE id = '$value'");
            while($department = mysql_fetch_array($result)){
                $department_name = $department['department'];
                if($department_name == 'ATD'){
                    $arr[] = "ATD";
                } else if ($department_name == "ED"){
                    $arr[] = "ED";
                } else if ($department_name == "BEMD"){
                    $arr[] = "BEMD";
                }
            }
        }

        return $arr;
    }

    function calculate_num($current_date){

        $result_set = mysql_query("SELECT * FROM consultation_and_treatment WHERE user_position = 'student' AND con_date = '$current_date'");
        $result_con_and_t = mysql_num_rows($result_set);
        $result_set_1 = mysql_query("SELECT * FROM blood_pressure_taking WHERE user_position = 'student' AND con_date = '$current_date'");
        $result_bpt = mysql_num_rows($result_set_1);

        $total_num = $result_con_and_t + $result_bpt;

        return $total_num;

    }

    function calculate_num_department($count_num_bp, $count_num_ct){
           $num_result = $count_num_ct + $count_num_bp;
           $_SESSION['NUM_ATD'] = $num_result;
    }

    function faculty_num($result){
        $num_result = mysql_num_rows($result);
        return $num_result;
    }

	function month_string($month_int){
		switch($month_int){
			case '1':
				$month_string = "January";
				return $month_string;
			break;
			
			case '2':
				$month_string = "February";
				return $month_string;
			break;
			
			case '3':
				$month_string = "March";
				return $month_string;
			break;
			
			case '4':
				$month_string = "April";
				return $month_string;
			break;
			
			case '5':
				$month_string = "May";
				return $month_string;
			break;
			
			case '6':
				$month_string = "June";
				return $month_string;
			break;
			
			case '7':
				$month_string = "July";
				return $month_string;
			break;
			
			case '8':
				$month_string = "August";
				return $month_string;
			break;
			
			case '9':
				$month_string = "September";
				return $month_string;
			break;
			
			case '10':
				$month_string = "October";
				return $month_string;
			break;
			
			case '11':
				$month_string = "November";
				return $month_string;
			break;
			
			case '12':
				$month_string = "December";
				return $month_string;
			break;
		}
	}
	
	function report_month_num($month_rep_type,$department,$var_month_rep){
		$result_set = mysql_query("SELECT * FROM {$month_rep_type} WHERE department = '$department' AND con_date LIKE '$var_month_rep%'");
		$sql_num = mysql_num_rows($result_set);
		return $sql_num;
	}
	
	function report_total_num($month_reptype,$var_month_annual_rep){
		$result_set_atd = mysql_query("SELECT * FROM {$month_reptype} WHERE department = 'ATD' AND con_date LIKE '$var_month_annual_rep%'");
		$sql_num_atd = mysql_num_rows($result_set_atd);
		$result_set_bemd = mysql_query("SELECT * FROM {$month_reptype} WHERE department = 'BEMD' AND con_date LIKE '$var_month_annual_rep%'");
		$sql_num_bemd = mysql_num_rows($result_set_bemd);
		$result_set_ed = mysql_query("SELECT * FROM {$month_reptype} WHERE department = 'ED' AND con_date LIKE '$var_month_annual_rep%'");
		$sql_num_ed = mysql_num_rows($result_set_ed);
		
		$sql_num_total = $sql_num_ed + $sql_num_bemd +$sql_num_atd;
		return $sql_num_total;
	}
	
	function report_faculty_num($faculty_type, $var_annual_rep){
		$result_faculty = mysql_query("SELECT * FROM {$faculty_type} WHERE user_position = 'faculty' and con_date LIKE '$var_annual_rep%'");
		$sql_faculty = mysql_num_rows($result_faculty);
		return $sql_faculty;
	}

	function selc_sem($sem_op){
		if($sem_op == 1){
			$year = 2017;
			$sem_arr = array("June" => "$year/6", "July" => "7", "August" => "8", "September" => "9", "October" => "10");
			return $sem_arr;
		} else if($sem_op == 2){
			$sem_arr = array("November" => "11", "December" => "12", "January" => "1", "February" => "2", "March" => "3");
			return $sem_arr;
		} else {
		
		}
	}
	
	function update_invt($name,$num_item){
		$result_invt = mysql_query("SELECT * FROM inventory WHERE id = '$name'");
		$field_name_invt = mysql_fetch_array($result_invt);
		$num_items = $field_name_invt['number_items'];
		$num_rep_items = $field_name_invt['rep_num_item'];
		$total = $num_items - $num_item;
		$rep_total = $num_item + $num_rep_items;
																
		mysql_query("UPDATE inventory SET number_items = '$total', rep_num_item = '$rep_total' WHERE id = '$name'");
	
	}
	
	function update_dental_med($med_1,$med_2,$med_3){
			$num = 3;
            $num_int = 6;
            $num_null = NULL;
            if((isset($med_1))||(!empty($med_1))){
				$result_med_1 = mysql_query("SELECT * FROM inventory WHERE medicine_name = '$med_1' AND expr = '$num_null'");
                $field_name = mysql_fetch_array($result_med_1);
                $med_id = $field_name['id'];
                $num_item = $field_name['number_items'];
                $num_rep_item = $field_name['rep_num_item'];
                $total_sum_item = $num_rep_item + $num_int;
                $total_new_num = $num_item - $num_int;
				mysql_query("UPDATE inventory SET number_items = '$total_new_num', rep_num_item = '$total_sum_item' WHERE id = '$med_id'");
			}
			if((isset($med_2))||(!empty($med_2))){
                $med_2_b = $med_2."__";
				$result_med_2 = mysql_query("SELECT * FROM inventory WHERE medicine_name LIKE '$med_2_b%' AND expr = '$num_null'");
                $field_name_2 = mysql_fetch_array($result_med_2);
                $med_id_1 = $field_name_2['id'];
                $num_item_2 = $field_name_2['number_items'];
                $num_rep_item2 = $field_name_2['rep_num_item'];
                $total_sum_item1 = $num_rep_item2 + $num;
                $total_new_num_2 = $num_item_2 - $num;
				mysql_query("UPDATE inventory SET number_items = '$total_new_num_2', rep_num_item = '$total_sum_item1' WHERE id = '$med_id_1'");
			}
			if((isset($med_3))||(!empty($med_3))){
                $med_3_c = $med_3."__";
				$result_med_3 = mysql_query("SELECT * FROM inventory WHERE medicine_name LIKE '$med_3_c%' AND expr = '$num_null'");
				$field_name_3 = mysql_fetch_array($result_med_3);
                $med_id_2 = $field_name_3['id'];
                $num_item_3 = $field_name_3['number_items'];
                $num_rep_item3 = $field_name_3['rep_num_item'];
                $total_sum_item3 = $num_rep_item3 + $num;
                $total_new_num_3 = $num_item_3 - $num;
                mysql_query("UPDATE inventory SET number_items = '$total_new_num_3', rep_num_item = '$total_sum_item3' WHERE id = '$med_id_2'");
			}
			
			return 1;
	}

    function update_invent($var_1, $var_2){
        $result_med = mysql_query("SELECT * FROM inventory WHERE id='$var_1'");
        $med_field = mysql_fetch_array($result_med);
        $val_num_item = $med_field['number_items'];
        $val_rep_item = $med_field['rep_num_item'];
        $total_num_item = $val_num_item - $var_2;
        $total_num_rep = $val_rep_item + $var_2;
        mysql_query("UPDATE inventory SET number_items = '$total_num_item', rep_num_item = '$total_num_rep' WHERE id='$var_1'");
        return 1;
    }

    function variables($year_1, $year_2, $semester, $quarterly_report_type){
        $arr = array();
        $arr[0] = $year_1;
        $arr[1] = $year_2;
        $arr[2] = $semester;
        $arr[3] = $quarterly_report_type;
        return $arr;
    }

    function strip_zeros_from_date($marked_string=""){
        $no_zeros = str_replace('*0', '', $marked_string);
        $cleaned_string = str_replace('*', '', $no_zeros);
        return $cleaned_string;
    }

    function check_inventory($name,$num_item){
        $return_message = array();
        $query_check = mysql_query("SELECT * FROM inventory WHERE medicine_name = '$name'");
        $field_invt = mysql_fetch_array($query_check);
        $num_invt = $field_invt['number_items'];
        if($num_item > $num_invt){
            $return_message[] = "Error".$name."has".$num_invt."You've Input".$num_item;
            return $return_message;
        } else {
            return 1;
        }
    }

    function pagination ($id,$type){
        $sql = "SELECT count(patient_id) FROM {$type} WHERE patient_id = '$id'";
        $retval = mysql_query($sql);
        $row = mysql_fetch_array($retval);
        return $row[0];
    }
	/**
	*	//Functions
	**/
?>