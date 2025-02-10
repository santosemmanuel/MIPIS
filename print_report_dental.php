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
$sem = $_GET['semester'];
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
    <a href="monthly_report.php" class="example-screen">Go back</a>
    <input type="button" class="example-screen" onclick="printDiv('printableArea')" value="Print" />
    <br/><p><strong>Academic / School Year: </strong>&nbsp;<?php echo $year_1."-".$year_2;?></p>
    <p><strong>Semester:</strong>
        <?php
            if($sem == 1){
                echo "1st Semester";
            } else if($sem == 2){
                echo "2nd Semester";
            }else {
                echo "1st - 2nd Semester";
            }
        ?>
    </p>
    <br/><p class="text-center">
       <h3 align="center">Dental Health</h3>
    </p>
</div><br/>
<table class="table table-bordered table-condensed">
    <thead>
    <th width="29%"><div align="center">Department</div></th>
    <?php
    if($user_position == "student"){
        $den_year = 0;
        $con = 0;
        $sem_ed_total = 0;
        $sem_bemd_total = 0;
        $sem_atd_total = 0;
        $den_year = $year_2 - 1;
        if($den_year == $year_1){

        if($sem == 1) {
            $arr_year = array("June" => "$year_1/6", "July" => "$year_1/7","August"=>"$year_1/8", "September" => "$year_1/9", "October" => "$year_1/10");
            foreach($arr_year as $string => $int){
                echo "<th><div align='center'>".$string."</div></th>";
            }

        } else if($sem == 2) {
            $arr_year = array("November" => "$year_1/11", "December" => "$year_1/12", "January" => "$year_2/1", "February" => "$year_2/2", "March" => "$year_2/3");
            foreach($arr_year as $string => $int){
                echo "<th><div align='center'>".$string."</div></th>";
            }

        } else if($sem == 3){
            $arr_year_1 = array("June" => "$year_1/6", "July" => "$year_1/7","August"=>"$year_1/8", "September" => "$year_1/9", "October" => "$year_1/10");
            foreach($arr_year_1 as $string => $int){
                echo "<th><div align='center'>".$string."</div></th>";
            }
            $arr_year_2 = array("November" => "$year_1/11", "December" => "$year_1/12", "January" => "$year_2/1", "February" => "$year_2/2", "March" => "$year_2/3");
            foreach($arr_year_2 as $string_1 => $int_2){
                echo "<th><div align='center'>".$string_1."</div></th>";
            }
            $con = 1;
        } else {
        }

        ?>
        <th><div align="center">Total</div></th>
        </thead>
        <tbody>
        <tr>
            <td>Education Department</td>
            <?php
            if($con == 1){
                $total_ed_sem1 = 0;
                foreach($arr_year_1 as $int_year){
                    $int_year = $int_year."__";
                    $ed_total_sem1 = report_month_num("dental_health","ED",$int_year);
                    echo "<td><div align='center'>".$ed_total_sem1."</div></td>";
                    $total_ed_sem1 += $ed_total_sem1;
                }

                $total_ed_sem2 = 0;
                foreach($arr_year_2 as $int_year_2){
                    $int_year_2 = $int_year_2."__";
                    $ed_total_sem2 = report_month_num("dental_health","ED",$int_year_2);
                    echo "<td><div align='center'>".$ed_total_sem2."</div></td>";
                    $total_ed_sem2 += $ed_total_sem2;
                }
                $over_total_ed = 0;
                $over_total_ed = $total_ed_sem1 + $total_ed_sem1;
                echo "<td><div align='center'>".$over_total_ed."</div></td>";
            } else {
                foreach($arr_year as $int){
                    $new_int = $int."__";
                    $ed_total_sem = report_month_num("dental_health","ED",$new_int);
                    echo "<td><div align='center'>".$ed_total_sem."</div></td>";
                    $sem_ed_total += $ed_total_sem;
                }
                echo "<td><div align='center'>".$sem_ed_total."</div></td>";
            }
            ?>

        </tr>
        <tr>
            <td>Buiseness Entrepreneurship and Management Department</td>
            <?php
            if($con == 1){
                $total_bemd_sem1 = 0;
                foreach($arr_year_1 as $int_year){
                    $int_year = $int_year."__";
                    $bemd_total_sem1 = report_month_num("dental_health","BEMD",$int_year);
                    echo "<td><div align='center'>".$bemd_total_sem1."</div></td>";
                    $total_bemd_sem1 += $bemd_total_sem1;
                }

                $total_bemd_sem2 = 0;
                foreach($arr_year_2 as $int_year_2){
                    $int_year_2 = $int_year_2."__";
                    $bemd_total_sem2 = report_month_num("dental_health","BEMD",$int_year_2);
                    echo "<td><div align='center'>".$bemd_total_sem2."</div></td>";
                    $total_bemd_sem2 += $bemd_total_sem2;
                }
                $over_total_bemd = 0;
                $over_total_bemd = $total_bemd_sem1 + $total_bemd_sem1;
                echo "<td><div align='center'>".$over_total_bemd."</div></td>";
            } else {
                foreach($arr_year as $int){
                    $new_int = $int."__";
                    $bemd_total_sem = report_month_num("dental_health","BEMD",$new_int);
                    echo "<td><div align='center'>".$bemd_total_sem."</div></td>";
                    $sem_bemd_total += $bemd_total_sem;
                }
                echo "<td><div align='center'>".$sem_bemd_total."</div></td>";
            }
            ?>
        </tr>
        <tr>
            <td>Agriculture and Techonology Department</td>
            <?php
            if($con == 1){
                $total_atd_sem1 = 0;
                foreach($arr_year_1 as $int_year){
                    $int_year = $int_year."__";
                    $atd_total_sem1 = report_month_num("dental_health","ATD",$int_year);
                    echo "<td><div align='center'>".$atd_total_sem1."</div></td>";
                    $total_atd_sem1 += $atd_total_sem1;
                }

                $total_atd_sem2 = 0;
                foreach($arr_year_2 as $int_year_2){
                    $int_year_2 = $int_year_2."__";
                    $atd_total_sem2 = report_month_num("dental_health","ATD",$int_year_2);
                    echo "<td><div align='center'>".$atd_total_sem2."</div></td>";
                    $total_atd_sem2 += $atd_total_sem2;
                }
                $over_total_atd = 0;
                $over_total_atd = $total_atd_sem1 + $total_atd_sem2;
                echo "<td><div align='center'>".$over_total_atd."</div></td>";
            } else {
                foreach($arr_year as $int){
                    $new_int = $int."__";
                    $atd_total_sem = report_month_num("dental_health","ATD",$new_int);
                    echo "<td><div align='center'>".$atd_total_sem."</div></td>";
                    $sem_atd_total += $atd_total_sem;
                }
                echo "<td><div align='center'>".$sem_atd_total."</div></td>";
            }
            ?>
        </tr>
        <tr>

            <td>Total</td>
            <?php
            if($con == 1){
                $over_total_sem1 = 0;
                foreach($arr_year_1 as $int_year){
                    $int_year = $int_year."__";
                    $over_total_sem1 = report_total_num("dental_health",$int_year);
                    echo "<td><div align='center'>".$over_total_sem1."</div></td>";

                }

                $over_total_sem2 = 0;
                foreach($arr_year_2 as $int_year_2){
                    $int_year_2 = $int_year_2."__";
                    $over_total_sem2 = report_total_num("dental_health",$int_year_2);
                    echo "<td><div align='center'>".$over_total_sem2."</div></td>";
                }
                $over_all_total = $over_total_ed + $over_total_bemd + $over_total_atd;
                echo "<td><div align='center'>".$over_all_total."</div></td>";
            } else {
                $over_total_sem = 0;
                foreach($arr_year as $int_year){
                    $int_year = $int_year."__";
                    $total_sem_month = report_total_num("dental_health",$int_year);
                    echo "<td><div align='center'>".$total_sem_month."</div></td>";
                    $over_total_sem += $total_sem_month;
                }
                ?>
                <td><?php $over_all_total = $sem_ed_total + $sem_bemd_total + $sem_atd_total;
                    echo "<div align='center'>".$over_all_total."</div>";
                    ?></td>
            <?php }?>
        </tr>
        <tr>
            <?php
            if($con == 1){
                echo "<td colspan='13'>";
                echo "<div align='right'><h4>Total: &nbsp;".$over_all_total."</h4></div>";
            } else {
                echo "<td colspan='13'>";
                echo "<div align='right'><h4>Total: &nbsp;".$over_all_total."</h4></div>";
            }
            ?>

            </td>
        </tr>
        </tbody>
</table>
<?php
}
?>
    <?php } else if ($user_position == "faculty"){?>
            <?php
            $den_year = 0;
            $con = 0;
            $sem_faculty_total = 0;
            $den_year = $year_2 - 1;
            if($den_year == $year_1){

                if($sem == 1) {
                    $arr_year = array("June" => "$year_1/06", "July" => "$year_1/07","August"=>"$year_1/08", "September" => "$year_1/09", "October" => "$year_1/10");
                    foreach($arr_year as $string => $int){
                        echo "<th><div align='center'>".$string."</div></th>";
                    }

                } else if($sem == 2) {
                    $arr_year = array("November" => "$year_1/11", "December" => "$year_1/12", "January" => "$year_2/01", "February" => "$year_2/02", "March" => "$year_2/03");
                    foreach($arr_year as $string => $int){
                        echo "<th><div align='center'>".$string."</div></th>";
                    }

                } else if($sem == 3){
                    $arr_year_1 = array("June" => "$year_1/06", "July" => "$year_1/07","August"=>"$year_1/08", "September" => "$year_1/09", "October" => "$year_1/10");
                    foreach($arr_year_1 as $string => $int){
                        echo "<th><div align='center'>".$string."</div></th>";
                    }
                    $arr_year_2 = array("November" => "$year_1/11", "December" => "$year_1/12", "January" => "$year_2/01", "February" => "$year_2/02", "March" => "$year_2/03");
                    foreach($arr_year_2 as $string_1 => $int_2){
                        echo "<th><div align='center'>".$string_1."</div></th>";
                    }
                    $con = 1;
                } else {
                }

                ?>
                <th><div align="center">Total</div></th>
                </thead>
                <tbody>
                <tr>
                    <td>Faculty and Stuff</td>
                    <?php
                    if($con == 1){
                        $total_faculty_sem1 = 0;
                        foreach($arr_year_1 as $int_year){
                            $int_year = $int_year."__";
                            $faculty_total_sem1 = report_faculty_num("dental_health",$int_year);
                            echo "<td><div align='center'>".$faculty_total_sem1."</div></td>";
                            $total_faculty_sem1 += $faculty_total_sem1;
                        }

                        $total_faculty_sem2 = 0;
                        foreach($arr_year_2 as $int_year_2){
                            $int_year_2 = $int_year_2."__";
                            $faculty_total_sem2 = report_faculty_num("dental_health",$int_year_2);
                            echo "<td><div align='center'>".$faculty_total_sem2."</div></td>";
                            $total_faculty_sem2 += $faculty_total_sem2;
                        }
                        $over_total_faculty = 0;
                        $over_total_faculty = $total_faculty_sem1 + $total_faculty_sem2;
                        echo "<td><div align='center'>".$over_total_faculty."</div></td>";
                        echo "<tr><td colspan='13'>";
                        echo "<div align='right'><h4>Total: &nbsp;".$over_total_faculty."</h4></div>";
                        echo "</td></tr>";
                    } else {
                        foreach($arr_year as $int){
                            $new_int = $int."__";
                            $faculty_total_sem = report_faculty_num("dental_health",$new_int);
                            echo "<td><div align='center'>".$faculty_total_sem."</div></td>";
                            $sem_faculty_total += $faculty_total_sem;
                        }
                        echo "<td><div align='center'>".$sem_faculty_total."</div></td>";
                        echo "<tr><td colspan='13'>";
                        echo "<div align='right'><h4>Total: &nbsp;".$sem_faculty_total."</h4></div>";
                        echo "</td></tr>";
                    }
                    ?>

                </tr>
            </tbody>
    <?php }?>
</table>
<?php
}
?>
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