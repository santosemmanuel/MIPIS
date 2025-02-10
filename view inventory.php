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
			include('includes/top_nav.php');
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
						<li><a href="#">View Inventory</a></li>
						<li style="float: right"><?php  echo date('l jS \of F Y');?></li>
					</ol>
					<div class="row">
						<div style="margin-top: -3%; margin-left: 3%; margin-right: 3%">
							<div class="page-header">
								<h1>View Inventory&nbsp;<small></small></h1>
							</div>
						</div>
					</div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3 col-md-offset-1">
                                <form class="form-inline" method="post" action="">
                                    <div class="input-group">
                                        <select name="invent_option" class="form-control">
                                            <option value="medicine">Medicine</option>
                                            <option value="supply">Supply</option>
                                            <option value="equipment">Equipment</option>
                                        </select>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Select" name="slc_option" />
                                </form>
                            </div>
                        </div>
                    </div><br />
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div><br />
                                <div class="col-md-6 col-md-offset-7">
                                    <form class="form-inline" method="post">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
                                            <input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon1" name="name_invent" />
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Search" name="search_invent" />
                                    </form>
                                </div><br/><br/>
                                <div class="row">
                                    <div class="panel-body">
                                        <table class="table table-hover">
                                            <thead>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(isset($_POST['slc_option'])){

                                                    $inventory_option = $_POST['invent_option'];

                                                    $result_set = mysql_query("SELECT * FROM inventory WHERE invt_type = '$inventory_option' AND expr = 0 AND number_items > 0");

                                                    $a = 1;
                                                    while($row = mysql_fetch_array($result_set)){
                                                        echo "<tr>";
                                                        echo "<td>".$a."</td>";
                                                        echo "<td>".$row['medicine_name']."</td>";
                                                        echo "<td>".$row['status']."</td>";
                                                        echo "<td>".$row['number_items']."</td>";
                                                ?>
                                                         <td><a href="update_inventory.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-sm">
                                                                 <span class="glyphicon glyphicon-edit"></span>
                                                             </a></td>
                                                <?php
                                                        echo "</tr>";
                                                        $a++;
                                                    }

                                                }
                                                ?>
                                                <?php
                                                if(isset($_POST['search_invent'])){

                                                    $name_invent = $_POST['name_invent'];

                                                    $result_set = mysql_query("SELECT * FROM inventory WHERE medicine_name = '$name_invent' and expr=0");

                                                    while($row = mysql_fetch_array($result_set)){
                                                        echo "<tr>";
                                                        for($a = 0; $a<4; $a++){
                                                            echo "<td>".$row[$a]."</td>";
                                                        }
                                                        ?>
                                                        <td><a href="update_inventory.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-sm">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                            </a></td>
                                                        <?php
                                                        echo "</tr>";
                                                    }

                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel-footer">

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