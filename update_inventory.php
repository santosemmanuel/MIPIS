<!-- include Files -->
<?php

require_once('includes/session.php');
require_once('includes/connection.php');
confirm_logged_in();

?>
<!-- /include Filea -->

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
                        <li role="presentation" ><a href="add_patient.php"><span class="glyphicon glyphicon-search">&nbsp;</span>Search</a></li>
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
                        <li role="presentation" class="dropdown active">
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
                <span class="glyphicon glyphicon-menu-hamburger" style="color:#555">&nbsp;</span>
                <li><a href="#">Inventory</a></li>
                <li><a href="#">Update Inventory</a></li>
                <li style="float: right"><?php  echo date('l jS \of F Y');?></li>
            </ol>
            <div class="row">
                <div style="margin-top: -3%; margin-left: 3%; margin-right: 3%">
                    <div class="page-header">
                        <h1>Update Inventory&nbsp;<small></small></h1>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3 col-md-offset-1">

                    </div>
                </div>
            </div><br />
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">
                            <?php

                                error_reporting(0);
                                $id = $_GET['id'];
								$null = 0;
                                $result_set = mysql_query("SELECT * FROM inventory WHERE id = '$id' AND rep_num_item = '$null' ");
                                $found_item = mysql_fetch_array($result_set);

                            ?>
                            <div class="col-md-12">

                                <form method="post" action="functions/update_inventory_function.php?id=<?php echo $found_item['id'];?>" class="form-inline">
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <label>ID</label>
                                            <input type="text" class="form-control" name="" value="<?php echo $found_item['id'];?>" disabled/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <label>Type</label>
                                            <select name="selc_option" value="<?php echo $found_item['status'];?>" class="form-control">
                                                <option value="Medicine">Medicine</option>
                                                <option value="Supply">Supply</option>
                                                <option value="Equipment">Equipment</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <label>Name</label>
                                            <input type="text" value="<?php echo $found_item['medicine_name'];?>" class="form-control" name="med_name" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <label>No. of Item</label>
                                            <input type="text" class="form-control" name="num_item" value="<?php echo $found_item['number_items'];?>"/>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" name="update_invent" value="Update"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / -->

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