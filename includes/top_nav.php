	
	<!-- top nav -->
		<div class="col-md-12">
			<nav class="nav navbar-inverse" style="background-color:#337ab7;">
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
	      			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      				<ul class="nav navbar-nav navbar-right">
							<!-- notification -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#eee">
								<span class="glyphicon glyphicon-list-alt"></span>
								<span class="badge">
									<?php
										$result_set = mysql_query("SELECT * FROM inventory WHERE expr_date <= date_invt AND expr = 0 ");
										$num_expr = mysql_num_rows($result_set);
										echo $num_expr;
									?>
								</span>
								<span class="caret"></span></a>
		          					<ul class="dropdown-menu">
							        
								    		<?php
											require_once("includes/connection.php");
					                        require_once("functions/functions.php");
											$date = date("Y/m/d",time());
											$mysql_date = mysql_query("SELECT MAX(date_invt) AS date_invt FROM inventory ");
											$field_mysql_date = mysql_fetch_array($mysql_date);
											$date_invt = $field_mysql_date['date_invt'];
											if($date_invt !== $date){  
												$result = mysql_query("UPDATE inventory SET date_invt = '$date'");
											}
											$result_set = mysql_query("SELECT * FROM inventory WHERE expr_date <= date_invt AND expr = 0");
											$num_expr = mysql_num_rows($result_set);
											if($num_expr > 1){
												echo "<li><center><h5 class=\"label label-danger\">Expired Item(s)</h5></center></li>";
												echo "<li class=\"divider\"></li>";
												while ($field_expr = mysql_fetch_array($result_set)) {
													# code...
												   			
															echo "<li><a href='#'>";
															echo "<h5 class='list-group-item-heading'>".$field_expr['medicine_name']."</h5>";
															echo "<p class='list-group-item-text'>".$field_expr['expr_date']."</p>";
															echo "<a href=\"default.php?action=delete&&id=".$field_expr['id']."\" confirm('Are you sure You want to delete ".$field_expr['medicine_name']."?');><p class=\"text-right\">";
															echo "<button type=\"button\" class=\"btn btn-primary btn-sm\">";
															echo  "Delete";
															echo "</button>";
															echo "</p></a>";
															echo "<li class=\"divider\"></li>";
															echo "</a></li>";
													
											 	}
											 } else {
											 	echo "<li>";
												echo "<a href='#'><small>You have 0 Notification..</small></a>";
												echo "</li>";
											 }
										
										
										if(isset($_GET['action']) == 'delete'){
											$invt_id = $_GET['id'];
											mysql_query("UPDATE inventory SET expr = '1' WHERE id = '$invt_id'");
											?>
                                            <script type="text/javascript">
                                                window.location.href="default.php";
                                            </script>
                                        <?php
										} else {
										}

									 ?>
                   				</ul>
							</li>
							<!-- notification -->
	        				<li class="dropdown">
		          				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#eee">
		          				Welcome 

		          				<!-- php code here -->
		          				<?php 
										$name_user = $_SESSION['name'];
		          						echo "<strong>".$name_user."</strong>";
		          				?>
		          				<!-- /php code here -->

		          				<span class="caret"></span></a>
		          				<ul class="dropdown-menu">
							        	<li><a href="#"><span class="glyphicon glyphicon-user"></span>
										<?php
											$query_user_type = mysql_query("SELECT * FROM user_tbl WHERE name = '$name_user'");
											$user_type = mysql_fetch_array($query_user_type);
											echo "&nbsp;".$user_type['user_type'];
										?>
										</a></li>
							            <li><a href="functions/logout_function.php"><span class="glyphicon glyphicon-log-out">&nbsp;</span>Log out</a></li>
		          					</ul>
	       						</li>		
	      					</ul>
	    			</div>
	    		</div>
			</nav>
		</div>
		<!-- /top nav -->
