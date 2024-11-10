<?php
// Connect to the database
include("../connection.php");

// Check if 'nic' is provided in the POST request
if (isset($_POST['nic'])) {
    $nic = $database->real_escape_string($_POST['nic']);

    // Query to check if the Student ID already exists
    $query = "SELECT * FROM student WHERE pnic = '$nic'";
    $result = $database->query($query);

    // If a row is found, the ID is taken
    if ($result->num_rows > 0) {
        echo "taken";
    } else {
        echo "available";
    }
}

// Close the connection
$database->close();
?>
