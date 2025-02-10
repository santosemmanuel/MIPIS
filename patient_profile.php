<!-- include Files -->
<?php

	require_once('includes/session.php');
	require_once('includes/connection.php');
	require_once('functions/functions.php');
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
				<!-- Side Nav -->
				<aside>
					<div class="col-md-2">
						<div class="well">
							<ul class="nav nav-pills nav-stacked">
								<li role="presentation" ><a href="default.php">
									<span class="glyphicon glyphicon-home">&nbsp;</span>Home</a>
								</li>
							  	<li role="presentation" ><a href="add_patient.php">
									<span class="glyphicon glyphicon-search">&nbsp;</span>Search</a>
								</li>
							  	<li role="presentation" class="dropdown">
		    						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		      							<span class="glyphicon glyphicon-folder-open">&nbsp;</span>Records
		      							<span class="glyphicon glyphicon-menu-down" style="float: right; margin-top: 2%"></span>
		    						</a>
								    <ul class="dropdown-menu">
								    	<li><a href="faculty records.php">Faculty Records</a></li>
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
						<span class="glyphicon glyphicon-user" style="color:#555">&nbsp;</span>
						<li><a href="#">Profile's</a></li>
						<li class="active">User Profile</li>
						<li style="float: right"><?php  echo date('l jS \of F Y');?></li>
					</ol>
					<div class="row">
						<div style="margin-top: -3%; margin-left: 3%; margin-right: 3%">
							<div class="page-header">
								<h1>Patient Profile &nbsp;<small></small></h1>
							</div>
						</div>
					</div>

					<div class="row">
						<div style="margin-left: 5%; margin-right: 5%">
							<div>
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
								    <li role="presentation" class="active">
								    	<a href="#home" aria-controls="home" role="tab" data-toggle="tab">
								    		<span class="glyphicon glyphicon-user">&nbsp;</span>Profile
								    	</a>
								    </li>
								    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">History</a></li>
							  	</ul>

							  <!-- Tab panes -->
								<div class="tab-content">
								    <div role="tabpanel" class="tab-pane fade in active" id="home">
								    	<div class="col-md-6">
								    		<center>
									    		<div class="col-md-7" style="margin-top: 10%; margin-left: 15%;">
									    		<a href="#" class="thumbnail">
		  									        <img src="images/20170127_152506.jpg" alt="...">
									    		</a>
									    		</div>
								    		</center>
								    	</div>
								    	<div class="col-md-6">
								    			<div class="" style="margin-top: 10%">
								    				
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
								    					<dl class="dl-horizontal" style="margin-left: -15%">
								    						<dt>Student ID</dt>
								    						<dd><?php echo $user['student_id'];?></dd>
								    						<dt>Course</dt>
								    						<dd><?php echo $user['course'];?></dd>
								    						<dt>Department</dt>
								    						<dd><?php echo $user['department'];?></dd>
								    						<dt>Birthday</dt>
								    						<dd><?php echo $user['b_day'];?></dd>
								    						<dt>Age</dt>
								    						<dd><?php echo $user['age'];?></dd>
								    						<dt>Gender</dt>
								    						<dd><?php echo $user['gender'];?></dd>
								    						<dt>Address</dt>
								    						<dd><?php echo $user['address'];?></dd>
								    					</dl>
								    				<!-- /php code here -->
								    				
								    			</div>
								    	</div>
								    </div>
									    <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <div class="col-md-12"><br />
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Consultation and Treatment</div>
	                                                    <div class="panel-body">
	                                                        <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
	                                                            Show
	                                                        </a>
	                                                        <div class="collapse" id="collapseExample"><br/>
															<div class="well">
																<table class="table table-hover table-condensed">
		                                                            <thead>
		                                                                <th>Date</th>
		                                                                <th>Chief Complain</th>
		                                                                <th>Nursing Diagnosis</th>
		                                                                <th>Nursing Treatment</th>
		                                                                <th>No. Of Items</th>
		                                                            </thead>

		                                                            <tbody>
		                                                                <?php
                                                                            $rec_limit_ct = 5;

                                                                            $rec_count_ct = pagination($id,"tbl_consultation");

                                                                            if( isset($_GET['page_ct'] ) ) {
                                                                                $page_ct = $_GET['page_ct'] + 1;
                                                                                $offset_ct = $rec_limit_ct * $page_ct ;
                                                                            }else {
                                                                                $page_ct = 0;
                                                                                $offset_ct = 0;
                                                                            }

                                                                            $left_rec_ct = $rec_count_ct - ($page_ct * $rec_limit_ct);

		                                                                	$query = "SELECT tbl_consultation.con_date, "; 
																			$query .= "tbl_consultation.chief_complain, ";
																			$query .= "tbl_consultation.nurse_diagnosis, "; 
																			$query .= "tbl_treatment.nursing_treatment, "; 
																			$query .= "tbl_treatment.num_item FROM tbl_consultation ";		
																			$query .= "INNER JOIN tbl_treatment ";
																			$query .= "WHERE tbl_consultation.patient_id = '$id' ";
                                                                            $query .= "ORDER BY tbl_consultation.con_date ASC ";
                                                                            $query .= "LIMIT $offset_ct, $rec_limit_ct";

		                                                                    $result_user = mysql_query($query);
		                                                                    while($field_name_consult = mysql_fetch_array($result_user)){
																				$date = $field_name_consult['con_date'];
																				$chief_complain = $field_name_consult['chief_complain'];
																				$nurse_diagnosis = $field_name_consult['nurse_diagnosis'];
																				$invt_id = $field_name_consult['nursing_treatment'];
																				$num_item = $field_name_consult['num_item'];
																				echo "<tr>";
																					echo "<td>".$date."</td>";
																					echo "<td>".$chief_complain."</td>";
																					echo "<td>".$nurse_diagnosis."</td>";
																					echo "<td>".$invt_id."</td>";
																					echo "<td>".$num_item."</td>";
																				echo "</tr>";
																			}
		                                                                ?>
		                                                            </tbody>
		                                                        </table>
	                                                        </div>
                                                                <nav aria-label="...">
                                                                    <ul class="pager">
                                                                        <?php
                                                                        if( $page_ct > 0 ) {
                                                                        $last_ct = $page_ct - 2;?>
                                                                        <li class="previous"><a href = "patient_profile.php?id=<?php echo $id; ?>&&page_ct=<?php echo $last_ct; ?>">Last 10 Records</a> |</li>
                                                                        <li class="next"><a href = "patient_profile.php?id=<?php echo $id; ?>&&page_ct=<?php echo $page_ct; ?>">Next 10 Records</a></li>
                                                                        <?php }else if( $page_ct == 0 ) {?>
                                                                        <li class="next"><a href = "patient_profile.php?id=<?php echo $id; ?>&&page_ct=<?php echo $page_ct; ?>">Next 10 Records</a></li>
                                                                        <?php }else if( $left_rec_ct < $rec_limit_ct ) {
                                                                        $last_ct = $page_ct - 2; ?>
                                                                        <li class="previous"><a href = "patient_profile.php?id=<?php echo $id; ?>&&page_ct=<?php echo $last_ct; ?>">Last 10 Records</a></li>
                                                                        <?php }?>
                                                                    </ul>
                                                                </nav>
														</div>
                                                    </div>
                                                </div><br />
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Blood Pressure Taking</div>
														<div class="panel-body">
														<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                                                            Show
                                                        </a>
                                                        <div class="collapse" id="collapseExample1"><br/>
														
														<div class="well">
														<table class="table table-hover table-condensed">
                                                            <thead>
                                                                <th>Date</th>
                                                                <th>Blood Pressure</th>
																<th>Remarks</th>
                                                            </thead>

                                                            <tbody>
                                                                <?php
                                                                        $rec_limit_bp =5;

                                                                        $rec_count_bp = pagination($id,"blood_pressure_taking");

                                                                        if( isset($_GET['page_bp'] ) ) {
                                                                            $page_bp = $_GET['page_bp'] + 1;
                                                                            $offset_bp = $rec_limit_bp * $page_bp ;
                                                                        }else {
                                                                            $page_bp = 0;
                                                                            $offset_bp = 0;
                                                                        }

                                                                        $left_rec_bp = $rec_count_bp - ($page_bp * $rec_limit_bp);

                                                                $result_bp = mysql_query("SELECT * FROM blood_pressure_taking WHERE patient_id = '$id' LIMIT $offset_bp, $rec_limit_bp");
																		while($field_name_bp = mysql_fetch_array($result_bp)){
																			$con_date = $field_name_bp['con_date'];
																			$blood_pressure = $field_name_bp['blood_pressure'];
																			$remarks = $field_name_bp['remarks'];
																			echo "<tr>";
																				echo "<td>".$con_date."</td>";
																				echo "<td>".$blood_pressure."</td>";
																				echo "<td>".$remarks."</td>";
																			echo "</tr>";
																	}
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                            <nav aria-label="...">
                                                                <ul class="pager">
                                                                    <?php
                                                                    if( $page_bp > 0 ) {
                                                                        $last_bp = $page_bp - 2;?>
                                                                        <li class="previous"><a href = "patient_profile.php?id=<?php echo $id; ?>&&page_bp=<?php echo $last_bp; ?>">Last 10 Records</a> |</li>
                                                                        <li class="next"><a href = "patient_profile.php?id=<?php echo $id; ?>&&page_bp=<?php echo $page_bp; ?>">Next 10 Records</a></li>
                                                                    <?php }else if( $page_bp == 0 ) {?>
                                                                        <li class="next"><a href = "patient_profile.php?id=<?php echo $id; ?>&&page_bp=<?php echo $page_bp; ?>">Next 10 Records</a></li>
                                                                    <?php }else if( $left_rec_bp < $rec_limit_bp ) {
                                                                        $last_bp = $page_bp - 2; ?>
                                                                        <li class="previous"><a href = "patient_profile.php?id=<?php echo $id; ?>&&page_bp=<?php echo $last_bp;?>">Last 10 Records</a></li>
                                                                    <?php }?>
                                                                </ul>
                                                            </nav>
														</div>
														</div>
                                                </div>
                                                <br />
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Dental Health</div>
                                                    <div class="panel-body">
														<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                                                            Show
                                                        </a>
                                                        <div class="collapse" id="collapseExample2"><br/>
														
														<div class="well">
														<table class="table table-hover table-condensed">
                                                            <thead>
                                                                <th>Date</th>
                                                                <th>Chief Complain</th>
																<th>Vital sign</th>
																<th>Diagnosis</th>
																<th>Treatment</th>
																<th>Medicine</th>
                                                            </thead>

                                                            <tbody>
																<?php
                                                                    $rec_limit_dh = 5;

                                                                    $rec_count_dh = pagination($id,"dental_health");

                                                                    if( isset($_GET['page_dh'] ) ) {
                                                                        $page_dh = $_GET['page_dh'] + 1;
                                                                        $offset_dh = $rec_limit_dh * $page_dh ;
                                                                    }else {
                                                                        $page_dh = 0;
                                                                        $offset_dh = 0;
                                                                    }

                                                                    $result_dental = mysql_query("SELECT * FROM dental_health WHERE patient_id = '$id' LIMIT $offset_dh, $rec_limit_dh");
																	while($name_dental = mysql_fetch_array($result_dental)){
																		echo "<tr>";
																		echo "<td>".$name_dental['con_date']."</td>";
																		echo "<td>".$name_dental['chief_complaint']."</td>";
																		echo "<td>".$name_dental['vital_sign']."</td>";
																		echo "<td>".$name_dental['diagnosis']."</td>";
																		echo "<td>".$name_dental['treatment']."</td>";
																		echo "<td>".$name_dental['medicine']."</td>";
																		echo "</tr>";
																	}
																?>
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                            <nav aria-label="...">
                                                                <ul class="pager">
                                                                    <?php
                                                                    if( $page_dh > 0 ) {
                                                                        $last_dh = $page_dh - 2;?>
                                                                        <li class="previous"><a href = "patient_profile.php?id=<?php echo $id; ?>&&page_dh=<?php echo $last_dh; ?>">Last 10 Records</a> |</li>
                                                                        <li class="next"><a href = "patient_profile.php?id=<?php echo $id; ?>&&page_dh=<?php echo $page_dh; ?>">Next 10 Records</a></li>
                                                                    <?php }else if( $page_dh == 0 ) {?>
                                                                        <li class="next"><a href = "patient_profile.php?id=<?php echo $id; ?>&&page_dh=<?php echo $page_dh; ?>">Next 10 Records</a></li>
                                                                    <?php }else if( $left_rec_dh < $rec_limit_dh ) {
                                                                        $last_dh = $page_dh - 2; ?>
                                                                        <li class="previous"><a href = "patient_profile.php?id=<?php echo $id; ?>&&page_dh=<?php echo $last_dh; ?>">Last 10 Records</a></li>
                                                                    <?php }?>
                                                                </ul>
                                                            </nav>
														</div>
                                                    </div>
                                                </div>
                                            </div>
									    </div>
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
				<!-- /-->
				
			</div>
			<!-- /-->
		
		</div>
		<!-- /-->

	</div>
	<!-- / -->
</body>
</html>