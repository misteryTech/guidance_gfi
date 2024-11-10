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
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
    
    
</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    

    //import database
    include("../connection.php");

    
    ?>
    <div class="container">
    <?php
                        include("menu.php");
    ?>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                            <td colspan="2" class="nav-bar" >
                                
                                <form action="doctors.php" method="post" class="header-search">
        
                                    <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Counselor name or Email" list="doctors">&nbsp;&nbsp;
                                    
                                    <?php
                                        echo '<datalist id="doctors">';
                                        $list11 = $database->query("select  docname,docemail from  doctor;");
        
                                        for ($y=0;$y<$list11->num_rows;$y++){
                                            $row00=$list11->fetch_assoc();
                                            $d=$row00["docname"];
                                            $c=$row00["docemail"];
                                            echo "<option value='$d'><br/>";
                                            echo "<option value='$c'><br/>";
                                        };
        
                                    echo ' </datalist>';
                                    ?>
                                    
                               
                                    <input type="Submit" value="Search" class="login-btn btn-primary-soft btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                                
                                </form>
                                
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


                                $patientrow = $database->query("select  * from  student;");
                                $counselorrow = $database->query("select  * from  counselor;");
                                $appointmentrow = $database->query("select  * from  appointments where appointment_date>='$today';");
                                $appointmentcount = $database->query("select  * from  appointments ;");
                                $schedulerow = $database->query("select  * from  schedule where scheduledate='$today';");


                                ?>
                                </p>
                            </td>
                            <td width="10%">
                                <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                            </td>
        
        
                        </tr>
                <tr>
                    <td colspan="4">
                        
                        <center>
                        <table class="filter-container" style="border: none;" border="0">
                            <tr>
                                <td colspan="4">
                                    <p style="font-size: 20px;font-weight:600;padding-left: 12px;">Status</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $counselorrow->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                Counselor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/counselor1.png'); height: 10px; width: 10px; background-size:30px;"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $patientrow->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    Student &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/student.png'); height: 10px; width: 10px; background-size:30px;"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex; ">
                                        <div>
                                                <div class="h1-dashboard" >
                                                    <?php    echo $appointmentcount ->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard" >
                                                Appointment &nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/session.png'); height: 10px; width: 10px; background-size:30px;"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;padding-top:26px;padding-bottom:26px;">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $schedulerow ->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard" style="font-size: 15px">
                                                    Today Sessions
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/calendar.png'); height: 10px; width: 10px; background-size:30px;"></div>
                                    </div>
                                </td>
                                
                            </tr>
                        </table>
                    </center>
                    </td>
                </tr>






                <tr>
                    <td colspan="4">
                        <table width="100%" border="0" class="dashbord-tables">
                            <tr>
                                <td>
                                    <p style="padding:10px;padding-left:48px;padding-bottom:0;font-size:23px;font-weight:700;color:var(--primarycolor);">
                                       List of Report Incident
                                    </p>
                                    <p style="padding-bottom:19px;padding-left:50px;font-size:15px;font-weight:500;color:#212529e3;line-height: 20px;">
                                        Here's Quick access to list of Report Incident.
                                    </p>

                                </td>
                                <td>
                                    <p style="text-align:right;padding:10px;padding-right:48px;padding-bottom:0;font-size:23px;font-weight:700;color:var(--primarycolor);">
                                    List of Appointments
                                    </p>
                                    <p style="padding-bottom:19px;text-align:right;padding-right:50px;font-size:15px;font-weight:500;color:#212529e3;line-height: 20px;">
                                        Here's Quick access to Upcoming Sessions.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                
                                <center>
                                        <div class="abc scroll" style="height: 250px;">
                                            <table width="85%" class="sub-table scrolldown" border="0">
                                                <thead>
                                                    <tr>
                                                        <th class="table-headin">
                                                 Description
                                                        </th>
                                                        <th class="table-headin">
                                                Location
                                                        </th>
                                                        <th class="table-headin">
                                                        Incident Date
                                                        </th>

                                                        <th class="table-headin">
                                                         Report By
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $nextweek = date("Y-m-d", strtotime("+1 week"));
                                                    $sqlmain= "select * from incident_reports ";
                                                    $result= $database->query($sqlmain);

                                                    if($result->num_rows==0){
                                                        echo '
                                                        <tr>
                                                            <td colspan="3">
                                                                <br><br><br><br>
                                                                <center>
                                                                    <img src="../img/notfound.svg" width="25%">
                                                                    <br>
                                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We couldnt find anything related to your sessions.</p>
                                                                    <a class="non-style-link" href="incident_report.php"><button class="btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">Show all Incident</button>
                                                                    </a>
                                                                </center>
                                                                <br><br><br><br>
                                                            </td>
                                                        </tr>';
                                                    } else {
                                                        for ( $x=0; $x<$result->num_rows;$x++){
                                                            $row=$result->fetch_assoc();
                                                            $id=$row["id"];
                                                            $description=$row["description"];
                                                            $location=$row["location"];
                                                            $incident_date=$row["incident_date"];
                                                            $report_by=$row["reported_by"];
                                          
                                                            echo '<tr>
                                                                <td style="padding:20px;"> &nbsp;'.
                                                                substr($description,0,20)
                                                                .'</td>
                                                                <td style="padding:20px;font-size:13px;">
                                                                    '.substr($location,0,30).'
                                                                </td>
                                                                <td style="text-align:center;">
                                                                    '.substr($incident_date,0,10).'
                                                                </td>
                                                                      <td style="text-align:center;">
                                                                    '.substr($report_by,0,10).'
                                                                </td>

                                                            </tr>';
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </center>
                                </td>
                            <td>
                                 
                                    <center>
                                        <div class="abc scroll" style="height: 250px;">
                                            <table width="85%" class="sub-table scrolldown" border="0">
                                                <thead>
                                                    <tr>
                                                        <th class="table-headin">
                                                        Student ID
                                                        </th>
                                                        <th class="table-headin">
                                                         Reason
                                                        </th>

                                                        <th class="table-headin">
                                                         Treatment
                                                        </th>

                                                        <th class="table-headin">
                                                         Councselor
                                                        </th>

                                                        
    


                                                        <th class="table-headin">
                                                            Date & Time
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $nextweek = date("Y-m-d", strtotime("+1 week"));
                                                    $sqlmain = "SELECT a.*,s.*,c.*
                                                    FROM appointments a
                                                    INNER JOIN student s ON a.student_id = s.pid
                                                    INNER JOIN counselor c on a.counselor_id = c.couid";
                                        
                                                    $result= $database->query($sqlmain);

                                                    if($result->num_rows==0){
                                                        echo '
                                                        <tr>
                                                            <td colspan="3">
                                                                <br><br><br><br>
                                                                <center>
                                                                    <img src="../img/notfound.svg" width="25%">
                                                                    <br>
                                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We couldnt find anything related to your sessions.</p>
                                                                    <a class="non-style-link" href="schedule.php"><button class="btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">Show all Sessions</button>
                                                                    </a>
                                                                </center>
                                                                <br><br><br><br>
                                                            </td>
                                                        </tr>';
                                                    } else {
                                                        for ( $x=0; $x<$result->num_rows;$x++){
                                                            $row=$result->fetch_assoc();
                                                            $student_id=$row["pnic"];
                                                            $reason=$row["reason"];
                                                            $apponum=$row["appointment_date"];
                                                            $treatment=$row["treatment"];
                                                            $counselor_id=$row["counselor_id"];
                                                            $couname=$row["couname"];
                                          
                                                            echo '<tr>
                                                                <td style="padding:20px;"> &nbsp;'.
                                                                substr($student_id,0,20)
                                                                .'</td>
                                                                <td style="padding:20px;font-size:13px;">
                                                                    '.substr($reason,0,30).'
                                                                </td>
                                                                  <td style="padding:20px;font-size:13px;">
                                                                    '.substr($treatment,0,30).'
                                                                </td>
                                                                
                                                                <td style="text-align:center;">
                                                                    '.substr($couname,0,10).'
                                                                </td>

                                                                <td style="text-align:center;">
                                                                    '.substr($apponum,0,10).'
                                                                </td>

                                                                
                                                            </tr>';
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                        <a href="list-incident-report.php" class="non-style-link"><button class="btn-primary btn" style="width:85%">Show all Incident</button></a>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <a href="appointments.php" class="non-style-link"><button class="btn-primary btn" style="width:85%">Show all Appointment</button></a>
                                    </center>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
                        </table>
                        </center>
                        </td>
                </tr>
            </table>
        </div>
    </div>


</body>
</html>