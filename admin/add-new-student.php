<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Student Registration</title>
    <style>
        .popup {
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    // Check if the user is logged in and has the correct user type
    if (!isset($_SESSION["user"]) || $_SESSION["user"] == "" || $_SESSION['usertype'] != 'a') {
        header("Location: ../login.php");
        exit();
    }

    // Include the database connection file
    include("../connection.php");

    // Check if the form has been submitted using POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $nic = $_POST['nic'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $tele = $_POST['tele'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $username = $_POST['username'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $usertype = "p";

        // Check if passwords match
        if ($password !== $cpassword) {
            header("Location: student.php?action=add&error=2");
            exit();
        }

        // Prepare SQL query to insert a new student into the database
        $sql = "INSERT INTO student (pnic, pname, pemail, ptel, ppassword, pusername, paddress, pdob) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $database->prepare($sql);
        $stmt->bind_param("ssssssss", $nic, $name, $email, $tele, $password, $username, $address, $dob);

        // Prepare SQL query to insert a new user into the webuser table
        $sqlweb = "INSERT INTO webuser (email, usertype) VALUES (?, ?)";
        $stmts = $database->prepare($sqlweb);
        $stmts->bind_param("ss", $email, $usertype);

        // Execute both statements and check for success
        if ($stmt->execute() && $stmts->execute()) {
            header("Location: student.php?action=add&error=4"); // Success
        } else {
            header("Location: student.php?action=add&error=1"); // Error
        }

        // Close the prepared statements
        $stmt->close();
        $stmts->close();
    }
    ?>
</body>
</html>
