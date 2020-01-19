<?php
session_start();
if(!$_SESSION['isLoggedad']) {
  header("location:home.php"); 
  die(); 
}
?>
<html>
 <head>
 <title>Student details
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
  <br>
<center>
<font size=6>
<div>
<h1><h2 style="background-color:#008CBA;color:white" size="9">Student Detail</font> </h2></h1>
<form ><font size=4 >
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
$enroll=$_POST['enroll'];
$sql = "SELECT * FROM student
where Enroll_no=$enroll ";
$result = $conn->query($sql);

if ($result->num_rows ===1) {
    // output data of each row
  while(  $row = $result->fetch_assoc() ){
	//$_SESSION['Emp_id'] = $_POST['emp'];
    echo "Enrollment no.:" . $row['Enroll_no'] ."<br><br>Name: " . $row['Name']. "<br><br>Course:" . $row['Course'] ."<br><br>Email ID:" . $row['Email_id'] . "<br><br>Contact number:". $row['Contact_no']."<br>"  ;          
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</form>
</div>
</center>
</body>
</html>