<!-- include Files -->
<?php

require_once('includes/session.php');
require_once('includes/connection.php');
require('functions/functions.php');
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
                <li role="presentation" class="active"><a href="add_patient.php"><span class="glyphicon glyphicon-search">&nbsp;</span>Search</a></li>
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
                <li role="presentation" class="dropdown">
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
    <span class="glyphicon glyphicon-plus" style="color:#555">&nbsp;</span>
    <li><a href="add_patient.php">Add Record</a></li>
    <li class="active">Consultation and Treatment</li>
    <li style="float: right"><?php  echo date('l jS \of F Y');?></li>
</ol>
<div class="page-header">
    <h1>Consultation And Treatment &nbsp;<small></small></h1>
</div>
<!-- / -->


<div class="row">

    <div class="col-md-12">

        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-5">
                        <!-- php code here -->
                        <?php

                        $id = $_GET['id'];
                        $date = strip_zeros_from_date(date("Y/*m/*d",time()));
                        $result = mysql_query("SELECT * FROM patient_record WHERE id='$id'");

                        $user = mysql_fetch_array($result);

                        $name_user = $user['last_name'].", ";
                        $name_user .= $user['first_name']." ";
                        $name_user .= $user['middle_name'];

                        if($user['user_position'] == "student") {

                            echo "<h4>".$name_user."<span style=\"margin-left: 5%\" class=\"label label-info\">".$user['user_position'];
                            echo "</span></h4>";
                            echo "<hr />";

                        } else if ($user['user_position'] == "faculty") {

                            echo "<h4>".$name_user."<span style=\"margin-left: 5%\" class=\"label label-info\">".$user['user_position'];
                            echo "</span></h4>";
                            echo "<hr />";

                        }
                        $user_position = $user['user_position'];


                        ?>

                    </div>
                    <div class="col-md-5">
                        <form class="form-horizontal" method="post">
                            <div id="input_fields_wrap">
                                <hr/>
                                <div class="input-group">
                                    <select name="name[][1]" class="form-control">
                                        <?php
                                        $result_invt = mysql_query("SELECT * FROM inventory WHERE expr = 0 AND number_items > 0");
                                        while($name = mysql_fetch_array($result_invt)){
                                            $med_id = $name['id'];
                                            $num_items = $name['number_items'];
                                            echo "<option value ='$med_id'>".$num_items."&nbsp;-&nbsp;".$name['medicine_name']."</option>";
                                        }
                                        ?>
                                    </select>
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" id="add_field_button" type="button">
                                                                <span class="glyphicon glyphicon-plus"></span>
                                                            </button>
                                                        </span>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" placeholder="Input number of items" type="text" name="name[][2]">
                                </div>
                            </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div style="margin-left: 85%">
                        <input type="submit" class="btn btn-primary" name="submit_con_treat" value="Submit"/>
                    </div>
                    </form>
                </div>
                <?php
                if(isset($_POST['submit_con_treat'])){
                    $user_position = $user['user_position'];
                    $date = strip_zeros_from_date(date("Y/*m/*d",time()));

                    if(isset($_POST['name'])){
                        $ctr_1 = 1;
                        $c = 0;
                        $d = 0;

                        foreach($_POST['name'] as $_name){
                            if($ctr_1==1)
                            {
                                $c = $_name[$ctr_1];
                            }

                            if($ctr_1==2)
                            {
                                $d = $_name[$ctr_1];
                            }
                            $ctr_1++;
                            if($ctr_1 == 3){
                                if(($c=="")||($d=="")){

                                }else {
                                    $update_complete = update_invent($c,$d);
                                    if($update_complete == 1){
                                        mysql_query("INSERT INTO tbl_treatment SET patient_id='$id', nursing_treatment='$c', num_item = '$d'");
                                    }
                                }
                                $ctr_1 = 1;?>
                                <script>
                                    window.location.href="consultation_and_treatment.php?id=<?php echo $id;?>";
                                </script><?php
                            }
                        }
                    }
                }
                ?>
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
<script>
    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $("#input_fields_wrap"); //Fields wrapper
        var add_button      = $("#add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><hr/><a href="#" class="remove_field" style="float:right"><h3><span class="glyphicon glyphicon-remove"></span><h3></a><select name="name[][1]" class="form-control"><?php
                                        $result = mysql_query("SELECT * FROM inventory WHERE expr= 0 AND number_items > 0");
                                        while($row = mysql_fetch_array($result)){
                                            $med_id = $row['id'];
                                            $num_items = $name['number_items'];
                                            echo "<option value=\"$med_id\">".$num_items."&nbsp;-&nbsp;".$row['medicine_name']."</option>";
                                        }
                                      ?></select>' +
                    '<input class="form-control" placeholder="Input number of items" type="text" name="name[][2]"/>' +
                    '</div>'); //add input box
            }
        });
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });

</script>
</body>
</html>