<?php
session_start();
if(!$_SESSION['isLoggedr']) {
  header("location:home.php"); 
  die(); 
}
?>
<html>
 <head>
 <title>Registrar office Portal
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
 div{
	 font-size:200%;
	
 }
 nav{
	float:right	;
 }
 nav1{
	 float:left;
 }
 </style>
</head>
 <body>
 <img src="logo.jpg" style="width:100%;height:150px;">
 <ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="news.php">News</a></li>
  <li><a href="notifications.php">Notification</a></li>
  <li><a href="working.php">Working</a></li>
  <li><a href="contact us.php">Contact Us</a></li>
  <li class="right"><a href="logout.php">Logout</a></li>
  </ul>
  <br>
  <?php
   echo "<h1>&nbsp;&nbsp;&nbsp;&nbsp;Welcome " . $_SESSION['name_r'] ."!</h1>";
   $curtime = date("Y-m-d H:i:s");
   $newtime = strtotime($curtime) + (210*60);
   echo date("Y-m-d H:i:s", $newtime);
  ?>
  <h1 style="text-align:center;">List Of Reports</h1>
  <div>
  <nav1>
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

echo ("<h4>Issues raised by Students</h4>");
$sql = "SELECT * FROM igbs";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $your_url= "statement_particular_s.php?id=".$row['id'];
		   $thedescription=$row["Description"];
		   $value=$row['Time'];
		   $oldtime1 = strtotime($value) + (3600*48);
		   $oldtime2 = strtotime($value) + (3600*60);
		   if(($oldtime1<$newtime)&&($oldtime2>$newtime)){
			 echo $row['Time'];
		     echo "&nbsp;&nbsp;";
		     echo "<a href=".$your_url.">$thedescription</a>";
		     echo "<br>";
		    }
        }
    } else {
        echo "no results";
    }
?>
</nav1>
<nav>
<?php
echo ("<h4>Issues raised by Administration</h4>");
$sql = "SELECT * FROM igba";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $your_url= "statement_particular_a.php?id=".$row['id'];
		   $thedescription=$row["Description"];
		   $value=$row['Time'];
		   $oldtime1 = strtotime($value) + (3600*48);
		   $oldtime2 = strtotime($value) + (3600*60);
		   if(($oldtime1<$newtime)&&($oldtime2>$newtime)){
			 echo $row['Time'];
		     echo "&nbsp;&nbsp;";
		     echo "<a href=".$your_url.">$thedescription</a>";
		     echo "<br>";
		    }
        }
    } else {
        echo "no results";
    }
$conn->close();
?>
</nav>
 </div>
 </body>
 </html>
