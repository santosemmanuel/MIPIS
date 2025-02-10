<?php


    function expr_date($date){
        $arr = array();
        $new_arr = array();
    $result = mysql_query("SELECT * FROM inventory WHERE expr_date = '$date'");
    while($row = mysql_fetch_array($result)){
        $arr[] = $row['medicine_name'];
        $med_name = $row['medicine_name'];
        $id = $row['id'];
        $the_date = longdate(time() + 1*24*60*59);
        if($date == $the_date){
            mysql_query("INSERT INTO notification SET invent_id = '$id', med_name = '$med_name'");
        }
    }
        return $arr;
    }

    function longdate($timestap){
        return date("m/d/y", $timestap);
    }



?>