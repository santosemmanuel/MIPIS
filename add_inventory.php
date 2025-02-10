<!-- include Files -->
<?php

	require_once('includes/session.php');
	require_once('includes/connection.php');
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
	  							</a></li>
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

				<!-- main -->
				<div class="col-md-10">
			
					<!-- -->
					<ol class="breadcrumb">
						<span class="glyphicon glyphicon-menu-hamburger" style="color:#555">&nbsp;</span>
						<li><a href="default.php">Inventory</a></li>
						<li><a href="">Add Inventory</a></li>
						<li style="float: right"><?php  echo date('l jS \of F Y');?></li>
					</ol>
					<!-- /-->

					<!-- Page Header -->	
					<div class="page-header">
						<h1>Add Inventory&nbsp;<small></small></h1>
					</div>	
					<!-- / -->
                    <?php if(!empty($_GET['warning'])){
                        $warning_msg = $_GET['warning'];
                        } else {
                        $warning_msg = 0;
                        }

                        if($warning_msg == 1){
                            ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Warning!</strong> Better check yourself, you're not looking too good.
                            </div>
                            <?php
                        }
                    ?>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <form action="functions/add_inventory_function.php" method="post" class="form-inline">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <label>Type:</label>
                                                    <select name="option" class="form-control">
                                                        <option value="Medicine">Medicine</option>
                                                        <option value="Supply">Supply</option>
                                                        <option value="Equipment">Equipment</option>
                                                    </select>
                                                </div>
                                                <div class="input-group">
                                                    <label>Name:</label>
                                                    <input type="text" name="med_name" class="form-control"/>
                                                </div>
                                            <hr />
												<div class="input-group">
                                                    <label>Type of Medicine:</label>
                                                    <input type="text" name="type_med" class="form-control"/>
                                                </div>
												<div class="input-group">
                                                    <label>Number of Items:</label>
                                                    <input type="text" name="num_items" class="form-control"/>
                                                </div>
												<br/>
												<div class="input-group">
													<label>Expiration Date:</label>
													<select name="month" class="form-control">
														<option value="01">January</option>
														<option value="02">February</option>
														<option value="03">March</option>
														<option value="04">April</option>
														<option value="05">May</option>
														<option value="06">June</option>
														<option value="07">July</option>
														<option value="08">August</option>
														<option value="09">September</option>
														<option value="10">October</option>
														<option value="11">November</option>
														<option value="12">December</option>
													</select>
												</div>
												<div class="input-group">
													<label>&nbsp;</label>
													<select name="day" class="form-control">
														<?php
															for($x=1;$x<=31;$x++){
																echo "<option>".$x."</option>";
															}
														?>
													</select>
												</div>
												<div class="input-group">
													<label>&nbsp;</label>
													<select name="year" class="form-control">
														<?php
															for($x=2017;$x<=2025;$x++){
																echo "<option>".$x."</option>";
															}
														?>
													</select>
												</div>
											</div>
                                        </div>
                                    </div>
									<div class="panel-footer">
										<input type="submit" class="btn btn-outline btn-primary " name="submit_inventory" value="submit" onclick="confirm('Record Has Been Added')">
									</div>
                                </form>
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
			<!-- /-->
		
		</div>
		<!-- /-->

	</div>
	<!-- / -->

</body>
</html>