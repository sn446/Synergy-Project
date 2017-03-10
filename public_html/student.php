<?php
session_start();

include("includes/config.php");
include("includes/db.php");

if(!isset($_SESSION['username'])) {
	header("Location:index.php?err=". urlencode("You need to login to view your account!"));
	exit();}


$username = $_SESSION['username'];  

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
   
    
    
    
 $sql1 = "select * from uploads where username = '$username'";
                $records = mysqli_query($db,$sql1); 
            
    
    if(isset($_GET['download'])) 
{


$query = "SELECT name, type, size, content " .
         "FROM uploads WHERE id = '$_POST[id]'";

$result = mysqli_query($db,$query) or die('Error, query failed');
list($name, $type, $size, $content) =                                  mysqli_fetch_array($result);

header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
echo $content;
    
   

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
<title>Student</title>
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
        	 
            
           
            
            <li><a href="uploads.php">Uploads</a></li>
            <li><a href="stucontactus.php">Contact Us</a></li>
            
        </ul>
     </nav>
    	
</div>
<div id="Content">
	<div id="PageHeading">

        
       
        
        
      
    
        <hr>
        
        
        
        
	</div>

    
    	    <table class="table table-inverse">
                
               
         
  <thead>
    <tr>
       
      <th>File Name</th>
      <th>Upload time</th>
      <th>size</th>
        <th></th>
    
      
    </tr>
  </thead>
  <tbody>
      
      <tr>
     <?php 
         
         
        
        

        
      while($row = mysqli_fetch_array($records))  {
          
               
           
   echo "<tr>" . "<form action=student.php method=post class= form-control>";      

 echo "<td> ".$row['name']."</td>";
 echo "<td>".$row['date']."</td>";
 echo "<td>".$row['size']."</td>";
 echo "<td>" . "<input type = submit  class= form-control  name = download  value = download " . ">";


  
    echo "</tr></form>";      
		       
      }
   
                 
echo "</tbody>";
echo "</table>";
        ?>    
      </tr></tbody></table></div></div>
 </div>	<div id="Contentleft">

        
    </div>
	
                <div id="contentright"></div>
<div id="Footer"></div>

</body>
</html>