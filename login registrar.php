<html>
 <head>
 <title>Registrar Office Login
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
	float:right;
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
.right{
	float:right;
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
  <li><a href="home.php">Home</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="news.php">News</a></li>
  <li><a href="notifications.php">Notification</a></li>
  <li><a href="working.php">Working</a></li>
  <li class="right"><a href="contact us.php">Contact Us</a></li>
  <li class="dropdown">
    <a href="#" class="dropbtn">Login</a>
    <div class="dropdown-content">
      <a href="login admin.php">Database Admin</a>
      <a href="login registrar.php">Registrar Office</a>
  </li>
</ul>
  <br><br>
  <center>
  <font size=6>
  <div>
  <h1><h2 style="background-color:#008CBA;color:white" size="9">
  Registrar Office Login</font> </h2></h1>
  <br>
  
  <form action="login registrar_c.php" method="post"><font size=4>
  Username:
   <input type="text" placeholder=" Enter Username"  name="user" required >
  <br><br>
  User ID:
   <input type="text" placeholder="  User ID"  name="user_id" required >
  <br><br> 
  Password:
   <input type="password" placeholder=" Password" name="pass" required >
  <br><br> 
  <input type="reset">
  <input type="submit" value="Login" >
  </form>
 </body>
 </html>