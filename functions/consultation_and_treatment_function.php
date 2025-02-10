<?php

    require_once('../includes/connection.php');

    if(isset($_POST['c_and_t_submit'])){

        $get_date = date('m/d/Y');

        $id = $_GET['id'];
        $result_query = mysql_query("SELECT * FROM patient_record WHERE id = '$id'");
        $field_name = mysql_fetch_array($result_query);
        $department = $field_name['department'];
        $user_position = $field_name['user_position'];
        $chief_complain = $_POST['chief_complain'];
        $nursing_diagnosis = $_POST['nursing_diagnosis'];
        $med_option = $_POST['med_option'];
        $num_item = $_POST['num_item'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $years = $_POST['year'];

        $exact_date = $month.'/'.$day.'/'.$years;
        update_inventory($med_option,$num_item);

        $query = "INSERT INTO consultation_and_treatment SET ";
        $query .= "id = '$id', ";
        $query .= "department = '$department', ";
        $query .= "user_position = '$user_position', ";
        $query .= "chief_complain = '$chief_complain', ";
        $query .= "nurse_diagnosis = '$nursing_diagnosis', ";
        $query .= "nursing_treatment = '$med_option', ";
        $query .= "num_item = '$num_item', ";
        $query .= "con_date = '$get_date'";


        mysql_query($query);

        header('LOCATION: ../add_patient.php');

    }

    /**
     * Use to update the inventory
     **/
    function update_inventory($med_name,$num_of_item){

            $result_set = mysql_query("SELECT * FROM inventory WHERE medicine_name = '$med_name'");
            $field_name = mysql_fetch_array($result_set);
            $number_items = $field_name['number_items'];

            $total_item = $number_items - $num_of_item;

            mysql_query("UPDATE inventory SET number_items = '$total_item' WHERE medicine_name ='$med_name'");


    }
?>