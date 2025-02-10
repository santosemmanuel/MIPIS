<?php
require_once('includes/session.php');
require_once('includes/connection.php');
require("functions/functions.php");
//confirm_logged_in();
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
$year = $_GET['year'];
$month = $_GET['month'];
$month_report_type = $_GET['month_rep_type'];
$var_month_report = $_GET['var_month_rep'];
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
    <br/><p><strong>Academic / School Year: </strong>&nbsp;<?php echo $year;?></p>
    <p><strong>Month:</strong>
        <?php
        $month_string = month_string($month);
        echo $month_string;
        ?>
    </p>
    <br/><p class="text-center">
        <?php if($month_report_type == "tbl_consultation"){
            echo "<h3 align='center'>Consultation and Treatment</h3>";
        } else if($month_report_type == "blood_pressure_taking") {
            echo "<h3 align='center'>Blood Pressure Taking</h3>";
        } else {}
        ?>
    </p>
</div><br/>
<table class="table table-bordered table-condensed">
    <thead>
    <th width="33%"><div align="center">
            <h4>Department</h4>
        </div></th>
    <th width="33%"><div align="center">
            <?php
            $month_string = month_string($month);
            echo "<h4>".$month_string."</h4>";
            ?>
        </div></th>

    </thead>
    <?php if($user_position == "student"){ ?>
    <tbody>
    <tr>
        <td width="20%">Education Department</td>
        <td><div align="center">
                <?php
                $num_ed = report_month_num($month_report_type,"ED",$var_month_report);
                echo "<h5>".$num_ed."</h5>";
                ?>
            </div></td>

    </tr>
    <tr>
        <td width="20%">Business Entrepreneurship and Managment Department</td>
        <td><div align="center">
                <?php
                $num_bemd = report_month_num($month_report_type,"BEMD",$var_month_report);
                echo "<h5>".$num_bemd."</h5>";
                ?>
            </div></td>

    </tr>
    <tr>
        <td width="20%">Agriculture and Technology Department</td>
        <td><div align="center">
                <?php
                $num_atd = report_month_num($month_report_type,"ATD",$var_month_report);
                echo "<h5>".$num_atd."</h5>";
                ?>
            </div></td>

    </tr>
    <tr>
        <td colspan="4"><div align="right">
                <h4><strong>Total :</strong>&nbsp;
                    <?php
                    $total = $num_ed + $num_bemd + $num_atd;
                    echo $total;
                    ?>
                    &nbsp;</h4>
            </div></td>
    </tr>
    </tbody>
    <?php } else if($user_position == "faculty"){?>
    <tbody>
    <tr>
        <td width="20%">Faculty and Staff</td>
        <td><div align="center">
                <?php
                $num_faculty = report_faculty_num($month_report_type,$var_month_report);
                echo "<h5>".$num_faculty."</h5>";
                ?>
            </div></td>

    </tr>
    <tr>
        <td colspan="4"><div align="right">
            <h4><strong>Total :</strong>&nbsp;
                <?php echo $num_faculty;?>
                &nbsp;</h4>
            </div></td>
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