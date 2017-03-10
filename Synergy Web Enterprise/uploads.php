<?php
session_start();

include("includes/config.php");
include("includes/db.php");

if(!isset($_SESSION['username'])) {
	header("Location:index.php?err=". urlencode("You need to login to view your account!"));
	exit();}
$username = $_SESSION['username'];  

 $sql1 = "select * from uploads where username = '$username'";
                $records = mysqli_query($db,$sql1); 
 
                

if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
    
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}
$query = "INSERT INTO uploads (name, size, type, content, username ) VALUES ('$fileName', '$fileSize', '$fileType', '$content','$username')";
    if(!isset($_POST['terms'])){
     header ("Location:uploads.php?err=" . urlencode ("You must read and agree with the terms and conditions*"));  
        exit();
    }

$db -> query($query);

header("Location: uploads.php?success=" . urlencode("File succesfully uploaded!"));
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
    
    
<meta charset="utf-8">
<title>My Properties</title>
</head>

<body>
<div id="Holder">
<div id="header"><div id="header"><div align="right"><h4><br>Welcome: <strong><?php if(isset($_SESSION['username'])) {
    echo $_SESSION['username'];} else echo $_COOKIE['username']; ?> <br><div align="right"><a href="logOut.php">Logout</a></strong></h4></div></div></div>
<div id="navbar">
	<nav>
    	<ul>
        	 
            
           
            <li><a href="student.php">Home</a></li>
            
            
        </ul>
     </nav>
    	
</div>

    
   <div id="Content">
	<div id="PageHeading">

        <hr>
     
	
        <?php if(isset($_GET['err'])){ ?>
    
        <div class="alert alert-danger"><?php echo $_GET['err']; ?></div>
       <?php } ?>
            
            <?php if(isset($_GET['success'])) { ?>
<div class = "alert alert-success"><?php echo $_GET['success']; ?></div>
<?php } ?>
        
        <div class="form-group">
            
      <form action="uploads.php"  method="post" enctype="multipart/form-data">
<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
<tr> 
<td width="246">
<input type="hidden" class= "form-control" name="MAX_FILE_SIZE" value="2000000">
<input name="userfile" class= "form-control" type="file" id="userfile" required> 
</td>
<td width="80"><input name="upload" class= "form-control" type="submit" class="box" id="upload" value=" Upload "></td>
</tr>
    
</table>
          <div class="checkbox">
    <label>
      <input type="checkbox" name = "terms">
    <p> I agree to<a href="terms.php"  ><strong>Terms and Conditions*</strong></a> </p>  </label>
   
  </div>
</form>  
            </div>

       
 
        <div id="Contentleft"></div>
        <div id="contentright"></div></div></div></div></div>
        
       
    
     
 
<div id="Footer"></div>

</body>
</html>