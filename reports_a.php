<?php
session_start();
if(!$_SESSION['isLoggeda']) {
  header("location:home.php"); 
  die(); 
}
?>
<html>
 <head>
 <title>List of Reports 
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
  <li><a href="portal admin.php">Dashboard</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="news.php">News</a></li>
  <li><a href="notifications.php">Notification</a></li>
  <li><a href="working.php">Working</a></li>
  <li><a href="contact us.php">Contact Us</a></li>
  <li class="right"><a href="logout.php">Logout</a></li>
  </ul>
  <br><br>
  <?php
   echo "<h1>&nbsp;&nbsp;&nbsp;&nbsp;" . $_SESSION['name_s'] ."</h1>";
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

$sql = "SELECT * FROM report_s";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $your_url= "report_particular_sa.php?id=".$row['id'];
		   $thedescription=$row["Description"];
		  echo "<a href=".$your_url.">$thedescription</a>";
          //  echo '<a href="'.$your_url.'"><input type="button" value="'. $row["Description"].'"></a>';
			echo "<br>";
			 
	

        }
    } else {
        echo "no results";
    }
?>
</nav1>
<nav>
<?php
echo ("<h4>Issues raised by Administration</h4>");
$sql = "SELECT * FROM report_a";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $your_url= "report_particular_aa.php?id=".$row['id'];
		   $thedescription=$row["Description"];
		  echo "<a href=".$your_url.">$thedescription</a>";
          //  echo '<a href="'.$your_url.'"><input type="button" value="'. $row["Description"].'"></a>';
			echo "<br>";
			 
	

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