<?php 
ob_start();
include('header.php');
include_once("db_connect.php");
session_start();
if(isset($_SESSION['user_id'])) {
	header("Location: index.php");
}
$error = false;
if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$mobno = mysqli_real_escape_string($conn, $_POST['mobno']);
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$oname = mysqli_real_escape_string($conn, $_POST['oname']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);	
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$uname_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if(strlen($mobno) < 10) {
		$error = true;
		$mobno_error = "mobile Number must be of 10 digits";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
		 
	if (!$error) {
		if(mysqli_query($conn, "INSERT INTO users(username, email, mobno,password,role,fname,lname,company_name,status) VALUES('" 
		. $name . "', '" 
		. $email . "', '"
		. $mobno . "', '"		
 . md5($password). "', 'Vendor','"
		. $fname . "', '"
		. $lname . "', '"
		. $oname . "', 1
		 )")) {
			$success_message = "Successfully Registered! <a href='vendorlogin.php'>Click here to Login</a>";
		} else {
			$error_message = "Error in registering...Please try again later!";
		}
	}
}
?>
<title>Vendor Register</title>
<script type="text/javascript" src="script/ajax.js"></script>
<?php include('container.php');?>

<div class="container">
<!--<h2>Example: Login and Registration Script with PHP, MySQL</h2>	-->
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Vendor Registration</legend>

					<div class="form-group">
						<label for="name">User Name</label>
						<input type="text" name="name" placeholder="Enter User Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($uname_error)) echo $uname_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Mobile number</label>
						<input type="text" name="mobno" placeholder="Mob No" required value="<?php if($error) echo $mobno; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($mobno_error)) echo $mobno_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">First Name</label>
						<input type="text" name="fname" placeholder="First name" required value="<?php if($error) echo $fname; ?>" class="form-control" />
						<!--<span class="text-danger"><?php //if (isset($fname_error)) echo $fname_error; ?></span>-->
					</div>
					
					<div class="form-group">
						<label for="name">Last Name</label>
						<input type="text" name="lname" placeholder="Last name" required value="<?php if($error) echo $lname; ?>" class="form-control" />
						<!--<span class="text-danger"><?php //if (isset($lname_error)) echo $lname_error; ?></span>-->
					</div>
					
					<div class="form-group">
						<label for="name">Organisation Name</label>
						<input type="text" name="oname" placeholder="Organisation name" required value="<?php if($error) echo $oname; ?>" class="form-control" />
						<!--<span class="text-danger"><?php //if (isset($oname_error)) echo $oname_error; ?></span>-->
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Confirm Password</label>
						<input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div>

					<div class="form-group">
						<input type="submit" name="signup" value="Register" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($success_message)) { echo $success_message; } ?></span>
			<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Already Registered? <a href="login.php">Login Here</a>
		</div>
	</div>	
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://localhost/Project/" title="">Home</a>			
	</div>
</div>
<?php include('footer.php');?> 