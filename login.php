    <!-- -->
<?php
	require_once('includes/session.php');
	if(logged_in()){

		header("LOCATION: default.php");
	}
?>
<!-- /-->

<!-- header(php code) -->
<?php 
	include('includes/header.php');
?>
<!-- /header(php code) -->

<body data-spy="scroll" id="login_body">

	<!-- -->

		
		<!-- -->
		<div class="col-md-12">
			<nav class="nav navbar-default" style="background-color:#337ab7;">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
		      			</button>
		      			<a class="navbar-brand" href="#">
        					<img alt="Brand" src="images/Logo.png" width="50" height="40" style="margin-top: -20%">
      					</a>
		      			<a class="navbar-brand" href="#" style="color:#eee;">
		      			Medicine Inventory and Patient Information System</a>
		 			</div>
	    		</div>
			</nav>
		
		<!-- /-->

		<!-- -->
		<div class="row">
			<div class="container">
				<div style="margin-top: 10%; margin-bottom: 10%; margin-left: 20%; margin-right: 20%">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3><span class="glyphicon glyphicon-log-in">&nbsp;</span>Log In</h3>
						</div>
						<div class="panel-body">

								<?php
									if(isset($_SESSION['MSG_ERR']) && is_array($_SESSION['MSG_ERR']) && count($_SESSION['MSG_ERR'])) {
								?>
										<div class="alert alert-danger alert-dismissible" role="alert">
	  										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  											<span aria-hidden="true">&times;</span>
	  										</button>
									    	<strong><span class="glyphicon glyphicon-"></span>Warning</strong>
								<?php
										
										echo 		"<ul>";
													foreach($_SESSION['MSG_ERR'] as $message){
														echo "<li>".$message."</li>";
													} 
										echo 		"</ul>";
													unset($_SESSION['MSG_ERR']);
								?>
										 
										</div>
								<?php
									} else {

										echo "<p class=\"text-center\"></p>";
										
									}
								
								?>
							<center>
							<form class="form-inline" method="post" action="functions/login_function.php">
								<div class="input-group input-group-lg">
	  								<span class="input-group-addon" id="basic-addon1">
	  									<span class="glyphicon glyphicon-user"></span>
	  								</span>
	  								<input type="text" class="form-control" name="username" placeholder="Username" aria-describedby="basic-addon1">
								</div>
								<div class="input-group input-group-lg">
	  								<span class="input-group-addon" id="basic-addon1">
	  									<span class="glyphicon glyphicon-lock"></span>
	  								</span>
	  								<input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="basic-addon1">
								</div>
							</center>
						</div>
						<div class="panel-footer">
							<div class="checkbox">
							    <label>
							      <input type="checkbox" style="float:left"> Remember me
							    </label>
  							</div>
								<div style="margin-left: 84%; margin-top: -6%">
								<input type="submit" class="btn btn-primary btn-lg" value="Log In" name="log_in">
								
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>	
		<!-- / -->
		
		<!-- -->
		<div class="panel-footer">
					<footer>
						<center>
							<p style="color:#555">
								<strong>Medicine Inventory and Patient Information System </strong><span class="glyphicon glyphicon-copyright-mark"></span> 2016 - 2017
							</p>
						</center>
					</footer>
				</div>
		<!--/ -->
		</div>
		<!--/ -->
	</div>
	<!-- -->

</body>
</html>