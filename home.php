<html>
 <head>
 <title>Issues Management-BHU
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
nav {
    float: right;
}

.bu {
    position: relative;
    background-color: #e7e7e7; 
    color: black; 
    border: 2px solid #008CBA;
	border-radius: 8px;
    font-size: 28px;
    padding: 6px 80px;
    width: 600px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    overflow: hidden;
    cursor: pointer;
}

 </style>
 </head>
 <body>
 
  <img src="logo.jpg" style="width:100%;height:150px;">
  <img src="11.jpg" style="width:100%;height:300px;">
  
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

<nav>
<br><br>
<a href="login administration.php"><button class="bu" ><img src="administration.jpg"  align="left"> <h3 > Administration </h3></button>
<br><br>
<a href="login student.php"><button class="bu"><img src="student.jpg"  align="left"> <h3 > Student </h3></button></a>
<br><br>
</nav>

<p style="width:50%;font-size:150%;" >
 <img src="madan-mohan.png" alt="Madan-Mohan" align="right" height="142" width="103">India is not a country of the Hindus only. It is a country of the Muslims, the Christians and the Parsees too. The country can gain strength and develop itself only when the people of the different communities in India live in mutual goodwill and harmony. It is my earnest hope and prayer that this centre of life and light which is coming into existence, will produce students who will not only be intellectually equal to the best of their fellow students in other parts of the world, but will also live a noble life, love their country and be loyal to the Supreme ruler.
          <p><em><strong>Founder<br />
            Mahamana Pt. Madan Mohan Malviya</strong></em></p>   
</p>
<?php
   session_start();
   $curtime = date("Y-m-d H:i:s");
   $newtime = strtotime($curtime) + (210*60);
   
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
   
   $sql = "SELECT * FROM igbs";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
		   $value=$row['Time'];
	       $id=$row['id'];
		   $oldtime1 = strtotime($value) + (3600*24);
		   $oldtime2 = strtotime($value) + (3600*48);
		   if(($oldtime1<=$newtime)&&($row['Vote_by_s']==NULL)){		   
              $sql = "SELECT AVG(Vote_s) as average_score FROM ts$id";
			  $result1 = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result1);
              $avg=$row1['average_score'];
              $per=$avg*100;			  
			  $sql = "UPDATE igbs SET Vote_by_s=$per WHERE id=$id";
			   if ($conn->query($sql) == TRUE) {
				  
			   }
			   if($row['Vote_by_s']< 50){
				    $sql = "DELETE FROM igbs WHERE id=$id";
                    if ($conn->query($sql) == TRUE) {
						  
				    }
					$sql = "DROP TABLE ts$id";
                    if ($conn->query($sql) === TRUE) { 
					
					}
			    }
		    }
		   
		   if(($oldtime2<=$newtime)&&($row['Vote_by_a']==NULL)){
			  $sql = "SELECT AVG(Vote_a) as average_score FROM ts$id";
			  $result1 = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result1);
              $avg=$row1['average_score'];
              $per=$avg*100;			  
			  $sql = "UPDATE igbs SET Vote_by_a=$per WHERE id=$id";
			   if ($conn->query($sql) == TRUE) {
				   
			   } 
		    }
        }
    }
	
   $sql = "SELECT * FROM igba";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
		   $value=$row['Time'];
	       $id=$row['id'];
		   $oldtime1 = strtotime($value) + (3600*24);
		   $oldtime2 = strtotime($value) + (3600*48);
		   if(($oldtime1<=$newtime)&&($row['Vote_by_a']==NULL)){
              $sql = "SELECT AVG(Vote_a) as average_score FROM ta$id";
			  $result1 = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result1);
              $avg=$row1['average_score'];
              $per=$avg*100;			  
			  $sql = "UPDATE igba SET Vote_by_a=$per WHERE id=$id";
			   if ($conn->query($sql) == TRUE) {
				   
			   }	
			}
		   if(($oldtime2<=$newtime)&&($row['Vote_by_s']==NULL)){
			  $sql = "SELECT AVG(Vote_s) as average_score FROM ta$id";
			  $result1 = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result1);
              $avg=$row1['average_score'];
              $per=$avg*100;			  
			  $sql = "UPDATE igba SET Vote_by_s=$per WHERE id=$id";
			   if ($conn->query($sql) == TRUE) {
				   
			   }
		    }
        }
    } 
  ?>
 </body>
</html>
