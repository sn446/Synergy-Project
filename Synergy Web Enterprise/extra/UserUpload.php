<?php
session_start();

include("includes/config.php");
include("includes/db.php");

function isunique($username){
$query = "select * from users where username = '$username'";
    global $db;
    
    $result = $db->query($query);
    if($result->num_rows>0){
        
        return false;
    }
    
    else return true;
}

if(isset($_POST['register'])){
    
    $_SESSION['username']= $_POST['username'];
    $_SESSION ['email']= $_POST ['email'];
    $_session ['password']= $_POST['password'];
    $_session ['confirm_password']= $_POST['confirm_password'];

    if($_POST['password'] != $_POST ['confirm_password']){
    
    header("Location:register.php?err=" . urlencode("Password does not match the confirm password."));
    exit();
}
    else if(strlen($_POST['password'])<5){
        
        header("Location:register.php?err=" . urlencode("Password should at least be 5 characters long."));
        exit();
    }
    else if (!isunique($_POST['username'])){
         header("Location:register.php?err=" . urlencode("Username has already been taken."));
        exit();
        
    }
    else if (!isunique($_POST['email'])){
         header("Location:register.php?err=" . urlencode("Email already exists."));
        exit();
        
    }

$query = "insert into users [username,email,password] values ('$_POST[username]','$_POST[email]','$_POST[password]')";
    global $db;
      
       echo "<script>alert <'Registration Succesful !'></script>";
        
    

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
<title>Post</title>
</head>

<body>
<div id="Holder">
<div id="header"></div>
<div id="navbar">
	<nav>
    	<ul>
        	<li><a href="Home.php">Home</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="index.php">LogOut</a></li>
        </ul>
     </nav>
    	
</div>

<div id="Content">
	<div id="PageHeading">
	  <h3>Post Here</h3>
        <hr>
            
        
        
        <form action="register.php"method="post">
            
            
            <?php if(isset($_GET['err'])){ ?>
    
        <div class="alert alert-danger"><?php echo $_GET['err']; ?></div>
       <?php } ?>
            
  <div class="form-group">
    <label for="exampleInputUsername">Username:</label>
    <input type="username" name = "username" class= "form-control" placeholder=" Username" value = "<?php echo @$_session['username']; ?>" required>
  </div>
            <div class="form-group">
    <label for="exampleInputUsername">Username:</label>
    <input type="username" name = "username" class= "form-control" placeholder=" Username" value = "<?php echo @$_session['username']; ?>" required>
  </div>
            <div class="form-group">
    <label for="exampleInputUsername">Username:</label>
    <input type="username" name = "username" class= "form-control" placeholder=" Username" value = "<?php echo @$_session['username']; ?>" required>
  </div>
            <div class="form-group">
    <label for="exampleInputUsername">Username:</label>
    <input type="username" name = "username" class= "form-control" placeholder=" Username" value = "<?php echo @$_session['username']; ?>" required>
  </div>
            
    <div class="form-group">
    <label for="exampleInputEmail1">Email:</label>
    <input type="email" name = "email" class= "form-control" placeholder=" Email adddress" value = "<?php echo @$_session['email']; ?>" required unique>
  </div>
            
  <div class="form-group">
    <label for="exampleInputPassword1">Password:</label>
    <input type= "password" name = "password" class="form-control" placeholder="Password" value = "<?php echo @$_session['password']; ?>" required>
  </div>
            <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password:</label>
    <input type= "password" name = "confirm_password" class="form-control" placeholder="Confirm Password" value = "<?php echo @$_session['confirm_password']; ?>" required>
  </div>
 <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  
  <button type="submit" name = "submit" class="btn btn-default">Submit</button>
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