<?php
session_start();
if(!$_SESSION['isLoggeds']) {
  header("location:home.php"); 
  die(); 
}
?>
<html>
 <head>
 <title>Student Portal 
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
 .bu {
    position: relative;
    background-color: #e7e7e7; 
    color: black; 
    border: 2px solid #008CBA;
	border-radius: 8px;
    font-size: 20px;
    padding: 6px 80px;
    width: 500px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    overflow: hidden;
    cursor: pointer;
}
nav{
	float:right	
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
   echo "<h1>&nbsp;&nbsp;&nbsp;&nbsp;Welcome " . $_SESSION['name_s'] ."!</h1>";
  ?>
  <br>
 <a href="create student.php"><button class="bu" > <h3 > Create a new issue </h3></button><br><br>

<a href="current issues_ss.php"><button class="bu"> <h3 > Vote for student's issues </h3></button></a>
<nav>
	<h2 style="text-align:center;"> Please Vote !</h2>
	<h2 style="text-align:center;">Your Votes matters for betterment of university.</h2>
</nav>
<br><br>
<a href="current issues_as.php"><button class="bu" > <h3 > Vote for administration's issues </h3></button>
<br><br>
<a href="reports_s.php"><button class="bu"><h3 > View report</h3></button></a>

 </body>
 </html>