<?php
session_start();
if(!$_SESSION['isLoggedr']) {
  header("location:home.php"); 
  die(); 
}
?>
<!DOCTYPE html>
<html>
<head>
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
div{
	text-align:center;
	font-size:300% ;
}
	
</style>
</head>
<body>
<img src="logo.jpg" style="width:100%;height:150px;">
<ul>
  <li><a href="portal registrar.php">Dashboard</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="news.php">News</a></li>
  <li><a href="notifications.php">Notification</a></li>
  <li><a href="working.php">Working</a></li>
  <li><a href="contact us.php">Contact Us</a></li>
  <li class="right"><a href="logout.php">Logout</a></li>
  </ul>
<br><br>
<?php
   echo "<h1>&nbsp;&nbsp;&nbsp;&nbsp;" . $_SESSION['name_r'] ."</h1>";
  ?>
<br><br>
<div>
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

// create a variable
$final_s=$_POST['final_s'];
$id=$_SESSION["ID"];

$sql = "SELECT * FROM igbs
        where id=$id";
$result = $conn->query($sql);


if ($result->num_rows== 1) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    
	    $theDescription = $row["Description"];
		$thepervote_s=$row["Vote_by_s"];
		$thepervote_a=$row["Vote_by_a"];
		$rel_field=$row["Related_field"];
		echo "Final ";
    }
} else {
    echo "Error1: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO report_s (Description,Final_statement,Per_vote_by_s,Per_vote_by_a,id,Related_field)
VALUES ('$theDescription','$final_s',$thepervote_s,$thepervote_a,$id,'$rel_field')";
   
 if ($conn->query($sql) === TRUE) {
    echo "Statement ";
} else {
    echo "Error2: " . $sql . "<br>" . $conn->error;
}   

$sql = "DELETE FROM igbs WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Submitted ";
} else {
    echo "Error3: " . $sql . "<br>" . $conn->error;
} 

$sql = "DROP TABLE ts$id";
if ($conn->query($sql) === TRUE) {
    echo "Successfully. ";
} else {
    echo "Error4: " . $sql . "<br>" . $conn->error;
} 

$conn->close();
?>