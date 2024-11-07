<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Dashboard</title>
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table,.anime{
            animation: transitionIn-Y-bottom 0.5s;
        }

         /* General container styling */
         .form-container {
            max-width: 600px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Heading styles */
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Input fields, select boxes, and text areas */
        input[type="text"], input[type="date"], input[type="time"], select, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            transition: all 0.3s ease-in-out;
        }

        /* Hover effect with gradient */
        input[type="text"]:hover, input[type="date"]:hover, input[type="time"]:hover, select:hover, textarea:hover {
            border-color: transparent;
            background-image: linear-gradient(to right, #ff4b2b, #ff416c);
            color: #fff;
        }

        /* Button styling */
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        /* Hover effect for button */
        button:hover {
            background-image: linear-gradient(to right, #ff4b2b, #ff416c);
            border-color: transparent;
        }

        /* Align fields in two columns */
        .form-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-row label {
            flex-basis: 100%;
        }

        .form-row input, .form-row select, .form-row textarea {
            flex-basis: 100%;
        }

        .form-row {
            margin-bottom: 15px;
        }

        @media(min-width: 768px) {
            .form-row label {
                flex-basis: 30%;
            }

            .form-row input, .form-row select, .form-row textarea {
                flex-basis: 65%;
            }
        }


    </style>
    
    
</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();
   
    
    if (isset($_SESSION["user"])) {
        if ($_SESSION['usertype'] !== 'p') {
            header("Location: ../login.php");
            exit(); // Ensure no further code is executed after redirection
        } else {
      
            $useremail = $_SESSION["user"];
        }
    } else {
        header("Location: ../login.php");
        exit(); // Ensure no further code is executed after redirection
    }
    
    

    //import database
    include("../connection.php");

    $sqlmain= "select * from student where pemail=?";
    $stmt = $database->prepare($sqlmain);
    $stmt->bind_param("s",$useremail);
    $stmt->execute();
    $userrow = $stmt->get_result();
    $userfetch=$userrow->fetch_assoc();

    $userid= $userfetch["pid"];
    $username=$userfetch["pname"];


    //echo $userid;
    //echo $username;
    
    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo substr($username,0,13)  ?>..</p>
                                    <p class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-home menu-active menu-icon-home-active" >
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Home</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor">
                        <a href="counselor.php" class="non-style-link-menu"><div><p class="menu-text">All Counselor</p></a></div>
                    </td>
                </tr>
                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session">
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">Scheduled Sessions</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">My Appointment</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-pds">
                        <a href="pds_layout/personal-sheet.php" class="non-style-link-menu"><div><p class="menu-text">My PDS</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings">
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">Settings</p></a></div>
                    </td>
                </tr>
                
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                            <td colspan="1" class="nav-bar" >
                            <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Home</p>
                          
                            </td>
                            <td width="25%">

                            </td>
                            <td width="15%">
                                <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                                    Today's Date
                                </p>
                                <p class="heading-sub12" style="padding: 0;margin: 0;">
                                    <?php 
                                date_default_timezone_set('Asia/Kolkata');
        
                                $today = date('Y-m-d');
                                echo $today;


                                $studentRow = $database->query("select  * from  student;");
                                $counselorRow = $database->query("select  * from  counselor;");
                      

                                ?>
                                </p>
                            </td>
                            <td width="10%">
                                <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                            </td>
        
        
                        </tr>
                <tr>
                    <td colspan="4" >
                        
                    <center>
                    <table class="filter-container doctor-header patient-header" style="border: none;width:95%" border="0" >
                    <tr>
                        <td >
                            <h3>Welcome!</h3>
                            <h1><?php echo $username  ?>.</h1>
                           
                            
         
                            
                            <br>
                            <br>
                            
                        </td>
                    </tr>
                    </table>
                    </center>
                    
                </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <table border="0" width="100%"">
                            <tr>
                                <td width="50%">

                                    

                                <center>
    <form action="process_appointment.php" method="post" style="max-width: 600px; margin: auto; border: 1px solid #ccc; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center;">Appointment Booking Form</h2>
        <table style="width: 100%; border: none;">


        <input type="hidden" name="student_id" value="<?php echo $userid; ?>">
            <!-- Select Counselor -->
            <tr>
                <td style="padding: 10px; vertical-align: top;">
                    <label for="counselor">Select Counselor:</label>
                </td>
                <td style="padding: 10px;">
                    <select name="counselor" id="counselor" required style="width: 100%; padding: 8px;">
                        <option value="">--Select Counselor--</option>
                        <!-- Populate counselor options from the database -->
                        <?php while ($row = $counselorRow->fetch_assoc()) { ?>
                            <option value="<?php echo $row['couid']; ?>"><?php echo $row['couname']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <!-- Appointment Date -->
            <tr>
                <td style="padding: 10px; vertical-align: top;">
                    <label for="appointment_date">Appointment Date:</label>
                </td>
                <td style="padding: 10px;">
                    <input type="date" name="appointment_date" id="appointment_date" required style="width: 100%; padding: 8px;">
                </td>
            </tr>

            <!-- Session Time -->
            <tr>
                <td style="padding: 10px; vertical-align: top;">
                    <label for="session_time">Session Time:</label>
                </td>
                <td style="padding: 10px;">
                    <input type="time" name="session_time" id="session_time" required style="width: 100%; padding: 8px;">
                </td>
            </tr>

            <!-- Reason for Appointment -->
            <tr>
                <td style="padding: 10px; vertical-align: top;">
                    <label for="reason">Reason for Appointment:</label>
                </td>
                <td style="padding: 10px;">
                    <textarea name="reason" id="reason" required style="width: 100%; padding: 8px;" rows="4" placeholder="Describe the reason for your appointment"></textarea>
                </td>
            </tr>

          

            <!-- Submit Button -->
            <tr>
                <td colspan="2" style="text-align: center; padding: 20px;">
                    <button type="submit" style="padding: 10px 20px; font-size: 16px; background-color: #28a745; color: white; border: none; border-radius: 5px;">Book Appointment</button>
                </td>
            </tr>
        </table>
    </form>
</center>



                                </td>
                                <td>

                                

                                </td>
                            </tr>
                        </table>
                    </td>
                <tr>
            </table>
        </div>
    </div>


</body>
</html>