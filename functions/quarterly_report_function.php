<?php

    require('functions.php');
    if(isset($_POST['submit_1'])){

       $year_1 = $_POST['year_1'];
       $year_2 = $_POST['year_2'];
       $semester = $_POST['semester'];
       $quarterly_report_type = $_POST['quarterly_report_type'];

       variables($year_1, $year_2, $semester, $quarterly_report_type);

    }

?>