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
			
				<div class="col-md-2">
					<div class="well">
						<ul class="nav nav-pills nav-stacked">
								<li role="presentation" ><a href="default.php"><span class="glyphicon glyphicon-home">&nbsp;</span>Home</a></li>
							  	<li role="presentation" ><a href="add_patient.php"><span class="glyphicon glyphicon-search">&nbsp;</span>Search</a></li>
							  	<li role="presentation" class="dropdown active">
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
											<li><a href="annual_report.php">Annual Report (Student)</a></li>
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
			
			<!-- / -->
			
			<!-- -->
			<div class="col-md-10">
			
				<!-- -->
				<ol class="breadcrumb">
					<span class="glyphicon glyphicon-folder-open" style="color:#555">&nbsp;</span>
					<li><a href="#">Records</a></li>
					<li><a href="#"></a></li>
				</ol>
				<div class="row">
					<div style="margin-top: -3%; margin-left: 3%; margin-right: 3%">
						<div class="page-header">
							<h1>Faculty Records &nbsp;<small></small></h1>
						</div>
						<div class="row">
                            <div class="col-md-12">
                                <form  class="form-inline" method="post" action="">
                                    <select name="view_option" class="form-control">
                                        <option value="tbl_consultation">Consultation And Treatment</option>
                                        <option value="blood_pressure_taking">Blood Pressure Taking</option>
                                        <option value="dental_health">Dental Health</option>
                                    </select>
                                    <input type="submit" class="btn btn-primary" value="Submit" name="submit_option" />
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><br />
                                        <?php
                                            if(isset($_POST['submit_option'])){
                                                $view_option = $_POST['view_option'];
                                                $result_query_1 = mysql_query("SELECT patient_id, user_position FROM {$view_option} WHERE user_position = 'faculty'");
                                                $row = mysql_fetch_array($result_query_1);
                                                $id = $row['patient_id'];
                                                $user_position = $row['user_position'];
                                                $result_query_2 = mysql_query("SELECT * FROM patient_record WHERE user_position='$user_position' AND id = '$id'");
                                                echo "<br/><p>&nbsp;Number of Patients: ".mysql_num_rows($result_query_2)."</p>";
                                                echo "<table class='table table-hover'>";
                                                echo     "<thead>";
                                                echo     "<th>#</th>";
                                                echo     "<th>Position</th>";
                                                echo     "<th>Name</th>";
                                                if($view_option == 'tbl_consultation'){
                                                    echo     "<th>Intervention/Medicine given</th>";
                                                    echo     "</thead>";
                                                    echo     "<tbody>";
                                                    $a = 1;

                                                    while($row = mysql_fetch_array($result_query_2)){
                                                        
														echo "<tr>";
                                                        echo "<td>".$a."</td>";
                                                        $id = $row['id'];
														echo "<td>".$row['user_position']."</td>";
                                                        $full_name = $row['last_name'].",".$row['first_name'];
                                                        echo "<td>".$full_name."</td>";
                                                    	$result_treat_name = mysql_query("SELECT * FROM tbl_treatment WHERE patient_id = '$id'");
														$name = mysql_fetch_array($result_treat_name);
														$nursing_treat_id = $name['nursing_treatment'];
														$result_med_name = mysql_query("SELECT * FROM inventory WHERE id = '$nursing_treat_id'");
														$med_name = mysql_fetch_array($result_med_name);
														echo "<td>".$med_name['medicine_name']."</td>";
																											
                                                        echo "</tr>";
                                                        $a++;
                                                    }
                                                } else if ($view_option == 'blood_pressure_taking') {
                                                    echo    "<th>Blood Pressure</th>";
                                                echo     "</thead>";
                                                echo     "<tbody>";
                                                $a = 1;
                                                while($row = mysql_fetch_array($result_query_2)){
                                                    echo "<tr>";
                                                    echo "<td>".$a."</td>";
                                                    $id = $row['id'];
                                                    echo "<td>".$row['user_position']."</td>";
                                                    $full_name = $row['last_name'].",".$row['first_name'];
                                                    echo "<td>".$full_name."</td>";
                                                    $result_query = mysql_query("SELECT * FROM blood_pressure_taking WHERE patient_id = '$id'");
                                                    echo "<td>";

                                                        while($field_name = mysql_fetch_array($result_query)){
                                                            echo $field_name['blood_pressure']."<br />";
                                                        }

                                                    echo "</td>";
                                                    echo "</tr>";
                                                    $a++;
                                                    }
                                                } else if($view_option == 'dental_health'){

                                                    $a = 1;
													while($row = mysql_fetch_array($result_query_2)){
                                                        echo "<tr>";
                                                        echo "<td>".$a."</td>";
                                                        $id = $row['id'];
                                                        echo "<td>".$row['user_position']."</td>";
                                                        $full_name = $row['last_name'].",".$row['first_name'];
                                                        echo "<td>".$full_name."</td>";
                                                        $a ++;
                                                    }

                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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
	<!-- / -->
</body>
</html>