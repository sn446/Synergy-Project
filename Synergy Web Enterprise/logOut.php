<?php 

session_start();
session_destroy();
header("Location: index.php?success=" . urlencode("Logged Out Succesfully!"));
exit();	


?>