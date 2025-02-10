<!-- include Files -->
<?php

require_once('includes/session.php');
require_once('includes/connection.php');
confirm_logged_in();

?>
<!-- /include Files -->

<!-- header(php code) -->
<?php
include('includes/header.php');
?>
<!-- /header(php code) -->

<body data-spy="scroll">

<!-- -->


<!-- top nav(php code)-->
<?php
include('/includes/top_nav.php');
?>
<!-- /top nav(php code)-->

<!-- -->
<div class="row">

<div class="col-md-12">
<!-- -->
<aside>
    <div class="col-md-2">
        <div class="well">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation" ><a href="default.php"><span class="glyphicon glyphicon-home">&nbsp;</span>Home</a></li>
                <li role="presentation"><a href="add_patient.php"><span class="glyphicon glyphicon-search">&nbsp;</span>Search</a></li>
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-folder-open">&nbsp;</span>Records
                        <span class="glyphicon glyphicon-menu-down" style="float: right; margin-top: 2%"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="faculty records.php">Faculty Records</a></li>
                        <li><a href="student_record.php">Student Records</a></li>
                    </ul>
                </li>
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-menu-hamburger">&nbsp;</span>Inventory
                        <span class="glyphicon glyphicon-menu-down" style="float: right; margin-top: 2%"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="view inventory.php">View Inventory</a></li>
                        <li><a href="add_inventory.php">Add Inventory</a></li>
                    </ul>
                </li>
                <li role="presentation" class="dropdown active">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-print">&nbsp;</span>Reports
                        <span class="glyphicon glyphicon-menu-down" style="float: right; margin-top: 2%"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        if($user_type['user_type'] == 'User'){ ?>
                            <li class="disabled"><a href="annual_report.php">Annual Report</a></li>
                            <li class="disabled"><a href="quarterly_report.php">Quarterly Report</a></li>
                            <li class="disabled"><a href="monthly_report.php">Monthly Report</a></li>
                            <li class="disabled"><a href="#">Inventory Report</a></li>
                        <?php } else if($user_type['user_type'] == 'Admin'){?>
                            <li><a href="report_annual.php">Annual Report</a></li>
                            <li><a href="report_quarterly.php">Quarterly Report</a></li>
                            <li><a href="report_monthly.php">Monthly Report</a></li>
                            <li><a href="report_dental.php">Dental Report</a></li>
                            <li><a href="#">Inventory Report</a></li>
                        <?php
                        } else {}
                        ?>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</aside>
<!-- / -->

<!-- -->
<div class="col-md-10">

<!-- -->
<ol class="breadcrumb">
    <span class="glyphicon glyphicon-print" style="color:#555">&nbsp;</span>
    <li><a href="add_patient.php">Report</a></li>
    <li class="active">Faculty Quarterly Report</li>
    <li style="float: right"><?php  echo date('l jS \of F Y');?></li>
</ol>

<div class="page-header">
    <h1>Faculty Quarterly Report &nbsp;<small></small></h1>
</div>
<!-- / -->


<div class="row">
<div class="col-md-12">
<div class="col-md-11">
<form class="form-inline" method="post">
    <div class="form-group">
        <label>Academic year:</label>
        <select class="form-control" name="year_1">
            <?php
            $year = date("Y");
            for($a = 2013; $a <= $year; $a++){
                echo "<option value='$a'>".$a."</option>";
            }

            ?>
        </select>
    </div>
    <div class="form-group">
        <label>&nbsp;-&nbsp;</label>
        <select class="form-control" name="year_2">
            <?php
            $year = date("Y");
            for($a = 2013; $a <= $year; $a++){
                echo "<option value='$a'>".$a."</option>";
            }

            ?>
        </select>
    </div>
    <div class="form-group">
        <label>&nbsp;Semester: &nbsp;</label>
        <select class="form-control" name="semester">
            <option value="1">1st sem</option>
            <option value="2">2nd sem</option>
        </select>
    </div>
    <div class="form-group">
        <label>&nbsp;</label>
        <select class="form-control" name="quarterly_report_type">
            <option value="tbl_consultation">Consultation and Treatment</option>
            <option value="blood_pressure_taking">Blood Pressure Taking</option>
        </select>
    </div><br/><br/>
    <div class="form-group">
        <label>Select Month:</label>
        <select class="form-control" name="month_count_1">
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="0">November</option>
            <option value="1">December</option>
            <option value="2">January</option>
            <option value="3">February</option>
            <option value="4">March</option>
        </select>
    </div>
    <div class="form-group">
        <label>&nbsp;to&nbsp;</label>
        <select class="form-control" name="month_count">
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="0">November</option>
            <option value="1">December</option>
            <option value="2">January</option>
            <option value="3">February</option>
            <option value="4">March</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit_1" value="Submit" class="btn btn-primary">
    </div>
</form>
<!-- Modal -->
<br />
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title"></h3>
</div>
<div class="panel-body">
<?php
if(isset($_POST['submit_1'])){
    $err_msg = array();
    $year_1 = $_POST['year_1'];
    $year_2 = $_POST['year_2'];
    $quarterly_report_type = $_POST['quarterly_report_type'];
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
        $semester = $_POST['semester'];
        if($semester == 1){
            $month_count_1 = $_POST['month_count_1'];
            $month_count = $_POST['month_count'];
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
            $month_count_1 = $_POST['month_count_1'];
            $month_count = $_POST['month_count'];
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
    </table>
<?php
}
?>
</div>
<div class="panel-footer">
    <div style="margin-left: 85%">
            <a href="print_report_quarterly.php?quarterly_rep_type=<?php echo $quarterly_report_type;?>&&year_1=<?php echo $year_1;?>&&year_2=<?php echo $year_2;?>&&user_position=faculty&&month_count_1=<?php echo $month_count_1;?>&&month_count=<?php echo $_POST['month_count'];?>&&semester=<?php echo $semester;?>">
            <button class="btn btn-primary"><span class="glyphicon glyphicon-print">&nbsp;</span>Print Report</button>
        </a>
    </div>
</div>
</div>
</div>

</div>
</div>


<!-- footer -->
<div class="panel-footer">
    <footer>
        <center>
            <p style="color:#555"><strong>Medical Inventory and Patient Information System </strong><span class="glyphicon glyphicon-copyright-mark"></span> 2016 - 2017</p>
        </center>
    </footer>
</div>
<!-- /footer -->

</div>
<!--/ -->

</div>
<!-- /-->

</div>
<!-- /-->

</div>
<!-- / -->
</body>
</html>