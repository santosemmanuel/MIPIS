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

												$result = mysql_query("SELECT * FROM patient_record WHERE id='$id'");

												$user = mysql_fetch_array($result);

                                                $name_user = $user['last_name'].", ";
												$name_user .= $user['first_name']." ";
												$name_user .= $user['middle_name'];

                                                if($user['user_position'] == "student") {

                                                    echo "<h4>".$name_user."<span style=\"margin-left: 5%\" class=\"label label-info\">".$user['user_position'];
                                                    echo "</span></h4>";
                                                    echo "<hr />";

                                                    echo "<dl class='dl-horizontal'>";
												    echo "<dt>Student ID</dt>";
												    echo "<dd>".$user['student_id']."</dd>";
                                                    echo "<dt>Course</dt>";
                                                    echo "<dd>".$user['course']."</dd>";
                                                    echo "<dt>Department</dt>";
                                                    $department = $user['department'];
                                                    echo "<dd>".$department."</dd>";
                                                    echo "<dt>Birthday</dt>";
                                                    echo "<dd>".$user['b_day']."</dd>";
                                                    echo "<dt>Age</dt>";
                                                    echo "<dd>".$user['age']."</dd>";
                                                    echo "<dt>Gender</dt>";
                                                    echo "<dd>".$user['gender']."</dd>";
                                                    echo "<dt>Address</dt>";
                                                    echo "<dd>".$user['address']."</dd>";
                                                    echo "</dl>";

                                                } else if ($user['user_position'] == "faculty") {

                                                    echo "<h4>".$name_user."<span style=\"margin-left: 5%\" class=\"label label-info\">".$user['user_position'];
                                                    echo "</span></h4>";
                                                    echo "<hr />";

                                                    echo "<dl class='dl-horizontal'>";
                                                    echo "<dt>Age</dt>";
                                                    echo "<dd>".$user['age']."</dd>";
                                                    echo "<dt>Gender</dt>";
                                                    echo "<dd>".$user['gender']."</dd>";
                                                    echo "<dt>Address</dt>";
                                                    echo "<dd>".$user['address']."</dd>";
                                                    echo "</dl>";

                                                }
                                            $user_position = $user['user_position'];
											?>


										</div>
										<div class="col-md-5">
                                            <form class="form-horizontal" method="post">
                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="cough" name="name_1[][1]">
                                                            Cough &nbsp;
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" value="headache" name="name_1[][1]">
                                                            Headache &nbsp;
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" value="stomachache" name="name_1[][1]">
                                                            Stomachache &nbsp;
                                                        </label>
                                                    </div><br/>
                                                    <input type="text" class="form-control" name="name_1[][1]" placeholder="Other Complain"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nurse Diagnosis</label>
                                                    <textarea class="form-control" rows="3" name="nurse_diagnosis"></textarea>
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

                                            if(isset($_POST['name_1'])){
                                                $ctr = 1;
                                                $a = 0;
                                                $b = 0;
                                                $nurse_diagnosis = $_POST['nurse_diagnosis'];
                                                foreach($_POST['name_1'] as $_name_1){
                                                    if($ctr==1)
                                                    {
                                                        $a = $_name_1[$ctr];
                                                    }
                                                    $ctr++;
                                                    if($ctr == 2){
                                                        if($a==""){

                                                        }else {
                                                            $query = "INSERT INTO tbl_consultation ";
                                                            $query .= "SET patient_id='$id', ";
                                                            if($user['user_position'] == "student"){
                                                                $query .= "department='$department', ";
                                                            }else {
                                                                $query .= "";
                                                            }
                                                            $query .= "user_position='$user_position', ";
                                                            $query .= "con_date='$date', ";
                                                            $query .= "chief_complain='$a', ";
                                                            $query .= "nurse_diagnosis='$nurse_diagnosis'";

                                                            mysql_query($query);
                                                        }
                                                        $ctr = 1;?>
                                                        <script>
                                                            window.location.href="consultation_and_treatment2.php?id=<?php echo $id;?>";
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
</body>
</html>