<?php
session_start();
if(!$_SESSION['isLoggedad']) {
  header("location:home.php"); 
  die(); 
}
?>
<html>
 <head>
 <title>Database Admin Portal
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
   echo "<h1>&nbsp;&nbsp;&nbsp;&nbsp;Welcome " . $_SESSION['name_ad'] ."!</h1>";
  ?>
  
  <div style="float:left; ">
  <h1 style="text-align:center;">Administration</h1><br>
  <a href="admin_detail.php"><button class="bu" > <h3 > Admin detail </h3></button>
  <br><br>
  <a href="admin_modify.php"><button class="bu"> <h3 > Modify detail</h3></button></a>
  <br><br>
  <a href="admin_add.php"><button class="bu" > <h3 > Add member </h3></button>
  <br><br>
  <a href="admin_remove.php"><button class="bu"><h3 >Remove member</h3></button></a>
  </div>

  <div style="float:right;">
  <h1 style="text-align:center;">Student</h1><br>
  <a href="student_detail.php"><button class="bu" > <h3 > Student detail </h3></button>
  <br><br>
  <a href="student_modify.php"><button class="bu"> <h3 > Modify detail</h3></button></a>
  <br><br>
  <a href="student_add.php"><button class="bu" > <h3 > Add member </h3></button>
  <br><br>
  <a href="student_remove.php"><button class="bu"><h3 >Remove member</h3></button></a><br><br>
  </div>
  </body>
 </html>