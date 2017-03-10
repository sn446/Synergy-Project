<?php
session_start();

include("includes/config.php");
include("includes/db.php");

if(!isset($_SESSION['username'])) {
	header("Location:index.php?err=". urlencode("You need to login to view your account!"));
	exit();}

$username = $_SESSION['username'];  

$sql1 = "select  id,username, name, date, feedback from uploads";
                $records = mysqli_query($db,$sql1); 

  if(isset($_POST['feedback'])){
    $addfeedback = "UPDATE uploads SET feedback = '$_POST[feedback]' WHERE id = '$_POST[id]' ";
    $results = mysqli_query($db,$addfeedback);
      
       header ("Location:coordinator.php?success=" . urlencode ("Feedback added succesfully!"));  
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
    
    <head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Marketing Coordinator</title>
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
        	
        
            <li><a href="statistics.php">Statistics</a></li>
            <li><a href="manager.php">Approved reports</a></li>
            <li><a href="mancontactus.php">Contact Us</a></li>
           
        </ul>
     </nav>
    	
</div>

    
        
        <div class="jumbotown"></div>
   
    
<div id="Content">
	<div id="PageHeading">
    
        
        <?php if(isset($_GET['err'])){ ?>
    
        <div class="alert alert-danger"><?php echo $_GET['err']; ?></div>
       <?php } ?>
            
            <?php if(isset($_GET['success'])) { ?>
<div class = "alert alert-success"><?php echo $_GET['success']; ?></div>
<?php } ?>
        
        <br> <strong><h3>All contributions </h3></strong><hr>
        <div align = right class="dropdown" width = 100%>
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Select Faculty
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="Faculty">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Business</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Computer Science</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Engineering</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sport</a></li>
    </ul>
  </div>
</div>
       
      <table class="table table-inverse" ac>
                
               
         
  <thead>
    <tr>
       <th></th>
      <th>Student Name</th>
      <th>Title</th>
      <th>Upload time</th>
         <th rowspan="2">Feedback</th>
        <th></th>
    
      
    </tr>
  </thead>
  <tbody>
      
      <tr>
     <?php 
         
         
        
        

        
      while($row = mysqli_fetch_array($records))  {
          
               
           
   echo "<tr>" . "<form action=manager.php method=post class= form-control>";      
echo "<td>" . "<input type = hidden class= form-control name  = id value =' ".$row['id']."'</td>";
 echo "<td> ".$row['username']."</td>";
 echo "<td>".$row['name']."</td>";
 echo "<td>".$row['date']."</td>";  
  echo "<td>"."<input type = textarea class='form-control' name ='feedback' PlaceHolder = 'feedback  . . '  value = '".$row['feedback']."'></td>";
   echo "<td>" . "<input type = submit   name = feedback class = 'btn btn-success' value = feedbacks " . ">";  
   echo "<td>"."<input type = submit  name = approve class = 'btn btn-success' value = 'Approve'>
 
</td>";
    echo "</tr></form>";      
		       
      }
   
                 
echo "</tbody>";
echo "</table>";
        ?>  
       
        
        
        
        
     
        
        
        
	  <h1> </h1>
       
        
        
	
	<div id="Contentleft">
	  <h5> </h5>
        
        
	</div>
    <div id="contentright"></div>
 </div>
<div id="Footer"></div>

</body>
</html>