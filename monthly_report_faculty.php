<!-- include Files -->
<?php

	require_once('includes/session.php');
	require_once('includes/connection.php');
	require("functions/functions.php");
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
						<li><a href="add_patient.php">Reports</a></li>
                        <li><a href="report_monthly.php">Monthly Report</a></li>
						<li class="active">Faculty Monthly Report</li>
						<li style="float: right"><?php  echo date('l jS \of F Y');?></li>
					</ol>
					
					<div class="page-header">
						<h1>Faculty Monthly Report &nbsp;<small></small></h1>
					</div>
					<!-- / -->


					<div class="row">
						<div class="col-md-12">
						
							<div class="col-md-11">
								<form class="form-inline" method="post" action="">
									<div class="form-group">
										<label for="exampleInputName2">Select Month:</label>
											<select class="form-control" name="month">
												<?php
													for($b = 1; $b <= 12; $b++){
														echo "<option>".$b."</option>";
													}
												
												?>
											</select>
									</div>
									<div class="form-group">
										<label for="exampleInputName2">Select Year:</label>
											<select class="form-control" name="year">
												<?php
													$year = date("Y");
													for($a = 2013; $a <= $year; $a++){
														echo "<option value='$a'>".$a."</option>";
													}
												
												?>
											</select>
									</div>
									<div class="form-group">
										<label for="exampleInputName2">Select:</label>
											<select class="form-control" name="month_report_type">
												<option value="tbl_consultation">Consultation and Treatment</option>
												<option value="blood_pressure_taking">Blood Pressure</option>
											</select>
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-primary" value="submit" name="month_selc"/>
									</div>
								</form><br />
								<div class="panel panel-default">
		  							<div class="panel-heading">
		    							<h3 class="panel-title"></h3>
		  							</div>
		  							<div class="panel-body">
										<?php
											if(isset($_POST['month_selc'])){
												$year = $_POST['year'];
												$month = $_POST['month'];
												$month_report_type = $_POST['month_report_type'];
												
												 $var_month_report = $year."/".$month."__";
										?>
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
										</table>
										<?php }?>
		  							</div>
		  							<div class="panel-footer">
		  									<div style="margin-left: 85%">
                                                <a href="print_report_monthly.php?year=<?php echo $year;?>&&month=<?php echo $month;?>&&month_rep_type=<?php echo $month_report_type;?>&&var_month_rep=<?php echo $var_month_report;?>&&user_position=faculty">
                                                    <button class="btn btn-primary">Print Report</button></a>
		  									</div>
		  								</form>
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