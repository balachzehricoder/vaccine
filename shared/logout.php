<?php

session_start();
session_unset();
session_destroy();



header("Location: ../admin/adminlogin.php");

echo "<script> alert 'you have been logged out'</script> "; 

?>