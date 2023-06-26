<?php

session_start();
session_unset();
session_destroy();



header("Location:../parent/login-1.php");

echo "<script> alert 'you have been logged out'</script> "; 

?>