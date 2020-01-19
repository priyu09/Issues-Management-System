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
$enrollment_no=$_POST['enroll'];
$password=$_POST['pass'];

// execute query  
$sql = "select Password,Name from student
        where Enroll_no='$enrollment_no'";
$result = $conn->query($sql);
if ($result->num_rows ==1) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
        $pass=$row["Password"];	
        $name=$row["Name"];
  }
  } else {
    //echo "<h1>Error</h1>";
	echo "<h1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	You are not a valid user! Please login again.</h1>";
	echo("<button onclick=\"location.href='home.php'\">Go to Home</button>");

	die();
}
if ($password==$pass) {
 $_SESSION['name_s'] = $name;
 $_SESSION["enroll"]=$enrollment_no;
 header("location: portal student.php");
 $_SESSION['isLoggeds'] = true;
 }
else {
    echo "<h1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	You are not a valid user! Please login again.</h1>";
	echo("<button onclick=\"location.href='home.php'\">Go to Home</button>");
}	
 
$conn->close();
?>
