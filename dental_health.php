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
    require_once('functions/functions.php');
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
						<li class="active">Dental Health</li>
						<li style="float: right"><?php  echo date('l jS \of F Y');?></li>
					</ol>
					<div class="row">
						<div style="margin-top: -3%; margin-left: 3%; margin-right: 3%">
							<div class="page-header">
								<h1>Dental Health &nbsp;<small></small></h1>
							</div>
						</div>
					</div>
					<!-- / -->

					<div class="row">
						<div class="col-md-12">
						
							<div class="col-md-11">
								<div class="panel panel-default">
		  							<div class="panel-heading">
		    							<h3 class="panel-title"></h3>
		  							</div>
		  							<div class="panel-body">
		  								<div class="col-md-5">
		  									<!-- php code here -->
											<?php 

												$id = $_GET['id'];
												$result = mysql_query("SELECT * FROM patient_record WHERE id='$id'");
												    					
												$user = mysql_fetch_array($result);

												$name_user = $user['last_name'].", ";
												$name_user .= $user['first_name']." ";
												$name_user .= $user['middle_name'];

												echo "<h4>".$name_user."<span style=\"margin-left: 5%\" class=\"label label-info\">".$user['user_position'];
												echo "</span></h4>";
												echo "<hr />";
												    					
											?>

                                                <?php
                                                    if($user['user_position'] == 'student'){
                                                ?>
												<dl class="dl-horizontal" style="margin-left: -15%">

                                                    <dt>Student ID</dt>
												    <dd><?php echo $user['student_id'];?></dd>
												    <dt>Course</dt>
												    <dd><?php echo $user['course'];?></dd>
												    <dt>Department</dt>
													<?php $department = $user['department'];?>
												    <dd><?php echo $department;?></dd>
												    <dt>Birthday</dt>
												    <dd><?php echo $user['b_day'];?></dd>
												    <dt>Age</dt>
												    <dd><?php echo $user['age'];?></dd>
												    <dt>Gender</dt>
												    <dd><?php echo $user['gender'];?></dd>
												    <dt>Address</dt>
												    <dd><?php echo $user['address'];?></dd>
												</dl>
                                                <?php } else if ($user['user_position'] == 'faculty') {
                                                    ?>
                                                <dl class="dl-horizontal" style="margin-left: -15%">
                                                    <dt>Age</dt>
                                                    <dd><?php echo $user['age'];?></dd>
                                                    <dt>Gender</dt>
                                                    <dd><?php echo $user['gender'];?></dd>
                                                    <dt>Address</dt>
                                                    <dd><?php echo $user['address'];?></dd>
                                                </dl>
                                                <?php   } ?>
		  								</div>
		  								<div class="col-md-5">
			  								<form action="" method="post" class="form-horizontal">
												<div class="input-group">
													<label>Chief Complain</label>
													<textarea class="form-control" rows="2" cols="16" name="chief_complain"></textarea>
												</div>
												<div class="input-group">
													<label>Vital Sign</label>
													<textarea class="form-control" rows="2" cols="16" name="vital_sign"></textarea>
												</div>
												<div class="input-group">
													<label>Diagnosis</label>
													<textarea class="form-control" rows="2" cols="16" name="diagnosis"></textarea>
												</div>
												<div class="input-group">
													<label>Treatment</label>
													<textarea class="form-control" rows="2" cols="16" name="treatment"></textarea>
												</div>
												<div class="input-group">
													<label>Medicine</label>
													<div class="checkbox">
														  <label>
															<input type="checkbox" name="med_1" value="Amoxicillin">
															Amoxicillin 500mg 1cap 3x a day for 2days #6
														  </label>
														  <label>
															<input type="checkbox" name="med_2" value="Mefenamic">
															Mefenamic Acid 500mg 1cap 3x a day for 1day #3
														  </label>
														  <label>
															<input type="checkbox" name="med_3" value="Tranexamic">
															Tranexamic Acid 500mg 1cap 2x a day #3
														  </label>
													</div>
												</div>
										</div>
									</div>
		  							<div class="panel-footer">
		  									<div style="margin-left: 85%">
		  										<input type="submit" class="btn btn-primary" value="Submit" name="submit_dental">
		  									</div>
										</form>
										<?php
											if(isset($_POST['submit_dental'])){
                                                $id = $_GET['id'];
												$chief_complain = $_POST['chief_complain'];
												$vital_sign = $_POST['vital_sign'];
												$diagnosis = $_POST['diagnosis'];
												$user_position = $user['user_position'];
												$treatment = $_POST['treatment'];
                                                $department = $user['department'];
												$med_1 = $_POST['med_1'];
												$med_2 = $_POST['med_2'];
												$med_3 = $_POST['med_3'];
												$date = strip_zeros_from_date(date("Y/*m/*d",time()));
												$med_treat = $med_1.",".$med_2.",".$med_3;
                                                $update_complete = 1;
												$update_complete = update_dental_med($med_1,$med_2,$med_3);
												if($update_complete == 1){
                                                    $query = "INSERT INTO dental_health ";
                                                    $query .= "SET patient_id = '$id', ";
                                                    $query .= "department = '$department', ";
                                                    $query .= "user_position = '$user_position', ";
                                                    $query .= "chief_complaint = '$chief_complain', ";
                                                    $query .= "vital_sign = '$vital_sign', ";
                                                    $query .= "diagnosis = '$diagnosis', ";
                                                    $query .= "treatment = '$treatment', ";
                                                    $query .= "medicine = '$med_treat', ";
                                                    $query .= "con_date = '$date'";
                                                    mysql_query($query);
                                                    echo "<script>";
															echo "window.location.href='dental_health.php?id=$id'";
													echo "</script>";
												}
												
											}
										?>
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