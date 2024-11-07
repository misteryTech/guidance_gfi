<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Counselor Registration</title>
    <style>
        .popup {
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    // Check if user is logged in and is an admin
    if (isset($_SESSION["user"])) {
        if ($_SESSION["user"] == "" || $_SESSION['usertype'] != 'a') {
            header("location: ../login.php");
            exit;
        }
    } else {
        header("location: ../login.php");
        exit;
    }

    // Import database
    include("../connection.php");

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve and sanitize input
        $name = trim($_POST['name']);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $tele = trim($_POST['Tele']);
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $usertype = "c";

        // Validate input
        if (empty($name) || empty($email) || empty($tele) || empty($password) || empty($cpassword)) {
            header("Location: counselor.php?action=add&error=3"); // Error for empty fields
            exit;
        }

        // Check if passwords match
        if ($password !== $cpassword) {
            header("Location: counselor.php?action=add&error=2"); // Error for password mismatch
            exit;
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new counselor into the database
        $sql = "INSERT INTO counselor (couname, couemail, coutel, coupassword) VALUES (?, ?, ?, ?)";
        $stmt = $database->prepare($sql);
        $stmt->bind_param("ssss", $name, $email, $tele, $hashed_password);

        // Check if the counselor was added successfully
        if ($stmt->execute()) {
            // Prepare SQL query to insert a new user into the webuser table
            $sqlweb = "INSERT INTO webuser (email, usertype) VALUES (?, ?)";
            $stmts = $database->prepare($sqlweb);
            $stmts->bind_param("ss", $email, $usertype);

            // Execute the webuser insert statement
            if ($stmts->execute()) {
                header("Location: counselor.php?action=add&error=4"); // Success
            } else {
                header("Location: counselor.php?action=add&error=5"); // Error adding to webuser
            }
        } else {
            header("Location: counselor.php?action=add&error=1"); // Error adding counselor
        }

        // Close statements
        $stmt->close();
        $stmts->close();
    }
    ?>
</body>
</html>
