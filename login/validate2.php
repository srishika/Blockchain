
<?php

include_once('connection.php');
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"]== "POST") {
	
	$Email = test_input($_POST["UserName"]);
	$Password = test_input($_POST["password1"]);
	$stmt = $conn->prepare("SELECT * FROM teacher");
	$stmt->execute();
	$users = $stmt->fetchAll();
	
	foreach($users as $user) {
		
		if(($user['Email'] == $Email) && ($user['Password'] == $Password)) {
			header('Location:emailsend.php?Email='.$Email);

		}
	
	}
	
	echo ("<script LANGUAGE='JavaScript'>
	window.alert('WRONG INFO');
	window.location. href='./index.php';
	</script>");
			
	
}

?>
