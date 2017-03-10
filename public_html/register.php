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

function isEmailUnique($email){
$query = "select * from users where email = '$email'";
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
    $captcha = $_POST['captcha']; 

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
    else if (!isEmailUnique($_POST['email'])){
         header("Location:register.php?err=" . urlencode("Email already exists."));
        exit();
        
    }
    
    
     
       else if ( $_SESSION['digit'] != $captcha)  
        { header("Location:register.php?err=" . urlencode("CAPTCHA CODE WRONG!"));
        exit();}
    else {
        
        $username = mysqli_real_escape_string ($db, $_POST['username']);
        $email = mysqli_real_escape_string ($db, $_POST['email']);
        if(filter_var($email, FILTER_VALIDATE_EMAIL)!=true){
      header("Location:register.php?err=" . urlencode("Email not valid!"));
        exit();  
    }
    
        $password = mysqli_real_escape_string ($db, $_POST['password']);
        $password = md5($password);
        $token = rand(10000,99999);
        
        $query = "insert into users(username,email,password,token) values ('$username','$email','$password','$token')";
        
        $db -> query($query);
        
        $message = "Hello $username,\nyour account has been created and Here is your activation CODE:  $token";
        
       
       
        
        $headers = "From: <sn446@greenwich.ac.uk>";
       
        mail($email, "Activation CODE ",$message, $headers);
        header("Location:activation.php?success=" . urlencode("Activation CODE sent to your email!"));
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
<title>Register</title>
</head>

<body>
<div id="Holder">
<div id="header"><h1>B&H HOLIDAYS</h1></div>
<div id="navbar">
	<nav>
    	<ul>
        	
            <li><a href="contactus.php">Contact Us</a></li>
        </ul>
     </nav>
    	
</div>

<div id="Content">
	<div id="PageHeading">
	  <h1>Register here </h1>
        <hr>
            
        
        
        <form action="register.php"method="post">
            
            
            <?php if(isset($_GET['err'])){ ?>
    
        <div class="alert alert-danger"><?php echo $_GET['err']; ?></div>
       <?php } ?>
            
            <?php if(isset($_GET['success'])) { ?>
<div class = "alert alert-success"><?php echo $_GET['success']; ?></div>
<?php } ?>
        
            
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
           
            <img src='captcha.php' alt='CAPTCHA'/>
        <br>
            
            <div class="form-group">
    <label for="exampleInputUsername">Confirm you are human !</label>
    <input type="captcha" name = "captcha" class= "form-control" placeholder=" CAPTCHA CODE HERE! " value = "<?php echo @$_session['captcha']; ?>" required>
  </div>
 
  
  <button type="submit" name = "register" class="btn btn-success">Register</button>
             <a href="index.php" >or  login</a>
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