<?php

    require('functions.php');
    require_once('../includes/connection.php');

    if(isset($_POST['update_invent'])){

        $id = $_GET['id'];
        $selc_option = $_POST['selc_option'];
        $med_name = $_POST['med_name'];
        $num_item = $_POST['num_item'];

        $query = "UPDATE inventory SET ";
        $query .= "medicine_name = '$med_name', ";
        $query .= "status = '$selc_option', ";
        $query .= "number_items = '$num_item' ";
        $query .= "WHERE id='$id'";

        mysql_query($query);

        header("LOCATION: ../view inventory.php");
    }
?>