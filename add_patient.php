<!-- Include Files -->
<?php

	require_once('includes/session.php');
	require_once('includes/connection.php');
	require_once('functions/search_function.php');
	confirm_logged_in();

?>
<!-- /Include Files -->

<!-- header(php code) -->
<?php 
	include('includes/header.php');
?>
<!-- /header(php code) -->

<body data-spy="scroll" data-target="#navbar-example">

	<!-- -->

		
		<!-- top nav(php code)-->
		<?php
			include('/includes/top_nav.php');
		?>
		<!-- /top nav(php code)-->

		<!-- -->
		<div class="row">
			
			<div class="col-md-12">

				<!-- Side Nav -->
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
								    	<li><a href="faculty records.php">Faculty Records </a></li>
								    	<li><a href="student_record.php">Student Records </a></li>
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
				<!-- /Side Nav -->
				
				<!-- -->
				<div class="col-md-10">
				
					<!-- -->
					<ol class="breadcrumb">
						<span class="glyphicon glyphicon-search" style="color:#555">&nbsp;</span>
						<li class="active">Search</li>
						<li style="float: right"><?php  echo date('l jS \of F Y');?></li>
					</ol>
					<div class="page-header">
						<h1>Search Patient Records &nbsp;<small></small></h1>
					</div>
						
					<!-- / -->

					<!-- -->
					<div style="margin-left:6%; margin-right:9%">
						<div class="row">
							<div class="col-md-7">
								<form class="form-inline" method="post">
									<div class="input-group">
										<select name="option" class="form-control">
											<option value="1">Student ID</option>
											<option value="2">Faculty Last Name</option>
											<option value="3">Student Last Name</option>
										</select>
									</div>
									<div class="input-group">
			  							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
			  							<input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon1" name="patient_name" />
									</div>
									<input type="submit" class="btn btn-primary" value="Search" name="search_patient" />
								</form>		
							</div>
						</div>

						<br />
						<div class="row">
							<table class="table table-hover table-condensed">
	  							<thead>
	  								<th>#</th>
	  								<th>School ID</th>
	  								<th>Last Name</th>
	  								<th>First Name</th>
	  								<th>Middle Name</th>
	  								<th>Course</th>
	  								<th>Gender</th>
	  								<th>Age</th>
	  								<th>Action</th>
	  							</thead>
	  							<div id="navbar-example">
	  							<tbody>

	  								<!-- php code here-->
	  								<?php 
	  										
	  									// if statement isset serch_patient
	  									if(isset($_POST['search_patient'])){

											$name = $_POST['patient_name'];
											$option = $_POST['option'];

											$query = search_query($option, $name);

		  									if($query == false){
		  										?>
		  										<div class="alert alert-danger alert-dismissible" role="alert">
  													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  														<span aria-hidden="true">&times;</span></button>
  													<strong>Warning!</strong> Patient Not Found
												</div>
											<?php
												unset($query);
		  									} else {
		  									$result_set = mysql_query($query);
		  										
		  									// while statement
		  									while($row = mysql_fetch_array($result_set)){

		  										echo "<tr>";
		  										echo "<td width='5%'>".$row['id']."</td>";
					  							echo "<td>".$row['student_id']."</td>";
					  							echo "<td>".$row['last_name']."</td>";
					  							echo "<td>".$row['first_name']."</td>";
					  							echo "<td>".$row['middle_name']."</td>";
					  							echo "<td>".$row['course']."</td>";
					  							echo "<td>".$row['gender']."</td>";
					  							echo "<td>".$row['age']."</td>";			
					  								
					  				?>

					  							<td>
		  											<div class="btn-group">
														<button class="btn btn-primary btn-sm dropdown-toggle" 
														type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												    		Add&nbsp;<span class="caret"></span>
												  		</button>
														<ul class="dropdown-menu">
														  			<li>
														  				<a href="consultation_and_treatment.php?id=<?php echo $row['id']; ?>">
														  				Consultation and Treatment</a>
														  			</li>
														  	<li><a href="blood_pressure_taking.php?id=<?php echo $row['id']; ?>">Blood Pressure Taking</a></li>
														  	<li><a href="dental_health.php?id=<?php echo $row['id']; ?>">Dental Health</a></li>
														</ul>	
													</div>
													<a href="patient_profile.php?id=<?php echo $row['id']; ?>">
														<button class="btn btn-default btn-sm"> 
															<span class="glyphicon glyphicon"></span>More Info
														</button>
													</a>
				  								</td>
		  							<?php
					  							echo "</tr>";

		  									}//end of while statement

		  								}
	  									}// end of if statement isset serch_patient
	  								?>
	  								<!-- /php code here-->
	  									
	  							</tbody>
	  						</div>
						</table>	
					</div>
					<!-- / -->

				</div>
				<!--/ -->

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
			<!-- /-->
		
		</div>
		<!-- /-->

	</div>
	<!-- / -->
</body>
</html>		