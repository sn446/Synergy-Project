<?php
session_start();

include("includes/config.php");
include("includes/db.php");

if(!isset($_SESSION['username'])) {
	header("Location:index.php?err=". urlencode("You need to login to view your account!"));
	exit();}

$username = $_SESSION['username'];  


if(isset($_POST['upload'])) {
 header("Location:uploadProperty.php?"  );
	exit();   
    
}

?>
<!doctype html>
<html>
<head>
<link href="CSS/Layout.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
<link href="CSS/bootstrap.css" rel="stylesheet" type="text/css" />
 <link href="CSS/style.css" rel="stylesheet" type="text/css" />
    
    
<meta charset="utf-8">
<title>Administrator</title>
</head>

<body>
<div id="Holder">
    <div id="header"><div align="right"><h4>Welcome: <strong><?php if(isset($_SESSION['username'])) {
    echo $_SESSION['username'];} else echo $_COOKIE['username']; ?> </strong></h4></div><div align="right"><a href="logOut.php" class="btn btn-dan btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
       </div>
<div id="navbar">
	<nav>
    	<ul>
        	
            <li><a href="#">staff</a></li>
          
        </ul>
     </nav>
    	
</div>

    
    <div clas   "container">
        
    
        
        
        
        
        
     
        
        
        
        
        <div class="jumbotown"
    /div>
    
<div id="Content">
	<div id="PageHeading">
	  <h1> </h1>
       
        
        
	</div>
	<div id="Contentleft">
	  
        
        
	</div>
    <div id="contentright">
   
    </div>
 </div>
<div id="Footer"></div>
</div>
</body>
</html>