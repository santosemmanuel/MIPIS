<?php

    require_once('../includes/connection.php');
    require_once('functions.php');
    if(isset($_POST['bp_submit'])){

        $get_date = strip_zeros_from_date(date('Y/*m/*d'));

        $id = $_GET['id'];
        $department = $_GET['department'];
        $user_position = $_GET['user_position'];
        $blood_pressure = $_POST['blood_pressure'];
        $remarks = $_POST['remarks'];

        $query = "INSERT INTO blood_pressure_taking ";
        $query .= "SET patient_id = '$id', ";
        $query .= "department = '$department', ";
        $query .= "user_position = '$user_position', ";
        $query .= "con_date = '$get_date', ";
        $query .= "blood_pressure = '$blood_pressure', ";
        $query .= "remarks = '$remarks'";

        mysql_query($query);
        header('LOCATION: ../add_patient.php');
    }
?>