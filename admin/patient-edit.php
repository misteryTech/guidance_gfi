<?php
// Import database
include("../connection.php");

if ($_POST) {
    // Retrieve form data
    $nic = $_POST['nic'];
    $name = $_POST['name'];
    $oldemail = $_POST["oldemail"];
    $email = $_POST['email'];
    $tele = $_POST['Tele'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $id = $_POST['id00'];

    if ($password === $cpassword) {
        $error = '3';

        // Check if email already exists for another doctor
        $result = $database->query("SELECT patient.pid FROM patient INNER JOIN webuser ON patient.pid = webuser.email WHERE webuser.email = '$email';");

        if ($result->num_rows == 1) {
            $id2 = $result->fetch_assoc()["pid"];
        } else {
            $id2 = $id;
        }

        // Check if the email belongs to another doctor
        if ($id2 != $id) {
            $error = '1'; // Email already taken
        } else {
            // Build the update query for the doctor
            $sql1 = "UPDATE patient SET pemail='$email', pname='$name', pnic='$nic', ptel='$tele'";

            // Only update password if provided
            if (!empty($password)) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql1 .= ", ppassword='$hashed_password'";
            }

            $sql1 .= " WHERE pid=$id;";

            // Execute the query
            $database->query($sql1);

            // Update the email in the webuser table
            $sql2 = "UPDATE webuser SET email='$email' WHERE email='$oldemail';";
            $database->query($sql2);

            $error = '4'; // Success
        }
    } else {
        $error = '2'; // Password mismatch
    }
} else {
    $error = '3'; // Invalid form submission
}

// Redirect back to the edit page with error or success message
header("Location: patient.php?action=edit&error=$error&id=$id");
?>
