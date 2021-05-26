<!DOCTYPE html>
<html>
	<head>
		<style>
            .fa{
                height:30px;
                width:40px;
            }
 
			#form_login {
				left      : 50%;
				top       : 50%;
				position  : absolute;
				transform : translate(-50%, -50%);
				border:3px solid lightblue;
				padding:40px;
				background-color:#b3d1ff;
				border-radius: 12px;
                width:400px;

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
                width:240px;
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
		<form method="POST" id="form_login" action="registernew.php" >
			<h1> REGISTER HERE</h1>
        <i class="fa fa-user" aria-hidden="true"></i>
		<input class="otp" type="text" placeholder="Enter Name" name="name" required >
		<br><br>
        <i class="fa fa-user" aria-hidden="true"></i>
		<input class="otp" type="email" placeholder="Email" name="Email" value="" required>
        <br><br>
        <i class="fa fa-lock" aria-hidden="true"></i>
		<input type="password" class="otp" placeholder="Password" name="password" value="" required>

		<br><br>
		<input class="button" type="submit" name="otp1" value="Register" >
		</div>
</form>
</body>
</html>