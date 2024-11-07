<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
    <title>Student Dashboard</title>
    <style>
        .dashboard-tables, .filter-container, .sub-table {
            animation: transitionIn-Y-over 0.5s;
        }
        table {
            border-collapse: collapse; /* Merge borders of adjacent cells */
            width: 90%; /* Use percentage for responsive layout */
            margin: 0 auto; /* Center the table */
            margin-top: 20px; /* Space above the table */
        }
        th, td {
            border: 1px solid #ddd; /* Add border to cells */
            padding: 10px; /* Space inside cells */
            text-align: left; /* Align text to the left */
        }
        th {
            background-color: #f2f2f2; /* Light background for headers */
            font-weight: bold; /* Make header text bold */
        }
        tr:nth-child(even) {
            background-color: #f9f9f9; /* Alternate row colors for better readability */
        }
        .btn-primary-soft {
            padding: 5px 10px; /* Adjust button padding */
            margin: 5px; /* Add margin around buttons */
            border: none; /* Remove default border */
            border-radius: 5px; /* Rounded corners */
            background-color: #007bff; /* Primary color */
            color: white; /* White text */
            cursor: pointer; /* Change cursor on hover */
        }
        .btn-primary-soft:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
    </style>
</head>
<body>
    <?php
    session_start();
    
    if (isset($_SESSION["user"])) {
        if (empty($_SESSION["user"]) || $_SESSION['usertype'] != 'c') {
            header("location: ../login.php");
        } else {
            $useremail = $_SESSION["user"];
        }
    } else {
        header("location: ../login.php");
    }

    // Import database
    include("../connection.php");
    $userrow = $database->query("SELECT * FROM counselor WHERE couemail='$useremail'");
    $userfetch = $userrow->fetch_assoc();
    $userid = $userfetch["couid"];
    $username = $userfetch["couname"];
    
    // Fetch students based on user input or filter
    if ($_POST) {
        if (isset($_POST["search"])) {
            $keyword = $_POST["search12"];
            $sqlmain = "SELECT * FROM student WHERE pemail='$keyword' OR name LIKE '%$keyword%'";
        } elseif (isset($_POST["filter"])) {
            $showonly = $_POST["showonly"];
            if ($showonly == 'all') {
                $sqlmain = "SELECT * FROM student";
            } else {
                $sqlmain = "SELECT * FROM student ";
            }
        }
    } else {
        $sqlmain = "SELECT * FROM student";
    }
    ?>
    
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px">
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo substr($username, 0, 13); ?>..</p>
                                    <p class="profile-subtitle"><?php echo substr($useremail, 0, 22); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php"><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <div class="dash-body">
            <table border="0" width="100%" style="margin-top:25px;">
                <tr>
                    <td width="13%">
                        <a href="index.php"><button class="login-btn btn-primary-soft btn btn-icon-back" style="padding:11px;width:125px;">Back</button></a>
                    </td>
                    <td width="15%">
                        <p class="heading-sub12" style="text-align: right;"><?php echo date('Y-m-d'); ?></p>
                    </td>
                    <td width="10%">
                        <button class="btn-label"><img src="../img/calendar.svg" width="100%"></button>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <p class="heading-main12" style="margin-left:45px;">List of Students</p>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">
                        <center>
                        <form action="" method="post">
                            <select name="showonly" class="box" style="width:90%; height:37px;">
                                <option value="my">My Students</option>
                                <option value="all">All Students</option>
                            </select>
                            <input type="submit" name="filter" value="Filter" class="btn-primary-soft btn">
                        </form>
                        </center>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="3">
                        <center>
                        <table class="sub-table">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date of Birth</th>
                                    <th>Telephone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = $database->query($sqlmain);
                                if ($result->num_rows == 0) {
                                    echo "<tr><td colspan='6'>No students found!</td></tr>";
                                } else {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>{$row['pnic']}</td>";
                                        echo "<td>{$row['pname']}</td>";
                                        echo "<td>{$row['pemail']}</td>";
                                        echo "<td>{$row['pdob']}</td>";
                                        echo "<td>{$row['ptel']}</td>";
                                        echo "<td>
                                           <a href='personal-sheet.php?pid={$row['pid']}' class='btn btn-primary'>Go to Details</a>
                                        </td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        </center>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
