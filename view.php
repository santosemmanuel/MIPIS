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
				<aside>
					<div class="col-md-2">
						<div style="margin-left: 20%; margin-top:5%">
							<ul class="nav nav-pills nav-stacked">
								<li role="presentation" ><a href="default.php"><span class="glyphicon glyphicon-home">&nbsp;</span>Home</a></li>
							  	<li role="presentation" ><a href="add_patient.php"><span class="glyphicon glyphicon-folder-open">&nbsp;</span>Add Record</a></li>
							  	<li role="presentation" class="dropdown active">
		    						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		      							<span class="glyphicon glyphicon-menu-hamburger">&nbsp;</span>Records 
		      							<span class="glyphicon glyphicon-menu-down" style="float: right; margin-top: 2%"></span>
		    						</a>
								    <ul class="dropdown-menu">
								    	<li><a href="view.php">Faculty Records</a></li>  
								    	<li><a href="#">Student Recods</a></li>  							    	
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
								    	<li><a href="update_inventory.php">Update Inventory</a></li>  							    	
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
						<span class="glyphicon glyphicon-home" style="color:#555">&nbsp;</span>
						<li><a href="#">Home</a></li>
						<li><a href="#"></a></li>
					</ol>
					<div class="row">
						<div style="margin-top: -3%; margin-left: 3%; margin-right: 3%">
							<div class="page-header">
								<h1>Faculty Records &nbsp;<small></small></h1>
							</div>
							<div class="row">

							</div>
						</div>
					</div>
					<!-- / -->

					<!-- footer -->
					<div class="modal-footer">
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