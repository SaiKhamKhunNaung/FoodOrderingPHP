
<?php 
session_start();
$connection=mysqli_connect('localhost','root','','food');

if(isset($_POST['btnlogin']))
{
	$email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];

	$select="select*from admin
	         Where AdminEmail='$email'
	         And AdminPassword='$password'";

	  $ret=mysqli_query($connection,$select);
	  $count=mysqli_num_rows($ret);

	  if($count>0)
	  {
        $row=mysqli_fetch_array($ret);
        $_SESSION['AdminID']=$row['AdminID'];
        $_SESSION['AdminEmail']=$row['AdminEmail'];
        $_SESSION['AdminPassword']=$row['AdminPassword'];

		 $_SESSION['AdminID']=$row['AdminID'];
	  	echo"<script>window.alert('Login Success!')</script>";
	  	echo"<script>window.location='admin_index.php'</script>";
	  }
	  else
	  {
	  	echo"<script>window.alert('Login Incorrect!')</script>";
	  	echo"<script>window.location='admin_login.php'</script>";
	  }
}

 ?><html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<form action="admin_login.php" method="POST">
	  <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form">
				<span class="login100-form-title p-b-37">
					Sign In
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter  email">
					<input class="input100" type="text" name="txtemail" placeholder="Email">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="txtpassword" placeholder="password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" name="btnlogin">
						Sign In
					</button>
				</div>

				
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	

	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<from>
</body>
</html>
