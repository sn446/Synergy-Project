<?php
session_start();
include("includes/config.php");
include("includes/db.php");

	if(isset($_POST['activate'])) {

    $token = $_POST['token'];

    

    $query = "select * from users where token = '$token'";

    
    $result = $db->query($query);       
    if($row = $result->fetch_assoc()) {
	
            if($row['token']==$token){
                               
                $query ="update users set status='1' where token = '$token'";
                    if($db->query($query)){
	
	header ("Location:myaccount.php?success=" . urlencode("Account Activated! You may now login!"));
	exit();
}
            }}
            else 
    {
        header ("Location:activation.php?err=" . urlencode("Wrong activation CODE!"));
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
<title>Activation</title>
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
	  <h1>Activate your account </h1><hr>
       
        
        
        
        <form action="activation.php" method="post">
            
            <?php if(isset($_GET['err'])){ ?>
    
        <div class="alert alert-danger"><?php echo $_GET['err']; ?></div>
       <?php } ?>
            
            <?php if(isset($_GET['success'])) { ?>
<div class = "alert alert-success"><?php echo $_GET['success']; ?></div>
<?php } ?>
 
    <div class="form-group">
    <label for="exampleInputActivation">Activation CODE:</label>
    <input type="token" name = "token" class= "form-control" placeholder=" Activation code" required>
  </div>
            
  
 
  
  <button type="submit" name = "activate" class="btn btn-default">Activate</button>
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