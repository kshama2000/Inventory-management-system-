<?php 
ob_start();
include('header.php');
include_once("db_connect.php");
session_start();
if(isset($_SESSION['user_id'])!="") {
	header("Location: vendorhome.html");
}
if (isset($_POST['login'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '" . $username. "' and password = '" . md5($password). "'");
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['user_name'] = $row['username'];		
		header("Location: vendorhome.html");
	} else {
		$error_message = "Incorrect Email or Password!!!";
	}
}
?>
<title>Vendor Login</title>
<script type="text/javascript" src="script/ajax.js"></script>
<?php include('container.php');?>

<div class="container">
	<!--<h2>Example: Login and Registration Script with PHP, MySQL</h2>	-->	
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Vendor Login</legend>						
					<div class="form-group">
						<label for="name">User Name</label>
						<input type="text" name="username" placeholder="User Name" required class="form-control" />
					</div>	
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
					</div>	
					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Not yet a Member? <a href="vendorregister.php">Sign Up Here</a>
		</div>
	</div>
		
		
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://localhost/Project/" title="">Home</a>			
	</div>
</div>
<?php include('footer.php');?> 