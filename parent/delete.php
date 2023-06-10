<?php
// Step 1: Connect to the database
include 'config.php';

// Step 2: Get ID from request parameters
$PARENTID = $_GET["PARENTID"];

// Step 3: Delete record from the database
$sql = "DELETE FROM parent WHERE PARENTID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $PARENTID);
if ($stmt->execute()) {
    // Step 4: Redirect back to the list of records or show a confirmation message
    header("Location: index.php");
    exit();
} else {
    // Handle any errors that occur during the execution of the query
    echo "Error: " . $stmt->error;
}
?>
