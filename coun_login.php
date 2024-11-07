<?php
session_start();

// If user is already logged in, redirect to index.php
if (isset($_SESSION['loggedIn'])) {
    header('Location: index.php');
    exit();
}

// Unset session variables
$_SESSION["user"] = "";
$_SESSION["usertype"] = "";

// Set timezone
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$_SESSION["date"] = $date;

// Import database connection
include("connection.php");

$error = '<label for="promter" class="form-label">&nbsp;</label>';

// If form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['useremail'];
    $password = $_POST['userpassword'];

    // Sanitize input to prevent SQL injection
    $email = $database->real_escape_string($email);
    
    // Query to check user email
    $result = $database->query("SELECT * FROM webuser WHERE email='$email'");
    
    if ($result && $result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $utype = $user['usertype'];

        // Verify password
        $passwordQuery = '';
        $table = '';
        if ($utype == 'p') {
            $table = 'student';
            $passwordQuery = "SELECT * FROM $table WHERE pemail='$email'";
        } elseif ($utype == 'a') {
            $table = 'admin';
            $passwordQuery = "SELECT * FROM $table WHERE aemail='$email'";
        } elseif ($utype == 'c') {
            $table = 'counselor';
            $passwordQuery = "SELECT * FROM $table WHERE couemail='$email'";
        }

        // Check user credentials
        if (!empty($passwordQuery)) {
            $checker = $database->query($passwordQuery);
            if ($checker && $checker->num_rows == 1) {
                $row = $checker->fetch_assoc();

                // Use password_verify for better security
                if (password_verify($password, $row['coupassword'] ?? $row['ppassword'] ?? $row['apassword'])) {
                    $_SESSION['user'] = $email;
                    $_SESSION['usertype'] = $utype;

                    // Redirect based on user type
                    if ($utype == 'p') {
                        $_SESSION['pid'] = $row['pid'];
                        header('location: student/index.php');
                    } elseif ($utype == 'a') {
                        header('location: admin/index.php');
                    } elseif ($utype == 'c') {
                        header('location: counselor/index.php');
                    }
                    exit();
                } else {
                    $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }
            } else {
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We can\'t find any account for this email.</label>';
            }
        }
    } else {
        $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We can\'t find any account for this email.</label>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <center>
        <div class="container">
            <table border="0" style="margin: 0;padding: 0;width: 60%;">
                <tr>
                    <td><p class="header-text">Welcome Back!</p></td>
                </tr>
                <div class="form-body">
                    <tr>
                        <td><p class="sub-text">Login with your details to continue</p></td>
                    </tr>
                    <tr>
                        <form action="" method="POST">
                            <td class="label-td">
                                <label for="useremail" class="form-label">Email: </label>
                            </td>
                    </tr>
                    <tr>
                        <td class="label-td">
                            <input type="email" name="useremail" class="input-text" placeholder="Email Address" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td">
                            <label for="userpassword" class="form-label">Password: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td">
                            <input type="password" name="userpassword" class="input-text" placeholder="Password" required>
                        </td>
                    </tr>
                    <tr>
                        <td><br><?php echo $error; ?></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Login" class="login-btn btn-primary btn">
                        </td>
                    </tr>
                </div>
                
                </form>
            </table>
        </div>
    </center>
</body>
</html>
