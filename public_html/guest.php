<?php
session_start();

include("includes/config.php");
include("includes/db.php");



if(isset($_POST['delete'])){
    
    $deleteQuery = "DELETE from property WHERE id = '$_POST[id]'";
      
       $results = mysqli_query($db,$deleteQuery);
    }

if(isset($_POST['img'])){
   $sql = "select * from property WHERE id = '$_POST[id]' ";
    $results = mysqli_query($db,$sql);
    
    while($row = mysqli_fetch_array($results)){
        
        echo "<img src = '".$row['img']."'> ";
        
        
    }
    }
   
    if(isset($_POST['update'])){
    $updateQuery = "UPDATE property SET area = '$_POST[area]',houseType = '$_POST[houseType]', bedroom = '$_POST[bedroom]', addres = '$_POST[addres]', address = '$_POST[address]', postcode = '$_POST[postcode]',rate = '$_POST[rate]',description = '$_POST[description]' WHERE id = '$_POST[id]' ";
    $results = mysqli_query($db,$updateQuery);
    
    }

if(isset($_POST['addnew'])){
    
       $addQuery = "insert into property (username,area,houseType,bedroom,addres,address,postcode,rate,description) VALUES ('$username','$_POST[area]','$_POST[houseType]','$_POST[bedroom]', '$_POST[addres]','$_POST[address]','$_POST[postcode]', '$_POST[rate]', '$_POST[description]')";
      
       $results = mysqli_query($db,$addQuery);
    }
   
    
    
    
  //   $sql1 = "select * from property where username = '$username'";
    //            $records = mysqli_query($db,$sql1); 
            
    
    
    
   

        



?>
<!doctype html> 
<html>
<head>
<link href="CSS/Layout.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
<link href="CSS/bootstrap.css" rel="stylesheet" type="text/css" />
 <link href="CSS/style.css" rel="stylesheet" type="text/css" />
    
    
<meta charset="utf-8">
<title>Guest</title>
</head>

<body>
<div id="Holder">
<div id="header"><div id="header"><div align="right"><h4><br>Welcome: <strong> Guest<br><div align="right"><a href="logOut.php">Logout</a></strong></h4></div></div></div>
<div id="navbar">
	<nav>
    	<ul>
        	 
            
           
            
            <li><a href="uploads.php">Contributions</a></li>
            <li><a href="guestcontactus.php">Contact Us</a></li>
            
        </ul>
     </nav>
    	
</div>

    
    <div clas   "container"><br>
        
    
       
        
        <hr>
   
        
        
        <form action="student.php" method="post">
  
         
            
            
            
                   
   
                
               
         

          <br>
    
        
          
    
    
<div id="Content">
	<div id="PageHeading">
	  <h1> </h1>
       
        
        
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