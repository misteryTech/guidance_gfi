<?php
// Import database
include("../connection.php");

if ($_POST) {
    // Retrieve form data
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $oldemail = $_POST["oldemail"];
    $email = $_POST['email'];
    $tele = $_POST['Tele'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $id = $_POST['id00'];

    if ($password === $cpassword) {
        $error = '3';

        // Check if email already exists for another doctor
        $result = $database->query("SELECT doctor.docid FROM doctor INNER JOIN webuser ON doctor.docemail = webuser.email WHERE webuser.email = '$email';");

        if ($result->num_rows == 1) {
            $id2 = $result->fetch_assoc()["docid"];
        } else {
            $id2 = $id;
        }

        // Check if the email belongs to another doctor
        if ($id2 != $id) {
            $error = '1'; // Email already taken
        } else {
            // Build the update query for the doctor
            $sql1 = "UPDATE doctor SET docemail='$email', docname='$name', docnic='$nic', doctel='$tele'";

            // Only update password if provided
            if (!empty($password)) {
                $sql1 .= ", docpassword='$password'"; // Store password as plain text
            }

            $sql1 .= " WHERE docid=$id;";

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
header("Location: doctors.php?action=edit&error=$error&id=$id");
?>
