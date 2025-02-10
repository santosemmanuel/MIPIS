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
$annual_report_type = $_GET['annual_rep_type'];
$user_position = $_GET['user_position'];
?>
<body style="width: 80%; margin-left: 10%">
<div id="printableArea">
<img src="images/Logo.png" width="8%" height="10%" style="margin-left: 15%; margin-top: 4%">

<div style="margin-bottom: 9%; margin-top: -6%">

    <center>
        Republic of the Philippines<br>
        <b>EASTERN VISAYAS STATE UNIVERSITY</b><br>
        Burauen Campus<br>
        Burauen, Leyte
    </center>

</div><div align="left">
    <a href="annual_report.php" class="example-screen">Go back</a>
    <input type="button" class="example-screen" onclick="printDiv('printableArea')" value="Print" />
    <br/><p><strong>Academic / School Year: </strong>&nbsp;<?php echo $year_1 ." - ". $year_2;?></p>
    <br/><p class="text-center">
        <?php error_reporting(0)?>
        <?php if($annual_report_type == "tbl_consultation"){
            echo "<h3 align='center'>Consultation and Treatment</h3>";
        } else if($annual_report_type == "blood_pressure_taking") {
            echo "<h3 align='center'>Blood Pressure Taking</h3>";
        } else {}
        ?>
    </p>
</div><br/>
<?php if($user_position == "student"){?>
<table class="table table-bordered table-condensed table-reponsive">
    <thead>
    <th><div align="center">Department</div></th>
    <?php
    $an_year = 0;
    $an_year = $year_2 - 1;
    if($an_year == $year_1){
        $arr_year_1 = array("June" => "$year_1/6", "July" => "$year_1/7","August"=>"$year_1/8", "September" => "$year_1/9", "October" => "$year_1/10");
        $arr_year_2 = array("November" => "$year_1/11", "December" => "$year_1/12", "January" => "$year_2/1", "February" => "$year_2/2", "March" => "$year_2/3");
        foreach($arr_year_1 as $string => $int){
            echo "<th><div align='center'>".$string."</div></th>";
        }
        foreach($arr_year_2 as $string_1 => $int_2){
            echo "<th><div align='center'>".$string_1."</div></th>";
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
        foreach($arr_year_1 as $int){
            $new_int = $int."__";
            $ed_total_sem1 = report_month_num($annual_report_type,"ED",$new_int);
            echo "<td><div align='center'>".$ed_total_sem1."</div></td>";
            $sem1_ed_total += $ed_total_sem1;
        }
        ?>
        <?php
        $sem2_ed_total = 0;
        foreach($arr_year_2 as $int_1){
            $new_int_1 = $int_1."__";
            $ed_total_sem2 = report_month_num($annual_report_type,"ED",$new_int_1);
            echo "<td><div align='center'>".$ed_total_sem2."</div></td>";
            $sem2_ed_total += $ed_total_sem2;
        }
        ?>
        <td><div align="center"><?php echo $ed_total = $sem1_ed_total + $sem2_ed_total; ?></div></td>
    </tr>
    <tr>
        <td width="28%">Buisness Entrepreneurship and Management Deparment</td>
        <?php
        $sem1_bemd_total = 0;
        foreach($arr_year_1 as $int){
            $new_int = $int."__";
            $bemd_total_sem1 = report_month_num($annual_report_type,"BEMD",$new_int);
            echo "<td><div align='center'>".$bemd_total_sem1."</div></td>";
            $sem1_bemd_total += $bemd_total_sem1;
        }
        ?>
        <?php
        $sem2_bemd_total = 0;
        foreach($arr_year_2 as $int_1){
            $new_int_1 = $int_1."__";
            $bemd_total_sem2 = report_month_num($annual_report_type,"BEMD",$new_int_1);
            echo "<td><div align='center'>".$bemd_total_sem2."</div></td>";
            $sem2_bemd_total += $bemd_total_sem2;
        }
        ?>
        <td><div align="center"><?php echo $bemd_total = $sem1_bemd_total + $sem2_bemd_total; ?></div></td>
    </tr>
    <tr>
        <td>Agriculture and Technology Department</td>
        <?php
        $sem1_atd_total = 0;
        foreach($arr_year_1 as $int){
            $new_int = $int."__";
            $atd_total_sem1 = report_month_num($annual_report_type,"ATD",$new_int);
            echo "<td><div align='center'>".$atd_total_sem1."</div></td>";
            $sem1_atd_total += $atd_total_sem1;
        }
        ?>
        <?php
        $sem2_atd_total = 0;
        foreach($arr_year_2 as $int_1){
            $new_int_1 = $int_1."__";
            $atd_total_sem2 = report_month_num($annual_report_type,"ATD",$new_int_1);
            echo "<td><div align='center'>".$atd_total_sem2."</div></td>";
            $sem2_atd_total += $atd_total_sem2;
        }
        ?>
        <td><div align="center"><?php echo $atd_total = $sem1_atd_total + $sem2_atd_total; ?></div></td>
    </tr>
    <tr>
        <td>Total</td>
        <?php
        $over_total_sem1 = 0;
        foreach($arr_year_1 as $int_year){
            $int_year = $int_year."__";
            $total_sem_month = report_total_num($annual_report_type,$int_year);
            echo "<td><div align='center'>".$total_sem_month."</div></td>";
            $over_total_sem1 += $total_sem_month;
        }
        ?>
        <?php
        $over_total_sem2 = 0;
        foreach($arr_year_2 as $int_year_2){
            $int_year_2 = $int_year_2."__";
            $total_sem_month_2 = report_total_num($annual_report_type,$int_year_2);
            echo "<td><div align='center'>".$total_sem_month_2."</div></td>";
            $over_total_sem2 += $total_sem_month_2;
        }
        ?>
        <td><div align="center"><?php echo $over_total = $over_total_sem1 + $over_total_sem2;?></div></td>
    </tr>
    <tr>
        <td colspan="13">
            <div align="right">
                <h4>Total: &nbsp;<?php echo $over_total;?></h4>
            </div>
        </td>
    </tr>
    </tbody>
</table>
<?php } else if ($user_position == "faculty"){?>
    <table class="table table-bordered table-condensed table-reponsive">
        <thead>
        <th><div align="center">Department</div></th>
        <?php
        $an_year = 0;
        $an_year = $year_2 - 1;
        if($an_year == $year_1){
            $arr_year_1 = array("June" => "$year_1/6", "July" => "$year_1/7","August"=>"$year_1/8", "September" => "$year_1/9", "October" => "$year_1/10");
            $arr_year_2 = array("November" => "$year_1/11", "December" => "$year_1/12", "January" => "$year_2/1", "February" => "$year_2/2", "March" => "$year_2/3");
            foreach($arr_year_1 as $string => $int){
                echo "<th><div align='center'>".$string."</div></th>";
            }
            foreach($arr_year_2 as $string_1 => $int_2){
                echo "<th><div align='center'>".$string_1."</div></th>";
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
            foreach($arr_year_1 as $int){
                $new_int = $int."__";
                $faculty_total_sem1 = report_faculty_num($annual_report_type,$new_int);
                echo "<td><div align='center'>".$faculty_total_sem1."</div></td>";
                $sem1_faculty_total += $faculty_total_sem1;
            }
            ?>
            <?php
            $sem2_faculty_total = 0;
            foreach($arr_year_2 as $int_1){
                $new_int_1 = $int_1."__";
                $faculty_total_sem2 = report_faculty_num($annual_report_type,$new_int_1);
                echo "<td><div align='center'>".$faculty_total_sem2."</div></td>";
                $sem2_faculty_total += $faculty_total_sem2;
            }
            ?>
            <td><div align="center"><?php echo $faculty_total = $sem1_faculty_total + $sem2_faculty_total; ?></div></td>
        </tr>
        <tr>
            <td colspan="13">
                <div align="right">
                    <h4>Total: &nbsp;<?php echo $faculty_total;?></h4>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
<?php }?>
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
