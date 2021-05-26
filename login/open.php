<!DOCTYPE html>
<html lang="en">
<head>
<style>
#parent{
				text-align:center;
				background-image: url("otpbg.jpg");

				/* Full height */
				height: 635px; 

				/* Center and scale the image nicely */
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
                position: relative;
           
			}
#form_login {
				left      : 50%;
				top       : 50%;
				position  : absolute;
				transform : translate(-50%, -50%);
				border:3px solid lightblue;
				padding:70px;
				background-color:#b3d1ff;
				border-radius: 12px;
           
				
			

			}
button{
		
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
    p{
				color:#707793;
				text-align:center;
			}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="parent">
<div id="form_login">
    <p>Hi, welcome</p>
    <a href="http://localhost:3000/"><button>File Sharing</button></a>
    <a href="http://127.0.0.1:5000/"><button>Attendance</button></a>
    </form>
    </div>
</div>
</html>