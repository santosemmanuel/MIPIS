<!-- include Files -->
<?php

	require_once('includes/session.php');
	require_once('includes/connection.php');
	require_once('functions/functions.php');
    confirm_logged_in();

?>
<!-- /include File-->

<!-- header(php code) -->
<?php 
	include('includes/header.php');
?>
<!-- /header(php code) -->

<body data-spy="scroll">

	<!-- -->
	<div>
		
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
                            <li role="presentation" class="dropdown active">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="glyphicon glyphicon-folder-open">&nbsp;</span>Records
                                    <span class="glyphicon glyphicon-menu-down" style="float: right; margin-top: 2%"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="faculty records.php">Faculty Records</a></li>
                                    <li><a href="student_record.php">student Records</a></li>
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
					<span class="glyphicon glyphicon-folder-open" style="color:#555">&nbsp;</span>
					<li><a href="#">Records</a></li>
					<li><a href="#"></a></li>
				</ol>
				<div class="row">
					<div style="margin-top: -3%; margin-left: 3%; margin-right: 3%">
						<div class="page-header">
							<h1>Student Records &nbsp;<small></small></h1>
						</div>
						<div class="row">
							<div class="col-md-12">
                                <form class="form-inline" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputName2">Type</label>
                                            <select class="form-control" name="view_option">
                                                <option value="tbl_consultation">Consultation and Treatment</option>
                                                <option value="blood_pressure_taking">Blood Pressure Taking</option>
                                                <option value="dental_health">Dental Health</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail2">Department &nbsp;</label>
                                        <select class="form-control" name="department">
                                            <option value="ED">ED</option>
                                            <option value="BEMD">BEMD</option>
                                            <option value="ATD">ATD</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="selc_option" class="btn btn-primary">Submit</button>
                                </form>
                                <div class="row">
                                    <div class="col-md-12"><br />
                                        <?php
                                        if(isset($_POST['selc_option'])){
                                            $view_option = $_POST['view_option'];
                                            $department = $_POST['department'];
                                            echo "<br/><p>&nbsp;Number of Patients: &nbsp;</p>";
                                            echo "<table class='table table-hover'>";
                                            echo     "<thead>";
                                            echo     "<th>#</th>";
                                            echo     "<th>Position</th>";
                                            echo     "<th>Name</th>";
                                            if(($view_option == 'tbl_consultation') || ($view_option == 'dental_health')) {
                                                echo "<th>Intervention/Medicine given</th>";
                                            }else if ($view_option == 'blood_pressure_taking'){
                                                echo "<th>Blood Pressure</th>";
                                            }
                                            echo     "</thead>";
                                            echo     "<tbody>";
                                            $a = 1;
                                                if($view_option == 'tbl_consultation'){
                                                    $result_query_1 = mysql_query("SELECT * FROM {$view_option} WHERE user_position = 'Student' AND department='{$department}'");
                                                while ($row = mysql_fetch_array($result_query_1)){
                                                    $department = $row['department'];
                                                    $user_id = $row['patient_id'];
                                                    $result_query_2 = mysql_query("SELECT * FROM patient_record WHERE department = '$department' AND id='$user_id'");
                                                    while($row = mysql_fetch_array($result_query_2)){
                                                        echo "<tr>";
                                                        echo "<td>".$a."</td>";
                                                        $user_id = $row['id'];
                                                        echo "<td>".$row['user_position']."</td>";
                                                        $full_name = $row['last_name'].",".$row['first_name'];
                                                        echo "<td>".$full_name."</td>";
                                                        $result_query = mysql_query("SELECT * FROM tbl_treatment WHERE patient_id = '$user_id'");
                                                        echo "<td>";
                                                        while($field_name = mysql_fetch_array($result_query)){
                                                            $nursing_treat_id = $field_name['nursing_treatment'];
                                                        	$result_query_treat = mysql_query("SELECT * FROM inventory WHERE id = '$nursing_treat_id'");
															$med_invt = mysql_fetch_array($result_query_treat);
															echo $med_invt['medicine_name']."<br/>";
														}
                                                        echo "</td>";

                                                        echo "</tr>";
                                                        $a++;
                                                    }
                                                }

                                                } else if ($view_option == 'blood_pressure_taking') {
                                                    $result_query_1 = mysql_query("SELECT * FROM {$view_option} WHERE user_position = 'student' AND department='{$department}'");
                                                  while ($row = mysql_fetch_array($result_query_1)) {
                                                      $department = $row['department'];
                                                      $user_id = $row['patient_id'];
                                                      $result_query_2 = mysql_query("SELECT * FROM patient_record WHERE department = '$department' AND id='$user_id'");
                                                    while($row = mysql_fetch_array($result_query_2)){
                                                        echo "<tr>";
                                                        echo "<td>".$a."</td>";
                                                        $user_id = $row['id'];
                                                        echo "<td>".$row['user_position']."</td>";
                                                        $full_name = $row['last_name'].",".$row['first_name'];
                                                        echo "<td>".$full_name."</td>";
                                                        $result_query = mysql_query("SELECT * FROM blood_pressure_taking WHERE patient_id = '$user_id'");
                                                        echo "<td>";

                                                        while($field_name = mysql_fetch_array($result_query)){
                                                            echo $field_name['blood_pressure']."<br />";
                                                        }

                                                        echo "</td>";
                                                        echo "</tr>";
                                                        $a++;
                                                    }
                                                  }
                                                } else if($view_option == 'dental_health'){
                                                    $result_query_1 = mysql_query("SELECT * FROM {$view_option} WHERE user_position = 'student' AND department='{$department}'");
                                                 while ($row = mysql_fetch_array($result_query_1)) {
                                                     $department = $row['department'];
                                                     $user_id = $row['patient_id'];
                                                     $result_query_2 = mysql_query("SELECT * FROM patient_record WHERE department = '$department' AND id='$user_id'");
                                                    while($row = mysql_fetch_array($result_query_2)){
                                                        echo "<tr>";
                                                        echo "<td>".$a."</td>";
                                                        $id = $row['id'];
                                                        echo "<td>".$row['user_position']."</td>";
                                                        $full_name = $row['last_name'].",".$row['first_name'];
                                                        echo "<td>".$full_name."</td>";
                                                        $result_dental = mysql_query("SELECT * FROM dental_health WHERE patient_id = '$id'");
														$name_dental = mysql_fetch_array($result_dental);
                                                    	echo "<td>".$name_dental['medicine']."</td>";
													}

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