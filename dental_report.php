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
						<li><a href="report_dental.php">Dental Health Report</a></li>
                        <li class="active">Student Dental Health Report</li>
						<li style="float: right"><?php  echo date('l jS \of F Y');?></li>
					</ol>
					
					<div class="page-header">
						<h1>Student Dental Health Report &nbsp;<small></small></h1>
					</div>
					<!-- / -->


					<div class="row">
						<div class="col-md-12">
						
							<div class="col-md-11">
								<form class="form-inline" method="post" action="">
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
										<label for="exampleInputName2">&nbsp; - &nbsp;</label>
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
										<label for="exampleInputName2">Select Semester: </label>
											<select class="form-control" name="semester">
												<option value="3">All</option>
												<option value="1">1st Sem</option>
												<option value="2">2nd Sem</option>
											</select>
									</div>&nbsp;
									<div class="form-group">
										<input type="submit" class="btn btn-primary" value="submit" name="dental_selc"/>
									</div>
								</form><br />
								<div class="panel panel-default">
		  							<div class="panel-heading">
		    							<h3 class="panel-title"></h3>
		  							</div>
		  							<div class="panel-body">
										<?php 
											if(isset($_POST['dental_selc'])){
												$sem = $_POST['semester'];
												$year_1 = $_POST['year_1'];
												$year_2 = $_POST['year_2'];
										?>
										<table class="table table-bordered table condensed">
											<thead>
												<th width="29%"><div align="center">Department</div></th>
												<?php
													$den_year = 0;
                                                    $con = 0;
                                                    $sem_ed_total = 0;
                                                    $sem_bemd_total = 0;
                                                    $sem_atd_total = 0;
													$den_year = $year_2 - 1;
													if($den_year == $year_1){
															
													if($sem == 1) {
														$arr_year = array("June" => "$year_1/6", "July" => "$year_1/7","August"=>"$year_1/8", "September" => "$year_1/9", "October" => "$year_1/10");
														foreach($arr_year as $string => $int){
															echo "<th><div align='center'>".$string."</div></th>";
														}

													} else if($sem == 2) {
														$arr_year = array("November" => "$year_1/11", "December" => "$year_1/12", "January" => "$year_2/1", "February" => "$year_2/2", "March" => "$year_2/3");
														foreach($arr_year as $string => $int){
															echo "<th><div align='center'>".$string."</div></th>";
														}

													} else if($sem == 3){
														$arr_year_1 = array("June" => "$year_1/6", "July" => "$year_1/7","August"=>"$year_1/8", "September" => "$year_1/9", "October" => "$year_1/10");
														foreach($arr_year_1 as $string => $int){
															echo "<th><div align='center'>".$string."</div></th>";
														}
														$arr_year_2 = array("November" => "$year_1/11", "December" => "$year_1/12", "January" => "$year_2/1", "February" => "$year_2/2", "March" => "$year_2/3");
														foreach($arr_year_2 as $string_1 => $int_2){
															echo "<th><div align='center'>".$string_1."</div></th>";
														}
                                                        $con = 1;
													} else {
													}		

												?>
												<th><div align="center">Total</div></th>
											</thead>
											<tbody>
												<tr>
													<td>Education Department</td>
                                                    <?php
                                                        if($con == 1){
														    $total_ed_sem1 = 0;
															foreach($arr_year_1 as $int_year){
                                                                $int_year = $int_year."__";
                                                                $ed_total_sem1 = report_month_num("dental_health","ED",$int_year);
                                                                echo "<td><div align='center'>".$ed_total_sem1."</div></td>";
                                                                $total_ed_sem1 += $ed_total_sem1;
                                                            }
                                                            $total_ed_sem2 = 0;
                                                            foreach($arr_year_2 as $int_year_2){
                                                                $int_year_2 = $int_year_2."__";
                                                                $ed_total_sem2 = report_month_num("dental_health","ED",$int_year_2);
                                                                echo "<td><div align='center'>".$ed_total_sem2."</div></td>";
                                                                $total_ed_sem2 += $ed_total_sem2;
                                                            }
                                                            $over_total_ed = 0;
                                                            $over_total_ed = $total_ed_sem1 + $total_ed_sem1;
                                                            echo "<td><div align='center'>".$over_total_ed."</div></td>";
                                                        } else {
                                                            foreach($arr_year as $int){
                                                                $new_int = $int."__";
                                                                $ed_total_sem = report_month_num("dental_health","ED",$new_int);
                                                                echo "<td><div align='center'>".$ed_total_sem."</div></td>";
                                                                $sem_ed_total += $ed_total_sem;
                                                            }
                                                            echo "<td><div align='center'>".$sem_ed_total."</div></td>";
                                                        }
                                                    ?>

												</tr>
												<tr>
													<td>Buiseness Entrepreneurship and Management Department</td>
                                                    <?php
                                                    if($con == 1){
                                                        $total_bemd_sem1 = 0;
                                                        foreach($arr_year_1 as $int_year){
                                                            $int_year = $int_year."__";
                                                            $bemd_total_sem1 = report_month_num("dental_health","BEMD",$int_year);
                                                            echo "<td><div align='center'>".$bemd_total_sem1."</div></td>";
                                                            $total_bemd_sem1 += $bemd_total_sem1;
                                                        }

                                                        $total_bemd_sem2 = 0;
                                                        foreach($arr_year_2 as $int_year_2){
                                                            $int_year_2 = $int_year_2."__";
                                                            $bemd_total_sem2 = report_month_num("dental_health","BEMD",$int_year_2);
                                                            echo "<td><div align='center'>".$bemd_total_sem2."</div></td>";
                                                            $total_bemd_sem2 += $bemd_total_sem2;
                                                        }
                                                        $over_total_bemd = 0;
                                                        $over_total_bemd = $total_bemd_sem1 + $total_bemd_sem1;
                                                        echo "<td><div align='center'>".$over_total_bemd."</div></td>";
                                                    } else {
                                                        foreach($arr_year as $int){
                                                            $new_int = $int."__";
                                                            $bemd_total_sem = report_month_num("dental_health","BEMD",$new_int);
                                                            echo "<td><div align='center'>".$bemd_total_sem."</div></td>";
                                                            $sem_bemd_total += $bemd_total_sem;
                                                        }
                                                        echo "<td><div align='center'>".$sem_bemd_total."</div></td>";
                                                    }
                                                    ?>
												</tr>
												<tr>
													<td>Agriculture and Techonology Department</td>
                                                    <?php
                                                    if($con == 1){
                                                        $total_atd_sem1 = 0;
                                                        foreach($arr_year_1 as $int_year){
                                                            $int_year = $int_year."__";
                                                            $atd_total_sem1 = report_month_num("dental_health","ATD",$int_year);
                                                            echo "<td><div align='center'>".$atd_total_sem1."</div></td>";
                                                            $total_atd_sem1 += $atd_total_sem1;
                                                        }

                                                        $total_atd_sem2 = 0;
                                                        foreach($arr_year_2 as $int_year_2){
                                                            $int_year_2 = $int_year_2."__";
                                                            $atd_total_sem2 = report_month_num("dental_health","ATD",$int_year_2);
                                                            echo "<td><div align='center'>".$atd_total_sem2."</div></td>";
                                                            $total_atd_sem2 += $atd_total_sem2;
                                                        }
                                                        $over_total_atd = 0;
                                                        $over_total_atd = $total_atd_sem1 + $total_atd_sem2;
                                                        echo "<td><div align='center'>".$over_total_atd."</div></td>";
                                                    } else {
                                                        foreach($arr_year as $int){
                                                            $new_int = $int."__";
                                                            $atd_total_sem = report_month_num("dental_health","ATD",$new_int);
                                                            echo "<td><div align='center'>".$atd_total_sem."</div></td>";
                                                            $sem_atd_total += $atd_total_sem;
                                                        }
                                                        echo "<td><div align='center'>".$sem_atd_total."</div></td>";
                                                    }
                                                    ?>
												</tr>
												<tr>

                                                    <td>Total</td>
                                                    <?php
                                                    if($con == 1){
                                                        $over_total_sem1 = 0;
                                                        foreach($arr_year_1 as $int_year){
                                                            $int_year = $int_year."__";
                                                            $over_total_sem1 = report_total_num("dental_health",$int_year);
                                                            echo "<td><div align='center'>".$over_total_sem1."</div></td>";

                                                        }

                                                        $over_total_sem2 = 0;
                                                        foreach($arr_year_2 as $int_year_2){
                                                            $int_year_2 = $int_year_2."__";
                                                            $over_total_sem2 = report_total_num("dental_health",$int_year_2);
                                                            echo "<td><div align='center'>".$over_total_sem2."</div></td>";
                                                        }
                                                        $over_all_total = $over_total_ed + $over_total_bemd + $over_total_atd;
                                                        echo "<td><div align='center'>".$over_all_total."</div></td>";
                                                    } else {
                                                    $over_total_sem = 0;
                                                    foreach($arr_year as $int_year){
                                                        $int_year = $int_year."__";
                                                        $total_sem_month = report_total_num("dental_health",$int_year);
                                                        echo "<td><div align='center'>".$total_sem_month."</div></td>";
                                                        $over_total_sem += $total_sem_month;
                                                    }
                                                    ?>
                                                    <td><?php $over_all_total = $sem_ed_total + $sem_bemd_total + $sem_atd_total;
                                                            echo "<div align='center'>".$over_all_total."</div>";
                                                        ?></td>
                                                    <?php }?>
												</tr>
                                            <tr>
                                                <?php
                                                    if($con == 1){
                                                        echo "<td colspan='13'>";
                                                        echo "<div align='right'><h4>Total: &nbsp;".$over_all_total."</h4></div>";
                                                    } else {
                                                        echo "<td colspan='13'>";
                                                        echo "<div align='right'><h4>Total: &nbsp;".$over_all_total."</h4></div>";
                                                    }
                                                ?>

                                                 </td>
                                            </tr>
											</tbody>
										</table>
										<?php
                                                    }
									        }
										?>
		  							</div>
		  							<div class="panel-footer">
		  									<div style="margin-left: 85%">
		  										<a href="">
                                                    <a href="print_report_dental.php?year_1=<?php echo $year_1;?>&&year_2=<?php echo $year_2;?>&&semester=<?php echo $sem;?>&&user_position=<?php echo "student"?>">
                                                        <button class="btn btn-primary">Print Report</button></a>
		  										</a>
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