<?php

include("includes/config.php");
include("includes/db.php");



?>
<!doctype html>
<html>
<head>
<link href="CSS/Layout.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
<link href="CSS/bootstrap.css" rel="stylesheet" type="text/css" />
 <link href="CSS/style.css" rel="stylesheet" type="text/css" />
    
    
<meta charset="utf-8">
<title>Log in</title>
</head>

<body>
<div id="Holder">
<div id="header"><h1>B&H HOLIDAYS</h1></div>
<div id="navbar">
	<nav>
    	<ul>
        	
            <li><a href="#">Our Accomodations</a></li>
                 <li><a href="#">Contact Us</a></li>
            <li><a href="logOut.php">LogOut</a></li>
        </ul>
     </nav>
    	
</div>

<div id="Content">
	<div id="PageHeading">
	  <h3><a href="UserUpload.php" >Post Your Own Accomodation!</a></h3>
       
        
        
        
        <form>
  <div class="form-group">
    <label for="exampleInputUsername">Username:</label>
    <input type="Username" name = "username" class= "form-control" placeholder=" Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password:</label>
    <input type= "password" name = "password" class="form-control" placeholder="Password">
  </div>
 
  <div class="checkbox">
    <label>
      <input type="checkbox" name = "remember_me"> Remember me
    </label>
  </div>
  <button type="submit" name = "login" class="btn btn-default">Login</button>
            
            <a href="forgot_password.php" >Forgot Passowrd</a>
</form>
        
        
        
	</div>
	<div id="Contentleft">
	  <h5></h5>
        
        
	</div>
    <div id="contentright">
     
    </div>
 </div>
<div id="Footer"></div>
</div>
</body>
</html>