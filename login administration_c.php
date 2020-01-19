<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university issues";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// create a variable
$emp_id=$_POST['emplo'];
$password=$_POST['pass'];

// execute query  
$sql = "select * from general_admin
        where Emp_id='$emp_id'";
$result = $conn->query($sql);
if ($result->num_rows ==1) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
        $pass=$row["Password"];	
        $name=$row["Name"];
		$_SESSION['field']=$row['Related_field'];
  }
  } else {
     echo "<h1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	You are not a valid user! Please login again.</h1>";
	echo("<button onclick=\"location.href='home.php'\">Go to Home</button>");
	die();
}
if ($password==$pass) {
 $_SESSION['name_s'] = $name;
 $_SESSION["emp_id"]=$emp_id;	
 header("location: portal admin.php");
 $_SESSION['isLoggeda'] = true;
 }
else {
    echo "<h1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	You are not a valid user! Please login again.</h1>";
	echo("<button onclick=\"location.href='home.php'\">Go to Home</button>");
}	
 $_SESSION['name_a'] = $name;
$conn->close();
?>
