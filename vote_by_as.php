<?php
session_start();
if(!$_SESSION['isLoggeds']) {
  header("location:home.php"); 
  die(); 
}
?>
<html>
 <head>
 <title>Caste Your Vote
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
h2{
	background-color:#008CBA;
	color:white;
	font-size:30;
}
 </style>
 </head>
 <body>
 
  <img src="logo.jpg" style="width:100%;height:150px;">
   <ul>
  <li><a href="portal student.php">Dashboard</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="news.php">News</a></li>
  <li><a href="notifications.php">Notification</a></li>
  <li><a href="working.php">Working</a></li>
  <li><a href="contact us.php">Contact Us</a></li>
  <li class="right"><a href="logout.php">Logout</a></li>
  </ul>
 <br> <br>
 <?php
   echo "<h1>&nbsp;&nbsp;&nbsp;&nbsp;" . $_SESSION['name_s'] ."</h1>";
  ?>
 <br>
 <center>
 <font size=6>
  <div>
  <h1><h2>
  <?php
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
$row = $_GET['id'];
$_SESSION["ID"] = "$row";
$sql = "SELECT Description FROM igba
where id=$row";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    
	    $theDescription = $row["Description"];
	echo "$theDescription";
	
    }
} else {
    echo "0 results";
}$conn->close();
?>

</h2></h1>
<form action="vote_c by as.php" method="post">
<br>
Caste your vote:<br>
 <input type="radio" name="vote" value="1" checked> Yes
  <input type="radio" name="vote" value="0"> No<br><br>
<input type="submit">

</div>
<br>
</form>
</body>
</html>