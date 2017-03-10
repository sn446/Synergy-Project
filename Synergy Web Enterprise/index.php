<?php
session_start();
include("includes/config.php");
include("includes/db.php");

//http://stumyadmin.cms.gre.ac.uk/
http://www.php-mysql-tutorial.com/wikis/mysql-tutorials/uploading-files-to-mysql-database.aspx

if(isset($_POST['login'])) {

    $username = mysqli_real_escape_string ($db , $_POST['username']);

    $password = mysqli_real_escape_string ($db , $_POST['password']);

    $query = "select * from users where username = '$username' and password ='$password'";

    
    $result = $db->query($query);       
    if($row = $result->fetch_assoc()) {
	
            if($row['token']== 'student'){
                $_SESSION['username']=$username;
                header("Location:student.php");
	exit(); }
     if($row['token']== 'manager'){
         $_SESSION['username']=$username;
                header("Location:manager.php");
	exit(); }
        if($row['token']== 'coordinator'){
         $_SESSION['username']=$username;
                header("Location:coordinator.php");
	exit(); }
        if($row['token']== 'admin'){
         $_SESSION['username']=$username;
                header("Location:admin.php");
	exit(); }
        if($row['token']== 'guest'){
         $_SESSION['username']=$username;
                header("Location:guest.php");
	exit(); }
                    
		
                
                if(isset($_POST['remember_me'])){
		setcookie("username",$username,time()+230);
                }
                
	
            
}
    else
    {
     header ("Location:index.php?err=" . urlencode ("Wrong Username Or Password!"));   
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
<title>Log in</title>
</head>

<body>
<div id="Holder">
<div id="header"><h1></h1></div>
<div id="navbar">
	<nav>
    	<ul>
        	
            
            <li><a href="contactus.php">Contact Us</a></li>
            <li><a href="guest.php">Guest</a></li>
        </ul>
     </nav>
    	
</div>

<div id="Content">
	<div id="PageHeading">
	  <h1>Login Here </h1>
        
       
        
        
      
    
        <hr>
        
        
        
        
	</div>
	<div id="Contentleft">
	  <form action="index.php" method="post">
  
            <?php if(isset($_GET['err'])){ ?>
    
        <div class="alert alert-danger"><?php echo $_GET['err']; ?></div>
       <?php } ?>
            
            <?php if(isset($_GET['success'])) { ?>
<div class = "alert alert-success"><?php echo $_GET['success']; ?></div>
<?php } ?>
            
            <div class="form-group">
      
      
      
    <label for="exampleInputUsername">Username:</label>
    <input type="Username" name = "username" class= "form-control" placeholder=" Username" required >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password:</label>
    <input type= "password" name = "password" class="form-control" placeholder="Password" required>
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
    <div id="contentright"></div>
 </div>
<div id="Footer"></div>
</div>
</body>
</html>