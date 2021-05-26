
<?php
  
  $servername = "localhost";
  $username = "testuser";
  $password = "testpassword";
  $dbname = "loginpage";
    
  // Create connection
  $conn = new mysqli($servername, 
      $username, $password, $dbname);
    
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " 
          . $conn->connect_error);
  }
  $name =$_REQUEST['name'];
  $Email =  $_REQUEST['Email'];
  $Password = $_REQUEST['password'];
  $sql = "INSERT INTO teacher (name, Email,Password) VALUES ('$name','$Email','$Password')";
    
  if ($conn->query($sql) === TRUE) {
      echo "record inserted successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  ?>