<?php
session_start();
if(!$_SESSION['isLoggedad']) {
  header("location:home.php"); 
  die(); 
}
?>
<html>
 <head>
 <title>Add Administrative Member
 </title>
 <style>
 ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
.right{float:right;
}
 div {
    width: 500px;
    padding: 10px;
    border: 3px solid #008CBA;
    margin: 0;
}
h1 {
    text-shadow: 3px 2px red;
}
</style>
</head>
 <body>
 <img src="logo.jpg" style="width:100%;height:150px;">
 <ul>
  <li><a href="portal database_admin.php">Dashboard</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="news.php">News</a></li>
  <li><a href="notifications.php">Notification</a></li>
  <li><a href="working.php">Working</a></li>
  <li><a href="contact us.php">Contact Us</a></li>
  <li class="right"><a href="logout.php">Logout</a></li>
  </ul>
  <br>
<?php
   echo "<h1>&nbsp;&nbsp;&nbsp;&nbsp;" . $_SESSION['name_ad'] ."</h1>";
  ?>
  <br><br><br>
<center>
<font size=6>
<div>
<h1><h2 style="background-color:#008CBA;color:white" size="9">Add Member</font> </h2></h1>
<form>
<br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university issues";

// Create connection
$conn =  new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// create a variable
$emp_id=$_POST['emp_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$pass=$_POST['pass'];
$field=$_POST['field'];
//Execute the query

$sql = "INSERT INTO general_admin (Name,Emp_id,Password,Email_id,Contact_no,Related_field)
VALUES ('$name','$emp_id','$pass','$email','$contact','$field')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
</div>
</center>
</body>
</html>