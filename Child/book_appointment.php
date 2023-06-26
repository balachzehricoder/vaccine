<?php
 session_start();

if (!isset($_SESSION["PARENTID"])) {
  header("Location: ../parent/login-1.php");
  exit();
}
// include '../shared/nav.php';


$vacc_id =  $_GET["vacc_id"];
$child_id = $_GET["child_id"];
$hosp_id = $_GET["hosp_id"];


       
include 'config.php';
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "crud";
// //Create Connection
// $connection = new mysqli($servername, $username, $password, $database);


$sql = "INSERT INTO appointment (CHILDRENID, VACCINEID, HOSPITALID) VALUES ('$child_id','$vacc_id', '$hosp_id')";
$result = $conn->query($sql);
if (!$result) {
    $erroMessage = "invalid query:" . $conn->error;

}


$succesMessage = "appointment booked successfully";

header('Location: index.php');
exit;

?>
