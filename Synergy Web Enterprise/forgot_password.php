<?php

include("includes/config.php");
include("includes/db.php");

	if(isset($_POST['send_password'])){
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$query = "select * from users where email ='$email'";
		$result = $db->query($query);
		if($row = $result->fetch_assoc()) {
			$password = $row['password'];
			
            
            
            $message = "Hello! !\n Your password is : $password";
            $headers = "From: <sn446@greenwich.ac.uk>";
       
       if( mail($email, "Password reset ",$message, $headers)){
        
				header("Location:forgot_password.php?success=" . urlencode("Your password has been sent to your Email!"));
				exit();}
            else{
              header("Location:forgot_password.php?err=" . urlencode("Email address not found!!!"));
				exit();
            }}  
            else{
              header("Location:forgot_password.php?err=" . urlencode("Email address not found!!!"));
				exit();
         }
							
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
<title>Forgot Passwordr</title>
</head>

<body>
<div id="Holder">
    <div id="header"><h1></h1></div>
<div id="navbar">
	<nav>
    	<ul>
        	<li><a href="index.php">Login</a></li>
            
            <li><a href="#">Contact Us</a></li>
        </ul>
     </nav>
    	
</div>

<div id="Content">
	<div id="PageHeading">
	  <h1>Recover Password </h1>
       
        
        
        
        <form action="forgot_password.php" method="post">
            <?php if(isset($_GET['err'])){ ?>
    
        <div class="alert alert-danger"><?php echo $_GET['err']; ?></div>
       <?php } ?>
            
            <?php if(isset($_GET['success'])) { ?>
<div class = "alert alert-success"><?php echo $_GET['success']; ?></div>
<?php } ?>
 
    <div class="form-group">
    <label for="exampleInputEmail1">Email:</label>
    <input type="email" name = "email" class= "form-control" placeholder=" Email adddress">
  </div>
            
  
 
  
  <button type="submit" name = "send_password" class="btn btn-default">Send Password</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
</form>
        
        
        
	</div>
	<div id="Contentleft">
	  <h5> </h5>
        
        
	</div>
    <div id="contentright"></div>
 </div>
<div id="Footer"></div>
</div>
</body>
</html>