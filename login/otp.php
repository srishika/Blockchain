<!DOCTYPE html>
<html>
	<head>
		<style>
			#form_login {
				left      : 50%;
				top       : 50%;
				position  : absolute;
				transform : translate(-50%, -50%);
				border:3px solid lightblue;
				padding:20px;
				background-color:#b3d1ff;
				border-radius: 12px;

			}
			body{
				background-image: url("otpbg.jpg");
			}
			#parent{
				text-align:center;
				background-image: url("otpbg.jpg");

				/* Full height */
				height: 100%; 

				/* Center and scale the image nicely */
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
				
			}
			h1{
				color:#707793;
				text-align:center;
			}
			.otp{
				height:32px;
			}
			.button{
		
				border-radius: 12px;
				background-color: #17252A; /* Green */
				border: none;
				color: #FEFFFF;
				padding: 18px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				margin: 4px 2px;
				cursor: pointer;
			
				
				text-align:center;
			}


		</style>
</head>

<body>
	<div id="parent">
		<form method="POST" id="form_login">
			<h1> Please enter the OTP for verification</h1>
		<input class="otp" type="text" placeholder="Enter OTP" name="otp" >
		<br>

		<br>
		<input class="button" type="submit" name="otp1" >
		</div>
</form>
</body>
</html>
<?php

$servername = "localhost";
$username = "testuser";
$password = "testpassword";
$dbname = "loginpage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if(!empty($_POST["otp"]) && $_POST["otp"]!='') {
	$sqlQuery = "SELECT * FROM otp_expiry WHERE otp='". $_POST["otp"]."'";
	$result = mysqli_query($conn, $sqlQuery);
	$count = mysqli_num_rows($result);
	if(!empty($count)) {
		
		header("Location:open.php");
	} 
	else {
		echo ("<script LANGUAGE='JavaScript'>
	window.alert('Invalid otp');
	window.location. href='./index.php';
	</script>");
	}	
} else if(empty($_POST["otp"])){
	$errorMessage = "Enter OTP!";	
}
?>
