    <?php
    require_once('includes/session.php');
    require_once('includes/connection.php');
    require("functions/functions.php");
    confirm_logged_in();
    include("includes/header.php");
    ?>
    <style>

        @media print {
            .example-screen {
                display: none;
            }
        }
    </style>
    <?php
    $year_1 = $_GET['year_1'];
    $year_2 = $_GET['year_2'];
    $month_count_1 = $_GET['month_count_1'];
    $month_count = $_GET['month_count'];
    $semester = $_GET['semester'];
    $quarterly_report_type = $_GET['quarterly_rep_type'];
    $user_position = $_GET['user_position'];

    ?>
    <body style="width: 80%; margin-left: 10%">
    <div id="printableArea">
    <img src="images/Logo.png" width="8%" height="10%" style="margin-left: 15%; margin-top: 4%">
    <div style="margin-bottom: 7%; margin-top: -6%">

        <center>
            Republic of the Philippines<br>
            <b>EASTERN VISAYAS STATE UNIVERSITY</b><br>
            Burauen Campus<br>
            Burauen, Leyte
        </center>

    </div><div align="left">
        <a href="report_quarterly.php" class="example-screen">Go back</a>
        <input type="button" class="example-screen" onclick="printDiv('printableArea')" value="Print" />
        <br/><p><strong>Academic / School Year: </strong>&nbsp;<?php echo $year_1."-".$year_2;?></p>
        <p><strong>Month:</strong>
            <?php
                $month_array = array("6"=>"June","7"=>"July","8"=>"August","9"=>"September"
                ,"10"=>"October","0"=>"November","1"=>"December","2"=>"January","3"=>"February","4"=>"March");
                foreach($month_array as $n => $name_month){
                    if($month_count_1 == $n){
                        echo "&nbsp;".$name_month."&nbsp;";
                    }
                }
                foreach($month_array as $n => $name_month){
                    if($month_count == $n){
                        echo "- &nbsp;".$name_month;
                    }
                }

            ?>
        </p>
        <br/><p class="text-center">
            <?php if($quarterly_report_type == "tbl_consultation"){
                echo "<h3 align='center'>Consultation and Treatment</h3>";
            } else if($quarterly_report_type == "blood_pressure_taking") {
                echo "<h3 align='center'>Blood Pressure Taking</h3>";
            } else {}
            ?>
        </p>
    </div>
    <table class="table table-bordered table-condensed">

        <?php if($user_position == "faculty"){ ?>
            <?php
            $err_msg = array();
            $n_year = $year_2 - $year_1;
            $new_array = array();
            $new_array_1 = array();
            $continue = false;
            $var_2 = 0;
            if($n_year == 1){
            $continue = true;
            } else {
            $err_msg[] = "Error";
            }
            if($continue){
            if($semester == 1){
            $arr = array('6','7','8','9','10');
            for($a = 0; $a < 5; $a++){
            if($arr[$a] == $month_count_1){
            $new_array[] = $arr[$a];
            }
            if($arr[$a] == $month_count){
            $new_array_1[] = $arr[$a];
            }
            }
            if(empty($new_array[0]) || (empty($new_array_1[0]))){
            $val_1 = null;
            $val_2 = null;
            }
            else {
            $val_1 = $new_array[0];
            $val_2 = $new_array_1[0];
            }
            if ($val_1 >= $val_2){
            $err_msg[] = "Error again";
            }else{
            $new_a = array();
            for($q=$val_1; $q <= $val_2; $q++){
            $new_a[] = $q;
            }

            }
            }else if($semester == 2){
            $arr = array("1"=>'11','2'=>'12','3'=>'1','4'=>'2','5'=>'3');
            $month_count += 1;
            $c_arr = array();
            while($arr){
            if($month_count == $month_count_1){
            break;
            }
            $c_arr[] = $arr[$month_count];
            $month_count--;
            }
            }
            }

            if(!empty($err_msg)){
            foreach($err_msg as $value){
            echo $value;
            }
            }
            ?>
            <table class="table table-bordered table condensed">
                <thead>
                <th width="29%"><div align="center">Department</div></th>
                <?php
                if(!empty($new_a)){
                    foreach($new_a as $val){
                        $string = month_string($val);
                        echo "<th><div align='center'>".$string."</div></th>";
                    }
                } else {
                    for($ab=count($c_arr)-1;$ab>=0;$ab--){
                        $string_2 = month_string($c_arr[$ab]);
                        echo "<th><div align='center'>".$string_2."</div></th>";
                    }
                }
                ?>
                <th><div align="center">Total</div></th>
                </thead>
                <tbody>
                <tr>
                    <td>Faculty and Staff</td>
                    <?php
                    $sem1_faculty_total = 0;
                    if(!empty($new_a)){
                        foreach($new_a as $int){
                            $new_int = $year_1."/".$int."__";
                            $faculty_total_sem1 = report_faculty_num($quarterly_report_type,$new_int);
                            echo "<td><div align='center'>".$faculty_total_sem1."</div></td>";
                            $sem1_faculty_total += $faculty_total_sem1;
                        }
                        echo "<td><div align='center'>".$sem1_faculty_total."</div></td>";
                    } else {
                        for($ab=count($c_arr)-1;$ab>=0;$ab--){
                            if(($c_arr[$ab] == 11) || ($c_arr[$ab] == 12)){
                                $new_int = $year_1."/".$c_arr[$ab]."__";
                            } else {
                                $new_int = $year_2."/".$c_arr[$ab]."__";
                            }
                            $faculty_total_sem2 = report_faculty_num($quarterly_report_type,$new_int);
                            echo "<td><div align='center'>".$faculty_total_sem2."</div></td>";
                            $sem1_faculty_total += $faculty_total_sem2;
                        }
                        echo "<td><div align='center'>".$sem1_faculty_total."</div></td>";
                    }
                    ?>
                </tr>
                <tr>
                    <?php
                    if(!empty($new_a)){
                        ?>  <td colspan="<?php echo count($new_a)+2;?>">
                            <div align="right"><h4>Total: &nbsp;<?php echo $sem1_faculty_total;?></h4></div>
                        </td>
                    <?php } else {
                        ?>
                        <td colspan="<?php echo count($c_arr)+2;?>">
                            <div align="right"><h4>Total: &nbsp;<?php echo $sem1_faculty_total;?></h4></div>
                        </td>
                    <?php }?>
                </tr>
                </tbody>
        <?php } else if($user_position == "student"){?>
        <?php
            $err_msg = array();
            $n_year = $year_2 - $year_1;
            $new_array = array();
            $new_array_1 = array();
            $continue = false;
            $var_2 = 0;
            if($n_year == 1){
                $continue = true;
            } else {
                $err_msg[] = "Error";
            }
            if($continue){
                if($semester == 1){
                    $arr = array('6','7','8','9','10');
                    for($a = 0; $a < 5; $a++){
                        if($arr[$a] == $month_count_1){
                            $new_array[] = $arr[$a];
                        }
                        if($arr[$a] == $month_count){
                            $new_array_1[] = $arr[$a];
                        }
                    }
                    if(empty($new_array[0]) || (empty($new_array_1[0]))){
                        $val_1 = null;
                        $val_2 = null;
                    }
                    else {
                        $val_1 = $new_array[0];
                        $val_2 = $new_array_1[0];
                    }
                    if ($val_1 >= $val_2){
                        $err_msg[] = "Error again";
                    }else{
                        $new_a = array();
                        for($q=$val_1; $q <= $val_2; $q++){
                            $new_a[] = $q;
                        }

                    }
                }else if($semester == 2){
                    $arr = array("1"=>'11','2'=>'12','3'=>'1','4'=>'2','5'=>'3');
                    $month_count += 1;
                    $c_arr = array();
                    while($arr){
                        if($month_count == $month_count_1){
                            break;
                        }
                        $c_arr[] = $arr[$month_count];
                        $month_count--;
                    }
                }
            }

            if(!empty($err_msg)){
                foreach($err_msg as $value){
                    echo $value;
                }
            }
            ?>
            <table class="table table-bordered table condensed">
                <thead>
                <th width="29%"><div align="center">Department</div></th>
                <?php
                if(!empty($new_a)){
                    foreach($new_a as $val){
                        $string = month_string($val);
                        echo "<th><div align='center'>".$string."</div></th>";
                    }
                } else {
                    for($ab=count($c_arr)-1;$ab>=0;$ab--){
                        $string_2 = month_string($c_arr[$ab]);
                        echo "<th><div align='center'>".$string_2."</div></th>";
                    }
                }
                ?>
                <th><div align="center">Total</div></th>
                </thead>
                <tbody>
                <tr>
                    <td>Education Department</td>
                    <?php
                    $sem1_ed_total = 0;
                    if(!empty($new_a)){
                        foreach($new_a as $int){
                            $new_int = $year_1."/".$int."__";
                            $ed_total_sem1 = report_month_num($quarterly_report_type,"ED",$new_int);
                            echo "<td><div align='center'>".$ed_total_sem1."</div></td>";
                            $sem1_ed_total += $ed_total_sem1;
                        }
                        echo "<td><div align='center'>".$sem1_ed_total."</div></td>";
                    } else {
                        for($ab=count($c_arr)-1;$ab>=0;$ab--){
                            if(($c_arr[$ab] == 11) || ($c_arr[$ab] == 12)){
                                $new_int = $year_1."/".$c_arr[$ab]."__";
                            } else {
                                $new_int = $year_2."/".$c_arr[$ab]."__";
                            }
                            $ed_total_sem2 = report_month_num($quarterly_report_type,"ED",$new_int);
                            echo "<td><div align='center'>".$ed_total_sem2."</div></td>";
                            $sem1_ed_total += $ed_total_sem2;
                        }
                        echo "<td><div align='center'>".$sem1_ed_total."</div></td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td>Buiseness Entrepreneurship and Management Department</td>
                    <?php
                    $sem1_bemd_total = 0;
                    $bemd_total_sem2 = 0;
                    if(!empty($new_a)){
                        foreach($new_a as $int){
                            $new_int = $year_1."/".$int."__";
                            $bemd_total_sem1 = report_month_num($quarterly_report_type,"BEMD",$new_int);
                            echo "<td><div align='center'>".$bemd_total_sem1."</div></td>";
                            $sem1_bemd_total += $bemd_total_sem1;
                        }
                        echo "<td><div align='center'>".$sem1_ed_total."</div></td>";
                    } else {
                        for($ab=count($c_arr)-1;$ab>=0;$ab--){
                            if(($c_arr[$ab] == 11) || ($c_arr[$ab] == 12)){
                                $new_int = $year_1."/".$c_arr[$ab]."__";
                            } else {
                                $new_int = $year_2."/".$c_arr[$ab]."__";
                            }
                            $bemd_total_sem2 = report_month_num($quarterly_report_type,"BEMD",$new_int);
                            echo "<td><div align='center'>".$bemd_total_sem2."</div></td>";
                            $sem1_bemd_total += $bemd_total_sem2;
                        }
                        echo "<td><div align='center'>".$sem1_bemd_total."</div></td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td>Agriculture and Technology Department</td>
                    <?php
                    $sem1_atd_total = 0;
                    if(!empty($new_a)){
                        foreach($new_a as $int){
                            $new_int = $year_1."/".$int."__";
                            $atd_total_sem1 = report_month_num($quarterly_report_type,"ATD",$new_int);
                            echo "<td><div align='center'>".$atd_total_sem1."</div></td>";
                            $sem1_atd_total += $atd_total_sem1;
                        }
                        echo "<td><div align='center'>".$sem1_ed_total."</div></td>";
                    } else {
                        for($ab=count($c_arr)-1;$ab>=0;$ab--){
                            if(($c_arr[$ab] == 11) || ($c_arr[$ab] == 12)){
                                $new_int = $year_1."/".$c_arr[$ab]."__";
                            } else {
                                $new_int = $year_2."/".$c_arr[$ab]."__";
                            }
                            $atd_total_sem2 = report_month_num($quarterly_report_type,"ATD",$new_int);
                            echo "<td><div align='center'>".$atd_total_sem2."</div></td>";
                            $sem1_atd_total += $atd_total_sem2;
                        }
                        echo "<td><div align='center'>".$sem1_atd_total."</div></td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td>Total</td>
                    <?php
                    $over_total_sem1 = 0;
                    if(!empty($new_a)){
                        foreach($new_a as $int){
                            $new_int = $year_1."/".$int."__";
                            $total_sem_month = report_total_num($quarterly_report_type,$new_int);
                            echo "<td><div align='center'>".$total_sem_month."</div></td>";
                            $over_total_sem1 += $total_sem_month;
                        }
                    } else {
                        $total_sem_month_2 = 0;
                        $over_total_sem2 = 0;
                        for($ab=count($c_arr)-1;$ab>=0;$ab--){
                            if(($c_arr[$ab] == 11) || ($c_arr[$ab] == 12)){
                                $new_int = $year_1."/".$c_arr[$ab]."__";
                            } else {
                                $new_int = $year_2."/".$c_arr[$ab]."__";
                            }
                            $total_sem_month_2 = report_total_num($quarterly_report_type,$new_int);
                            echo "<td><div align='center'>".$total_sem_month_2."</div></td>";
                            $over_total_sem2 += $total_sem_month_2;
                        }
                    }
                    echo "<td><div align='center'>".$over_query_total = $sem1_ed_total + $sem1_bemd_total + $sem1_atd_total."</div></td>";
                    ?>
                </tr>
                <tr>
                    <?php
                    if(!empty($new_a)){
                        ?>  <td colspan="<?php echo count($new_a)+2;?>">
                            <div align="right"><h4>Total: &nbsp;<?php echo $over_query_total;?></h4></div>
                        </td>
                    <?php } else {
                        ?>
                        <td colspan="<?php echo count($c_arr)+2;?>">
                            <div align="right"><h4>Total: &nbsp;<?php echo $over_query_total;?></h4></div>
                        </td>
                    <?php }?>
                </tr>
                </tbody>
        <?php } ?>
    </table>
    <br>
    <br>
    <br>
    <div>
        <h6 class="text-left"><strong>CARLOTA S. RAGA</strong></h6>
        <p class="text-left" style="margin-left: 3%"><i>Nurse II</i></p>
        <h6 class="text-right"><strong>PETRONILA D. TILA-ON, Ph.D</strong></h6>
        <p class="text-right" style="margin-right: 4.4%"><i>Campus Director</i></p>
    </div>
    </div>
    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
    </body>