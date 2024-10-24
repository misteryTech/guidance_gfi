<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION["user"]) || $_SESSION["user"] == "" || $_SESSION['usertype'] != 'a') {
    header("location: ../login.php");
    exit();
}

// Include the database connection
include("../connection.php");

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $email = $_POST['email'];
    $tele = $_POST['tele'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Initialize error variable
    $error = '0';

    // Check if passwords match
    if ($password != $cpassword) {
        $error = '2'; // Passwords do not match
    } else {
        // Check if email already exists
        $result = $database->query("SELECT * FROM webuser WHERE email='$email';");
        if ($result && $result->num_rows > 0) {
            $error = '1'; // Email already exists
        } else {
            // Insert new patient into the patient and webuser tables
            $sql1 = "INSERT INTO patient(pemail, pname, ppassword, pnic, ptel) VALUES('$email', '$name', '$password', '$nic', '$tele');";
            $sql2 = "INSERT INTO webuser(email, usertype) VALUES('$email', 'p');";
            
            if ($database->query($sql1) && $database->query($sql2)) {
                $error = '4'; // Successfully added
            } else {
                $error = '3'; // Error adding record
            }
        }
    }

    // Redirect back to the form with the error code
    header("location: patient.php?action=add&error=" . $error);
    exit();
} else {
    // If no form data is submitted
    header("location: patient.php");
    exit();
}
?>
