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
$user_id=$_POST['user_id'];
$password=$_POST['pass'];
$name=$_POST['user'];
// execute query  
$sql = "select Password from registrar_office
        where User_id='$user_id'";
$result = $conn->query($sql);
if ($result->num_rows ==1) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
        $pass=$row["Password"];	
  }
  } else {
    echo "<h1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	You are not a valid user! Please login again.</h1>";
	echo("<button onclick=\"location.href='home.php'\">Go to Home</button>");
die();
}
if ($password==$pass) {
 $_SESSION['name_r'] = $name;
 $_SESSION["user_id"]=$user_id;
 header("location: portal registrar.php");
 $_SESSION['isLoggedr'] = true;
 }
else {
    echo "<h1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	You are not a valid user! Please login again.</h1>";
	echo("<button onclick=\"location.href='home.php'\">Go to Home</button>");
}	
 
$conn->close();
?>
