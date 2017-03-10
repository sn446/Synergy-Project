<?php
session_start();

include("includes/config.php");
include("includes/db.php");




   

if(isset($_POST['send'])){
    
    $answer = $_POST['answer'];
    $message = $_POST['message'];
    $email = $_POST['email'];
     $name = $_POST['name'];
    if($answer == 5){
        
        $headers = "From: $email";
       
        mail("sn446@greenwich.ac.uk", "B&H Holidays Inquiry From  :  $name  \n  ",$message, $headers);
        header("Location:coocontactus.php?success=" . urlencode("Thank you for your inquiry, will get back to you as soon as possible!"));
        exit();
        
       
        
    }
    else{
        
    header("Location:coocontactus.php?err=" . urlencode("Please check your answer!"));
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
<title>Contact Us</title>
</head>

<body>
<div id="Holder">
<div id="header"><div align="right"><h4><br><br>Welcome: <strong><?php if(isset($_SESSION['username'])) {
    echo $_SESSION['username'];} else echo $_COOKIE['username']; ?> <br><div align="right"><a href="logOut.php">Logout</a></strong></h4></div><h1></h1></div>
<div id="navbar">
	<nav>
    	<ul>
            <li><a href="coordinator.php">Home</a></li>
        
        
           
            
        </ul>
     </nav>
    	
</div>

<div id="Content">
	<div id="PageHeading">
	  <h1>Contact Us </h1>
        <hr>
            
        
        
                  
            
          
<form action = "coocontactus.php "class="form-horizontal" role="form" method="post" action="index.php">
    
    
      <?php if(isset($_GET['err'])){ ?>
    
        <div class="alert alert-danger"><?php echo $_GET['err']; ?></div>
       <?php } ?>
            
            <?php if(isset($_GET['success'])) { ?>
<div class = "alert alert-success"><?php echo $_GET['success']; ?></div>
<?php } ?>
        

    
    
    
    
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
		</div>
	</div>
	<div class="form-group">
		<label for="email" name = "email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="">
		</div>
	</div>
	<div class="form-group">
		<label for="message" class="col-sm-2 control-label">Message</label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="4" name="message"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="answer" name="answer" placeholder="Your Answer">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<input id="submit" name="send" type="submit" value="Send" class="btn btn-primary">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			
		</div>
	</div>

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