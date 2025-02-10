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
						<li><a href="report_annual.php">Annual Report</a></li>
                        <li class="active">Faculty Annual Report</li>
						<li style="float: right"><?php  echo date('l jS \of F Y');?></li>
					</ol>
					
					<div class="page-header">
						<h1>Faculty Annual Report &nbsp;<small></small></h1>
					</div>
					<!-- / -->


					<div class="row">
						<div class="col-md-12">
							<div class="col-md-12">
								<form method="post" action="" class="form-inline">
									<div class="form-group">
										<label for="exampleInputName2">Select School Year:</label>
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
										<label for="exampleInputName2">-</label>
											<select class="form-control" name="year_2">
												<?php
													$year = date("Y");
													for($a = 2013; $a <= $year; $a++){
														echo "<option value='$a'>".$a."</option>";
													}
												
												?>
											</select>
									</div>&nbsp;
									<div class="form-group">
										<label for="exampleInputName2">Select:</label>
											<select class="form-control" name="annual_report_type">
												<option value="tbl_consultation">Consultation and Treatment</option>
												<option value="blood_pressure_taking">Blood Pressure</option>
											</select>
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-primary" value="submit" name="sub_an_rep"/>
									</div>
								</form><br />
								<div class="panel panel-default">
		  							<div class="panel-heading">
		    							<h3 class="panel-title"></h3>
		  							</div>
		  							<div class="panel-body">
										<?php if (isset($_POST['sub_an_rep'])) 
											{
												$annual_report_type = $_POST['annual_report_type'];
												$year_1 = $_POST['year_1'];
												$year_2 = $_POST['year_2'];
												$var_total_atd = 0;
												$var_total_ed = 0;
												$var_total_bemd = 0;
												$var_total = 0;
										?>
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
											<?php } ?>
											<div class="panel-footer">
												<div style="margin-left: 85%">
                                                    <a href="print_report_annual.php?annual_rep_type=<?php echo $annual_report_type;?>&&year_1=<?php echo $year_1;?>&&year_2=<?php echo $year_2;?>&&user_position=faculty">
                                                        <button class="btn btn-primary">Print</button>
                                                    </a>
												</div>
											</form>
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