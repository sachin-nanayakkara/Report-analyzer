<!doctype html>
<?php
session_start();

$host='localhost';
$connect=mysqli_connect($host,'root','','login');

// Initialize some vars
$user_ok = false;
$log_username = "";
$log_password = "";
// User Verify function
function evalLoggedUser($connect,$u,$p){
	$sql = "SELECT id FROM user WHERE username = '$u' AND password = '$p'";
    $query = mysqli_query($connect, $sql);
    $numrows = mysqli_num_rows($query);
	if($numrows > 0){
		return true;
	}
}
if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) {
	$log_username = preg_replace('#[^a-z0-9]#i', '', $_SESSION['username']);
	$log_password = preg_replace('#[^a-z0-9]#i', '', $_SESSION['password']);
	// Verify the user
	$user_ok = evalLoggedUser($connect,$log_username,$log_password);
	
} else if(isset($_COOKIE["user"]) && isset($_COOKIE["password"])){
    $_SESSION['username'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['user']);
    $_SESSION['password'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['password']);
	$log_username = $_SESSION['username'];
	$log_password = $_SESSION['password'];
	// Verify the user
	$user_ok = evalLoggedUser($connect,$log_username,$log_password);
	
}

if($user_ok==false){
	 die("You have to logged in first!!");
	}

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#save").click(function(){
var EventID = $("#EventID ").val();
var EventName = $("#EventName").val();
var Date = $("#Date").val();
var Start = $("#Start").val();
var End = $("#End").val();
var Location = $("#Location").val();
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'EventID='+ EventID + '&EventName='+ EventName + '&Date='+ Date + '&Start='+ Start+ '&End='+ End + '&Location='+ Location;



// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "PHP/event.php",
data: dataString,
cache: false,
success: function(result){
alert("Created Successfully");
}
});
return false;
});
});
 
 
</script>
<title>Learning Mangement System</title>
<style type="text/css">

body{
	
	font-size:87.5%;
	font-family:Verdana, Geneva, sans-serif;
	line-height:1.5;
	text-align:left;
	/*border:outset;*/
	border-top-color:#FFF;
	border-bottom-color:#FFF;
	border-left-color:#FFF;
	border-right-color:#FFF;
	/*background-clip:content-box;*/
	background:#DCDCDC;
	/*background-image:url(518164-backgrounds.jpg);*/
	}

header img {
	width:17%;
	height:190px;
	float:left;
	margin-top:3px;
	/*box-shadow:1PX 1px 1px 3px rgba(0,0,0,0.25);*/
	border:#FFF outset ;
	border-radius:2px;
	margin-left:3px;
	}
	
header {
	position:relative;
	height:200px;
	width:100%;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	border-radius:2px;
	margin-top:0px;
	background-color:#FFF;
	}

header div{
		   width:80%;
		   margin-left:20%;
		   margin-top:0%;
		   position:absolute;
		}
header div h3{
	font-family:fontawesome;
	font-size:32px;
	}

#inside {float:right;
		 /*border:#000 solid 1px;*/
		 margin-top:-3px;
		 font-size:14px;
		 padding:0px;
		 margin-right:5px;	
		}	
		
#inside_p {
			padding-top:0px;
			padding-bottom:0px;
			}
	
#header_div1 {
	margin-right:0px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	font-style: normal;
	background-color:#fff;
	/*margin: 100px;*/
	height: 50px;
	width:81.5%;
	margin-top:11.5%;
	position:absolute;
	margin-left:18%;
	border-top:#9C6 solid 2px;
	border-bottom:#9C6 solid 2px;
}

a {
	text-decoration:none;
	}

nav {
	position:relative;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	margin-top:1%;
	/*background: #666;*/
	height:42px;
	border-radius:2px;
	width:100%;
	margin-bottom:0.5%;
	background:#FFF;
	}
label{ margin-left:3px;
	   color:#333;
	   font-family:Verdana, Geneva, sans-serif;
	 
	 }
	
nav ul{
	list-style:none;
	margin-left:-3%;
	
	}
nav ul li{
	float:left;
	display:inline;
	text-align:left;
	
		}
nav ul li a{
	transition:all 0.3s;
	/*margin-left:35px;*/
	margin-right:35px;
	font-weight:600;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	}

nav ul li a:link , nav ul li a:visited {
	color:#333;
	display:inline-block;
	padding:10px 20px;
	}
nav ul li a:hover{
	background-color:#00FF7F/*#CF5C3F*/;
	color:#000;	
	}
		#footer1{
	width:100%;
	height:160px;
	
	}
	#footerimg{
	height:100%;
	width:100%;
	
	}
#footer2{
	height:30px;
	background-color:#333;
	color:#999;
	padding-left:2%;
	
	}
	@media only screen and (min-width:150px) and (max-width:600px)
{
	body{
	font-family:Verdana, Geneva, sans-serif;
	text-align:left;
	/*border:outset;*/
	/*background-clip:content-box;*/
	background:#FFFAFA;
	/*background-image:url(518164-backgrounds.jpg);*/
	}

header img {
	width:17%;
	height:120px;
	float:left;
	margin-top:3px;
	/*box-shadow:1PX 1px 1px 3px rgba(0,0,0,0.25);*/
	border:#FFF outset ;
	border-radius:2px;
	margin-left:3px;
	}
	
header {
	position:relative;
	height:130px;
	width:100%;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	border-radius:2px;
	margin-top:0px;
	background-color:#FFF;
	}

header div{
		   width:80%;
		   margin-left:20%;
		   margin-top:0%;
		   position:absolute;
		}
header div h3{
	font-family:fontawesome;
	font-size:18px;
	text-align:center;
	}

#inside {
			display:none	
		}	
		
	
#header_div1 {
	margin-right:0px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	font-style: normal;
	background-color:#fff;
	/*margin: 100px;*/
	height: 30px;
	width:80%;
	margin-top:15.8%;
	position:absolute;
	margin-left:18.8%;
	border-top:#9C6 solid 2px;
	border-bottom:#9C6 solid 2px;
	padding-bottom:5px;
	padding-top:-2px;
}

a {
	text-decoration:none;
	}
nav {
	position:relative;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	margin-top:0.3%;
	/*background: #666;*/
	height:42px;
	border-radius:2px;
	width:100%;
	margin-bottom:0.5%;
	background:#FFF;
	}
label{ margin-left:3px;
	   color:#333;
	   font-family:Verdana, Geneva, sans-serif;
	 
	 }
	#hide{display:none;}
nav ul{
	list-style:none;
	margin-left:-6%;
	height:38px;
	
	}
nav ul li{
	float:left;
	display:inline;
	text-align:left;
	
		}
nav ul li a{
	transition:all 0.3s;
	/*margin-left:35px;*/
	font-weight:600;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	}

nav ul li a:link , nav ul li a:visited {
	color:#333;
	display:inline-block;
	padding:10px 20px;
	}
nav ul li a:hover{
	background-color:#00FF7F/*#CF5C3F*/;
	color:#000;	
	}
		#footer1{
	width:100%;
	height:160px;
	
	}
	#footerimg{
	height:100%;
	width:100%;
	
	}
#footer2{
	height:30px;
	background-color:#333;
	color:#999;
	padding-left:2%;
	
	}
}
@media only screen and (min-width:1350px) and (max-width:1380px){
	body{
	
	font-size:87.5%;
	font-family:Verdana, Geneva, sans-serif;
	line-height:1.5;
	text-align:left;
	/*border:outset;*/
	border-top-color:#FFF;
	border-bottom-color:#FFF;
	border-left-color:#FFF;
	border-right-color:#FFF;
	/*background-clip:content-box;*/
	background:#FFFAFA;
	/*background-image:url(518164-backgrounds.jpg);*/
	}

header img {
	width:17%;
	height:190px;
	float:left;
	margin-top:3px;
	/*box-shadow:1PX 1px 1px 3px rgba(0,0,0,0.25);*/
	border:#FFF outset ;
	border-radius:2px;
	margin-left:3px;
	}
	
header {
	position:relative;
	height:200px;
	width:100%;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	border-radius:2px;
	margin-top:0px;
	background-color:#FFF;
	}

header div{
		   width:80%;
		   margin-left:21%;
		   margin-top:0%;
		   position:absolute;
		}
header div h3{
	font-family:fontawesome;
	font-size:32px;
	}

#inside {float:right;
		 /*border:#000 solid 1px;*/
		 margin-top:-3px;
		 font-size:14px;
		 padding:0px;
		 margin-right:5px;	
		}	
		
#inside_p {
			padding-top:0px;
			padding-bottom:0px;
			}
	
#header_div1 {
	margin-right:0px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	font-style: normal;
	background-color:#fff;
	/*margin: 100px;*/
	height: 50px;
	width:81.5%;
	margin-top:10.8%;
	position:absolute;
	margin-left:18%;
	border-top:#9C6 solid 2px;
	border-bottom:#9C6 solid 2px;
}

a {
	text-decoration:none;
	}

nav {
	position:relative;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	margin-top:1%;
	/*background: #666;*/
	height:42px;
	border-radius:2px;
	width:100%;
	margin-bottom:0.5%;
	background:#FFF;
	}
label{ margin-left:3px;
	   color:#333;
	   font-family:Verdana, Geneva, sans-serif;
	 
	 }
	
nav ul{
	list-style:none;
	margin-left:-3%;
	
	}
nav ul li{
	float:left;
	display:inline;
	text-align:left;
	
		}
nav ul li a{
	transition:all 0.3s;
	/*margin-left:35px;*/
	margin-right:35px;
	font-weight:600;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	}

nav ul li a:link , nav ul li a:visited {
	color:#333;
	display:inline-block;
	padding:10px 20px;
	}
nav ul li a:hover{
	background-color:#00FF7F/*#CF5C3F*/;
	color:#000;	
	}
	#footer1{
	width:100%;
	height:160px;
	
	}
	#footerimg{
	height:100%;
	width:100%;
	
	}
#footer2{
	height:30px;
	background-color:#333;
	color:#999;
	padding-left:2%;
	
	}
	


	input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

input[type=date], input[type=time] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}


/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: left;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
} 

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

 .password{
       
       width: 50%;

     

 }

  .bottem-Right{

    margin: auto;
   
    border: 3px solid #73AD21;
    padding: 10px;
    float: right;
    width: 50%;


  } 

 
  
.footer_image{
 width: 98.1%;
 background-color:#333;
}

.footer_image{
     width: 1200px;
     height: 120px;

 }

 .bottomleftmargin{

  	 margin: auto;
   
    border: 3px solid #73AD21;
    padding: 20px;
    height: 120%;
   
    
  }

   .pure-button-primary{
   
   	  display: inline-block;
  border-radius: 4px;
  
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;

  padding: 0.25px;
  width: 200px;
 
  cursor: pointer;
  margin: 5px;

   }


  body{
  	background-color: white;

  }
 
 h1{
  font-family:Georgia;
 }

</style>

<body>
 

<body>
<header> <img src="nsbm.jpg" alt='Logo'><div><h3> NSBM GREEN UNIVERSITY LERNING MANEGEMENT SYSTEM</h3></div>
  <div id="header_div1"><marquee> <h4>  Recognizing the trends in technology and globalization, NSBM has designed an alternative and innovative approach to higher education to prepare young people to face new challenges of the world. As a degree school which enables its students to experience the future of higher education NSBM is encouraging their students to deal with sophisticated technology throughout their academic life. “e-Learning Management System” is the novel initiative taken up by NSBM to give hi-tech exposure to the students in order to pursue their studies in virtual terms. Through this learning process learners can communicate with their lecturers, their peers, and access learning materials, over the Internet or other computer networks. This area provides you with a wealth of information and resources designed to enrich student’s experience at NSBM. From information on registration, fees and exams to student support services and who to contact for academic advice, you’ll find it all here in one place.</h4></marquee></div>
</header>
<!--<center>-->
<nav>
	<ul>
   
    	<li id="headerhome"><a href="../web assignment home/Home.php">Home</a></li>
        <li><a href="../web assignment home/about us.html">About us</a></li>
        <li><a href="../web assignment home/service.php">Services</a></li>
        <li id="hide"><a href="../web assignment home/support.php">Support</a></li>
        <li><a href="#">Events</a></li>
        
    </ul>
</nav>
<!--</center>-->


<br>
<br>

 <div class="bottomleftmargin">

    
    <div class="container">
         <h1 align="center">EVENT MANAGEMENT</h1>
		
<form action="PHP/eventsearch" method="POST">
      <label><b>Event ID</b></label>
      <input type="text" placeholder="Event ID" id="EventID" name="EventID" required>

      <label><b>Event Name</b></label>
      <input type="text" placeholder="Event Name" id="EventName" name="EventName" required>


      <label><b>Date</b></label>
      <input type="date" id="Date" name="Date" required>

      <label><b>Start Time</b></label>
      <input type="time"  id="Start" name="Start" required>

      <label><b>End Time</b></label>
      <input type="time" id="End" name="End" required>


      <label><b>Location</b></label>
      <input type="text" id="Location" name="Location" required>
     
    </form>
      <div class="button-panel">
      <table>
      <tr>
      <th>  
      <button class="pure-button pure-button-primary" id="save">Save</button>
      </th>
      <th>  
      <button class="pure-button pure-button-primary">Update</button>
      </th>
      <th>  
      <button class="pure-button pure-button-primary">Delete</button>
      </th>
      <th>  
      <button class="pure-button pure-button-primary" id="search" onClick="window.location.href='Eventmanagmensearch.html'">Search</button>
      </th>
      </table>
      </div>
    </div>	

   </div>

<footer id="footer1"><img src="banner-logos.png" id="footerimg" /> </footer>
<footer id="footer2">Copyright © 2016 National School of Business Management. All Rights Reserved.</footer>
          <!--</center>-->
         <center><h5>Telephone: +94(11) 567 2545|5673535 - Email:info@nsbm.lk</h5>
          </center>
</body>
</html>