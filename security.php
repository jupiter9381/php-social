<?php 

session_start();


// if($_SERVER['SERVER_NAME'] == "localhost") {
	$_SESSION['security'] = 1;
	header("location:index");exit;
// }

if (isset($_SESSION['security'])) {
	header("location:index");exit;
}

if (isset($_POST['submit'])) {
	if (isset($_POST['sec_password']) && $_POST['sec_password'] != "") {
		if ($_POST['sec_password'] == "follow678rI!") {
			$_SESSION['security'] = 1;
			header("location:index");exit;
		} else {
			$_SESSION['error']="Invalid Password.";	
			header("location:security");exit;
		}
	} else {
		$_SESSION['error']="Password is require";
		header("location:security");exit;
	}	
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
	.form-gap {
		padding-top: 70px;
	}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="text-center">
						<h3><i class="fa fa-lock fa-4x"></i></h3>
						<h2 class="text-center">Password?</h2>
						<p>You can not see website without password.</p>
						<div class="panel-body">    
							<form id="register-form" role="form" autocomplete="off" class="form" method="post">    
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
										<input name="sec_password" placeholder="Security Password" class="form-control" type="password">
									</div>
								</div>
								<div class="form-group">
									<input name="submit" class="btn btn-lg btn-primary btn-block" value="Submit" type="submit">
								</div> 
								<div class="form-group">
									<?php if (isset($_SESSION['error'])) { ?>
										<div class="alert alert-danger cstm-msg-all">
											<?php echo  $_SESSION['error']; ?> 
										</div>
										<?php unset($_SESSION['error']);
									} ?>
								</div> 								                     
							</form>    
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>