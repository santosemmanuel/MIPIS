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
			include('includes/top_nav.php');
		?>
		<!-- /top nav(php code)-->
		
		<!-- -->
		<div class="row">
			
			<div class="col-md-12">

				
			
				<!-- main -->
				<div class="container">
			
					<!-- -->
					<ol class="breadcrumb">
						<span class="glyphicon glyphicon-home" style="color:#555">&nbsp;</span>
						<li><a href="#">Home</a></li>
						<li style="float: right"><?php  echo date('l jS \of F Y');?></li>
					</ol>
                    <div class="jumbotron" style="background-image: url('images/medical-crosses-background_23-2147490186.jpg');background-position: center; background-repeat: no-repeat;
    color: white;">

							<div style="margin-left: 20%">
								<h1>EVSU-BC </h1><br>
							</div>
							<div style="margin-top: -3%; margin-left: 20%">
								<h2 style="color: #555">Medical Inventory and Patient Information System</h2>
							</div>

                    </div><hr>
						<div class="row">
							<div class="col-md-12">
								
								<div class="col-md-4">
									<div class="thumbnail">
								    	<img src="images/medical_banners_312239.jpg" alt="...">
								      	<div class="caption">
								        	<h3>Patient Information</h3>
								        	<p></p>
								        	<p>
									        	<a href="student_record.php" class="btn btn-primary" role="button">School Clinic Record</a>
								        		<a href="add_patient.php" class="btn btn-primary" role="button">Search Records</a>
								        	</p>
								      	</div>
								    </div>
								</div>
								<div class="col-md-4">
									<div class="thumbnail">
								    	<img src="images/medical_banners_312239.jpg" alt="...">
								      	<div class="caption">
								        	<h3>Inventory</h3>
								        	<p></p>
								        	<p>
									        	<a href="view inventory.php" class="btn btn-primary" role="button">View Inventory</a>
									        	<a href="add_inventory.php" class="btn btn-primary" role="button">Add Inventory</a>
								        	</p>
								      	</div>
								    </div>
								</div>
								<div class="col-md-4">
									<div class="thumbnail">
								    	<img src="images/medical_banners_312239.jpg" alt="...">
								      	<div class="caption">
								        	<h3>Reports</h3>
								        	<p></p>
								        	<p>
									        	<?php if($user_type['user_type'] == 'Admin'){?>
                                                <a href="reports.php" class="btn btn-primary" role="button">Reports</a>
											    <?php } else {?>
                                                    <a href="reports.php" class="btn btn-primary disabled" role="button">Reports</a>
                                                <?php }?>
                                            </p>
								      	</div>
								    </div>
								</div>
							</div>
						</div><hr />
						<blockquote>
							Mission
						</blockquote>
                        <blockquote>
                            Vision
                        </blockquote>
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
			
			</div>
			<!-- /-->
		
		</div>
		<!-- /-->

	</div>
	<!-- / -->
</body>
</html>