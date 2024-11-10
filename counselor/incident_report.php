<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        


    <title>Settings</title>
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-X  0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }

        .dashbord-tables {
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container {
            animation: transitionIn-X 0.5s;
        }
       

        .sub-table {
            animation: transitionIn-Y-bottom 0.5s;
            width: 80%;
            margin: 20px auto;
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-row {
            display: flex;
            margin-bottom: 15px;
            align-items: center;
        }
        .form-label {
            width: 150px;
            font-weight: bold;
            text-align: right;
            margin-right: 10px;
            color: #333;
        }
        .form-field {
            flex: 1;
        }
        .form-field input[type="text"],
        .form-field input[type="date"],
        .form-field textarea {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .form-field input[type="file"] {
            padding: 5px;
        }
        .form-submit {
            text-align: center;
            margin-top: 20px;
        }
        .form-submit input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-submit input[type="submit"]:hover {
            background-color: #45a049;
        }

        
    </style>

    
    
</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='c'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    //import database
    include("../connection.php");
    $userrow = $database->query("select * from counselor where couemail='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["couid"];
    $username=$userfetch["couname"];


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
                    <td class="menu-btn menu-icon-dashbord" >
                        <a href="index.php" class="non-style-link-menu "><div><p class="menu-text">Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">My Appointments</p></a></div>
                    </td>
                </tr>
                
              
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-patient">
                        <a href="student.php" class="non-style-link-menu"><div><p class="menu-text">My Students</p></div></a>
                    </td>
                </tr>
                

                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient">
                        <a href="incident_report.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Incident Report</p></a></div>
                    </td>
                </tr>


                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings  menu-active menu-icon-settings-active">
                        <a href="settings.php" class="non-style-link-menu"  ><div><p class="menu-text">Settings</p></a></div>
                    </td>
                </tr>
                
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
        <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >

    
        <tr >
                       
                        <td>
                            <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Incident Report</p>
                                               
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
    
    

                                    $appointmentrow = $database->query("select  * from  appointments where appointment_date>='$today';");
                                    $schedulerow = $database->query("select  * from  schedule where scheduledate='$today';");
    
    
                                    ?>
                                    </p>
                                </td>
                                <td width="10%">
                                    <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                                </td>
            
            
                            </tr>


        </table>

        <div class="dash-body" style="margin-top: 15px">
          
            
            <form action="process_incident_report.php" method="post" enctype="multipart/form-data">
                <div class="sub-table">
                    <div class="form-row">
                        <label class="form-label">Incident Date:</label>
                        <div class="form-field">
                            <input type="date" name="incident_date" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="form-label">Location:</label>
                        <div class="form-field">
                            <input type="text" name="location" placeholder="Enter incident location" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="form-label">Reported By:</label>
                        <div class="form-field">
                            <input type="text" name="reported_by" placeholder="Enter reporter's name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="form-label">Description:</label>
                        <div class="form-field">
                            <textarea name="description" rows="4" placeholder="Describe the incident in detail" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="form-label">Witnesses:</label>
                        <div class="form-field">
                            <input type="text" name="witnesses" placeholder="Enter witnesses' names">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="form-label">Action Taken:</label>
                        <div class="form-field">
                            <textarea name="action_taken" rows="3" placeholder="Describe any actions taken"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="form-label">Attachments:</label>
                        <div class="form-field">
                            <input type="file" name="attachments[]" multiple>
                        </div>
                    </div>
                    <div class="form-submit">
                        <input type="submit" value="Submit Report">
                    </div>
                </div>
            </form>
        </div>

        </div>
    </div>

</body>
</html>