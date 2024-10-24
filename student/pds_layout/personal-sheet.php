<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script defer src="assets/js/bootstrap.min.js"></script>
    <script defer src="assets/js/script.js"></script>
    <title>Personal Data Sheet</title>
    
</head>


<style>
          h3{
              color: red;
          }
          h5{
            color: red;

          }
          .btn-submit{
            padding: 12px 50px;
          }
</style>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
            
            </div>
          </nav>
    </div>

    <div class="container">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">C1</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">C2</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">C3</button>
            <button class="nav-link" id="nav-contact2-tab" data-bs-toggle="tab" data-bs-target="#nav-contact2" type="button" role="tab" aria-controls="nav-contact2" aria-selected="false">C4</button>
          </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
          <!-- START WHOLE C1 -->
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              
            <div class="c1-container">

              <div class="c1-container-header border-bottom">
              
                <br>
                <button onclick="window.print()">Print this page</button>

                <center>    <h3>GENSANTOS FOUNDATION COLLEGE,INC. <br>
Bulaong Extension, General Santos City
</h3>
               <h1>Student Personal DATA SHEET</h1></center>
                <br>
                <i>This Student's Personal Data consists of questions regarding you and your family. The purpose of this is for us to know you better and to help you with problems/difficulties that you may encounter along the course of your stay in Holy Trinity College. Please answer the entire question honestly and accurately. Thank you.</i>
              </div>

              <br>

              <div class="c1-container-body">
                <form action="process_registration.php" method="post">
                <div class="holder-box-0">
                  <div class="form-group row">
                    <label for="CSID" class="col-sm-2 col-form-label">1. Student ID No.</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="student_id" id="student_id" placeholder="Student">
                    </div>
                  </div>

                  <br>

                  <h5><b> I. PERSONAL INFORMATION</b></h3>
                  <hr>
                  <br>

                  <div class="form-group row">
  <label for="Surname" class="col-sm-2 col-form-label">Firstname</label>
  <div class="col-sm-4">
    <input type="text" class="form-control" id="Firstname" name="Firstname" placeholder="Firstname">
  </div>
</div>

<div class="form-group row mt-3">
  <label for="Firstname" class="col-sm-2 col-form-label">Lastname</label>
  <div class="col-sm-4">
    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname">
  </div>
</div>


                </div>
                <hr>
                <div class="holder-box-1">
                  <div class="box-1">
                    
                  
                  <div class="form-group row">
  <label for="CivilStatus" class="col-sm-4 col-form-label">CIVIL STATUS</label>
  <div class="col-sm-8">
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="CivilStatus" id="Single" value="Single" checked>
      <label class="form-check-label" for="Single">Single</label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="CivilStatus" id="Married" value="Married">
      <label class="form-check-label" for="Married">Married</label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="CivilStatus" id="Widowed" value="Widowed">
      <label class="form-check-label" for="Widowed">Widowed</label>
    </div>

    <br>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="CivilStatus" id="Separated" value="Separated">
      <label class="form-check-label" for="Separated">Separated</label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="CivilStatus" id="Others" value="Others">
      <label class="form-check-label" for="Others">Other/s</label>
    </div>
  </div>
</div>

<br>
<div class="form-group row">
  <label for="DateOfBirth" class="col-sm-4 col-form-label">3. DATE OF BIRTH (mm/dd/yyyy)</label>
  <div class="col-sm-8">
    <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth" placeholder="Date of Birth">
  </div>
</div>

<div class="form-group row mt-3">
  <label for="Religion" class="col-sm-4 col-form-label">Religion</label>
  <div class="col-sm-8">
    <input type="text" class="form-control" id="Religion" name="Religion" placeholder="Religion">
  </div>
</div>

<div class="form-group row mt-3">
  <label for="Tribe" class="col-sm-4 col-form-label">Tribe</label>
  <div class="col-sm-8">
    <input type="text" class="form-control" id="Tribe" name="Tribe" placeholder="Tribe">
  </div>
</div>
br



<div class="form-group row">
  <label for="Ip" class="col-sm-4 col-form-label">If belonging to IP, please specify</label>
  <div class="col-sm-8">
    <input type="text" class="form-control" id="Ip" name="Ip" placeholder="Specify Indigenous Group (IP)">
  </div>
</div>

<div class="form-group row mt-3">
  <label for="Language" class="col-sm-4 col-form-label">Languages/Dialect Spoken</label>
  <div class="col-sm-8">
    <input type="text" class="form-control" id="Language" name="Language" placeholder="Language/Dialect">
  </div>
</div>

<div class="form-group row mt-3">
  <label for="BirthOrder" class="col-sm-4 col-form-label">Birth Order</label>
  <div class="col-sm-8">
    <input type="text" class="form-control" id="BirthOrder" name="BirthOrder" placeholder="e.g., 1st, 2nd, 3rd">
  </div>
</div>



                    <br>
                    <div class="form-group row">
  <label for="NumberOfSiblings" class="col-sm-4 col-form-label">Number of Siblings</label>
  <div class="col-sm-8">
    <input type="text" class="form-control" id="NumberOfSiblings" name="NumberOfSiblings" placeholder="Enter number of siblings">
  </div>
</div>


                
               
                  
                  </div>



                  <div class="box-1" style="margin-left: 1%;">
   
                  <div class="form-group row">
                      <label for="" class="col-sm-4 col-form-label">If Solo Parent, how many children do you have?</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="child_no" id="child_no" placeholder="No.">
                      </div>
                    </div>
                    <br>

            
                    
                    <div class="form-group row">
                      <label for="" class="col-sm-4 col-form-label">Place of Birth</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="PlaceOfBirth" id="PlaceOfBirth" placeholder="">
                      </div>
                    </div>

                    <br>

                


                    <hr>


                    
                    <div class="form-group row">
                      <label for="" class="col-sm-4 col-form-label">Permanent/Home/ <br>Provincial Address:</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="PermAddress" id="PermAddress" placeholder="">
                      </div>
                    </div>


                    <br>


                    <div class="form-group row">
                      <label for="" class="col-sm-4 col-form-label">Current/City Address</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="CurrentAddress" id="CurrentAddress" placeholder="">
                      </div>
                    </div>


                 

                  </div>
                </div>

                <br>




                <br>

      

              </div>


            </div>


          </div>
          <!-- END WHOLE C1 -->


          <!-- START WHOLE C2 -->
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
             <div class="c2-container">

               <div class="c2-container-header">

               </div>

               <div class="c2-container-body">

                <br>

                <center><h5><b>FOR STUDENTS NOT OFFICIALLY RESIDENT OF GENERAL SANTOS CITY</b></h3></center>
                <hr class="inputting-0">
                <br class="inputting-0">


              
                <div class="holder-box-1">
                  <div class="box-1">
                    
                  
                      <div class="form-group row">
                      <label for="" class="col-sm-4 col-form-label">Where did you stay here in General Santos City </label>
                      <div class="col-sm-8">
                        <input class="form-check-input" type="radio" name="CivilStatus" id="Single" value="Single" checked>
                        <label class="form-check-label" for="Single">
                        Boarding house
                        </label>

                        &nbsp;&nbsp;
                        <input class="form-check-input" type="radio" name="CivilStatus" id="Married" value="Married">
                        <label class="form-check-label" for="Married">
                        Dormitory      
                        </label>

                        &nbsp;&nbsp;
                        <input class="form-check-input" type="radio" name="CivilStatus" id="Widowed" value="Widowed">
                        <label class="form-check-label" for="Widowed">
                        Apartment      
                        </label>


                        <input class="form-check-input" type="radio" name="CivilStatus" id="Seperated" value="Seperated">
                        <label class="form-check-label" for="Seperated">
                        Relatives
                        </label>

                            <br>
                        <input class="form-check-input" type="radio" name="CivilStatus" id="Seperated" value="Seperated">
                        <label class="form-check-label" for="Seperated">
                        Employer    
                        </label>

                        
                        &nbsp;&nbsp;
                        <input class="form-check-input" type="radio" name="CivilStatus" id="Other/s" value="Other/s">
                        <label class="form-check-label" for="Other/s">
                          Other/s
                        </label>
                      </div>
                    </div>

                    <br>

               
                 

                
               
                  
                  </div>



                  <div class="box-1" style="margin-left: 1%;">
   
                  <div class="form-group row">
  <label for="landlord" class="col-sm-4 col-form-label">Name of Landlord/Landlady/ <br>Employer:</label>
  <div class="col-sm-8">
    <input type="text" class="form-control" name="landlord" id="landlord" placeholder="">
  </div>
</div>
<br>
<hr>

<div class="form-group row">
  <label for="LandlordNumber" class="col-sm-4 col-form-label">Contact Number:</label>
  <div class="col-sm-8">
    <input type="text" class="form-control" name="LandlordNumber" id="LandlordNumber" placeholder="">
  </div>
</div>



                  

                    </div>
                  </div>


                <br>

                <br>
                     <center><h5><b>FAMILY HISTORY</b></h3></center>

                <hr>
           
                <div class="holder-box-1">
                  <div class="box-1">
                      <h2>Father</h2>
                      <div class="form-group row">
    <label for="father_Firstname" class="col-sm-4 col-form-label">Firstname</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="father_Firstname" id="father_Firstname" placeholder="">
    </div>
  </div>
  <br>


  <div class="form-group row">
    <label for="father_Lastname" class="col-sm-4 col-form-label">Lastname</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="father_Lastname" id="father_Lastname" placeholder="">
    </div>
  </div>
  <br>
               
  <div class="form-group row">
    <label for="father_Address" class="col-sm-4 col-form-label">Current Address</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="father_Address" id="father_Address" placeholder="">
    </div>
  </div>
  <br>
                  
  <div class="form-group row">
    <label for="father_Religion" class="col-sm-4 col-form-label">Religion</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="father_Religion" id="father_Religion" placeholder="">
    </div>
  </div>
  <br>
              
                          
  <div class="form-group row">
    <label for="father_Tribe" class="col-sm-4 col-form-label">Tribe</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="father_Tribe" id="father_Tribe" placeholder="">
    </div>
  </div>
  <br>

               
  <div class="form-group row">
    <label for="father_Contact" class="col-sm-4 col-form-label">Landline/Cellphone No.</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="father_Contact" id="father_Contact" placeholder="">
    </div>
  </div>
  <br>


                             
  <div class="form-group row">
    <label for="father_Email" class="col-sm-4 col-form-label">Email Address</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" name="father_Email" id="father_Email" placeholder="">
    </div>
  </div>
  <br>


  <div class="form-group row">
    <label for="father_Education" class="col-sm-4 col-form-label">Highest Educational Attainment</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="father_Education" id="father_Education" placeholder="">
    </div>
  </div>
  <br>
              
  <div class="form-group row">
    <label for="father_Language" class="col-sm-4 col-form-label">Language/s Spoken</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="father_Language" id="father_Language" placeholder="">
    </div>
  </div>
  <br>


             
              
                    <div class="form-group row">
    <label for="father_Occupation" class="col-sm-4 col-form-label">Occupation</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="father_Occupation" id="father_Occupation" placeholder="">
    </div>
  </div>
  <br>
             
              
  <div class="form-group row">
    <label for="father_BusinessAddress" class="col-sm-4 col-form-label">Business/Office Address</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="father_BusinessAddress" id="father_BusinessAddress" placeholder="">
    </div>
  </div>
  <br>
              
           
  <div class="form-group row">
    <label for="father_Position" class="col-sm-4 col-form-label">Position Held</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="father_Position" id="father_Position" placeholder="">
    </div>
  </div>
  <br>

             
              
                  
                  
                  </div>

              

                  <div class="box-1" style="margin-left: 1%;">
                  <h2>Mother</h2>
                 
               
  <div class="form-group row">
    <label for="mother_Firstname" class="col-sm-4 col-form-label">Firstname</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="mother_Firstname" id="mother_Firstname" placeholder="">
    </div>
  </div>
  <br>


  <div class="form-group row">
    <label for="mother_Lastname" class="col-sm-4 col-form-label">Lastname</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="mother_Lastname" id="mother_Lastname" placeholder="">
    </div>
  </div>
  <br>
               
  <div class="form-group row">
    <label for="current_address" class="col-sm-4 col-form-label">Current Address</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="mother_current_address" id="current_address" placeholder="">
    </div>
</div>
<br>

<div class="form-group row">
    <label for="religion" class="col-sm-4 col-form-label">Religion</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="mother_religion" id="religion" placeholder="">
    </div>
</div>
<br>

<div class="form-group row">
    <label for="tribe" class="col-sm-4 col-form-label">Tribe</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="mother_tribe" id="tribe" placeholder="">
    </div>
</div>
<br>

<div class="form-group row">
    <label for="contact_number" class="col-sm-4 col-form-label">Landline/Cellphone No.</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="mother_contact_number" id="contact_number" placeholder="">
    </div>
</div>
<br>

<div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label">Email Address</label>
    <div class="col-sm-8">
        <input type="email" class="form-control" name="mother_email" id="email" placeholder="">
    </div>
</div>
<br>

<div class="form-group row">
    <label for="education" class="col-sm-4 col-form-label">Highest Educational Attainment</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="mother_education" id="education" placeholder="">
    </div>
</div>
<br>

<div class="form-group row">
    <label for="languages" class="col-sm-4 col-form-label">Language/s Spoken</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="mother_languages" id="languages" placeholder="">
    </div>
</div>
<br>

<div class="form-group row">
    <label for="occupation" class="col-sm-4 col-form-label">Occupation</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="mother_occupation" id="occupation" placeholder="">
    </div>
</div>
<br>

<div class="form-group row">
    <label for="business_address" class="col-sm-4 col-form-label">Business/Office Address</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="mother_business_address" id="business_address" placeholder="">
    </div>
</div>
<br>

<div class="form-group row">
    <label for="position_held" class="col-sm-4 col-form-label">Position Held</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="mother_position_held" id="position_held" placeholder="">
    </div>
</div>
<br>
                 
                </div>
                </div>


                <hr>
                <h5>Parents’ Marital Status</h5>
                <div class="holder-box-1">


          
   
                  <div class="box-1" style="margin-left: 1%;">
                  
                  

                    </div>
                  </div>



                  <br>
                  <label for="" class="col-sm-4 col-form-label">What is the combined monthly income of your family? Please check appropriate box.</label>
                  <div class="form-group row">
                   
              
                  <div class="col-sm-8">
    <input class="form-check-input" type="radio" name="income_bracket" id="below_10000" value="Below 10000" checked>
    <label class="form-check-label" for="below_10000">
        Below Php 10,000.00
    </label>

    &nbsp;&nbsp;
    <input class="form-check-input" type="radio" name="income_bracket" id="10000_20000" value="10000-20000">
    <label class="form-check-label" for="10000_20000">
        Php 10,000 – 20,000
    </label>

    &nbsp;&nbsp;
    <input class="form-check-input" type="radio" name="income_bracket" id="20001_30000" value="20001-30000">
    <label class="form-check-label" for="20001_30000">
        Php 20,001 – 30,000
    </label>

    &nbsp;&nbsp;
    <input class="form-check-input" type="radio" name="income_bracket" id="30001_40000" value="30001-40000">
    <label class="form-check-label" for="30001_40000">
        Php 30,001 – 40,000
    </label>

    &nbsp;&nbsp;
    <input class="form-check-input" type="radio" name="income_bracket" id="40001_50000" value="40001-50000">
    <label class="form-check-label" for="40001_50000">
        Php 40,001 – 50,000
    </label>

    &nbsp;&nbsp;
    <input class="form-check-input" type="radio" name="income_bracket" id="50001_60000" value="50001-60000">
    <label class="form-check-label" for="50001_60000">
        Php 50,001 – 60,000
    </label>

    &nbsp;&nbsp;
    <input class="form-check-input" type="radio" name="income_bracket" id="60001_70000" value="60001-70000">
    <label class="form-check-label" for="60001_70000">
        Php 60,001 – 70,000
    </label>

    &nbsp;&nbsp;
    <input class="form-check-input" type="radio" name="income_bracket" id="70001_80000" value="70001-80000">
    <label class="form-check-label" for="70001_80000">
        Php 70,001 – 80,000
    </label>

    &nbsp;&nbsp;
    <input class="form-check-input" type="radio" name="income_bracket" id="above_80000" value="Above 80000">
    <label class="form-check-label" for="above_80000">
        Php 80,001 – Above
    </label>




                      </div>
                    </div>



                    <br>

                    <label class="col-sm-4 col-form-label">Transportation your family owns:</label>
<div class="form-group row">
    <div class="col-sm-8">
        <input class="form-check-input" type="radio" name="family_vehicle_type" id="family_car_suv" value="Car/SUV" checked>
        <label class="form-check-label" for="family_car_suv">
            Car/SUV
        </label>

        <br>
        <input class="form-check-input" type="radio" name="family_vehicle_type" id="family_jeep" value="Jeep">
        <label class="form-check-label" for="family_jeep">
            Jeep
        </label>

        <br>
        <input class="form-check-input" type="radio" name="family_vehicle_type" id="family_tricycle" value="Tricycle">
        <label class="form-check-label" for="family_tricycle">
            Tricycle
        </label>

        <br>
        <input class="form-check-input" type="radio" name="family_vehicle_type" id="family_motorcycle" value="Motorcycle">
        <label class="form-check-label" for="family_motorcycle">
            Motorcycle 
        </label>
    </div>
</div>
<br>

<label class="col-sm-4 col-form-label">Means of transportation going to school:</label>
<div class="form-group row">
    <div class="col-sm-8">
        <input class="form-check-input" type="radio" name="school_vehicle_type" id="school_car_suv" value="Car/SUV" checked>
        <label class="form-check-label" for="school_car_suv">
            Car/SUV
        </label>

        <br>
        <input class="form-check-input" type="radio" name="school_vehicle_type" id="school_jeep" value="Jeep">
        <label class="form-check-label" for="school_jeep">
            Jeep
        </label>

        <br>
        <input class="form-check-input" type="radio" name="school_vehicle_type" id="school_tricycle" value="Tricycle">
        <label class="form-check-label" for="school_tricycle">
            Tricycle
        </label>

        <br>
        <input class="form-check-input" type="radio" name="school_vehicle_type" id="school_motorcycle" value="Motorcycle">
        <label class="form-check-label" for="school_motorcycle">
            Motorcycle 
        </label>
    </div>
</div>


                              
                              
                      <br>

                <div class="form-group row">
               

                  <br>
                  <br>
                  <hr style="margin: 0;">
                  <label for="" class="col-sm-12 col-form-label" style="font-size: 0.5em; color: red; font-style: italic;"><center>(Continue on separate sheet if necessary)</center></label>
        
                </div>

                <br>

               </div>
             </div>
          </div>
          <!-- END WHOLE C2 -->


          
          <!-- START WHOLE C3 -->
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              <div class="c3-container">
                <div class="c3-container-header"></div>
                <div class="c3-container-body">

                  <br>

                  <h5><b>HOBBIES, INTEREST AND VOCATIONAL RECORD</b></h3>

                  <hr class="inputting-0">
                  <label for="" class="col-sm-4 col-form-label">What school activities are you interested in? ( please check )</label>
                    <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Select Activities:</label>
<div class="col-sm-8 d-flex flex-wrap">
    <div class="form-check me-3">
        <input class="form-check-input" type="radio" name="activity" id="athletics" value="Athletics" checked>
        <label class="form-check-label" for="athletics">Athletics</label>
    </div>

    <div class="form-check me-3">
        <input class="form-check-input" type="radio" name="activity" id="clubs" value="Clubs">
        <label class="form-check-label" for="clubs">Clubs</label>
    </div>

    <div class="form-check me-3">
        <input class="form-check-input" type="radio" name="activity" id="journalism" value="Journalism">
        <label class="form-check-label" for="journalism">Journalism</label>
    </div>

    <div class="form-check me-3">
        <input class="form-check-input" type="radio" name="activity" id="dramatics" value="Dramatics">
        <label class="form-check-label" for="dramatics">Dramatics</label>
    </div>

    <div class="form-check me-3">
        <input class="form-check-input" type="radio" name="activity" id="debate" value="Debate">
        <label class="form-check-label" for="debate">Debate</label>
    </div>

    <div class="form-check me-3">
        <input class="form-check-input" type="radio" name="activity" id="social_science" value="Social Science">
        <label class="form-check-label" for="social_science">Social Science</label>
    </div>

    <div class="form-check me-3">
        <input class="form-check-input" type="radio" name="activity" id="scouting" value="Scouting">
        <label class="form-check-label" for="scouting">Scouting</label>
    </div>

    <div class="form-check me-3">
        <input class="form-check-input" type="radio" name="activity" id="socio_cultural" value="Socio-Cultural">
        <label class="form-check-label" for="socio_cultural">Socio-Cultural</label>
    </div>

    <div class="form-check me-3">
        <input class="form-check-input" type="radio" name="activity" id="dance_cheerleading" value="Dance/Cheerleading">
        <label class="form-check-label" for="dance_cheerleading">Dance/Cheerleading</label>
    </div>

    <div class="form-check me-3">
        <input class="form-check-input" type="radio" name="activity" id="school_band" value="School Band">
        <label class="form-check-label" for="school_band">School Band</label>
    </div>

    <div class="form-check me-3">
        <input class="form-check-input" type="radio" name="activity" id="literary_musical" value="Literary/Musical">
        <label class="form-check-label" for="literary_musical">Literary/Musical</label>
    </div>

    <div class="form-check me-3">
        <input class="form-check-input" type="radio" name="activity" id="student_council" value="Student Council">
        <label class="form-check-label" for="student_council">Student Council</label>
    </div>

    <div class="form-check me-3">
        <input class="form-check-input" type="radio" name="activity" id="painting" value="Painting">
        <label class="form-check-label" for="painting">Painting</label>
    </div>
</div>

                    </div>


       
                  <br class="inputting-0">


                  <br>

          
                </div>
              </div>
          </div>
          <!-- END WHOLE C3 -->


          <!-- START WHOLE C4 -->
          <div class="tab-pane fade" id="nav-contact2" role="tabpanel" aria-labelledby="nav-contact2-tab">


             <div class="c4-container">
               <div class="c4-container-header"></div>
               <div class="c4-container-body">
                <br>



                
                <h5><b>EMERGENCY CONTACT INFORMATION</b></h3>
                  <hr>
                  <br>

                  <div class="container">
        <div class="form-group row">
            <label for="relationship" class="col-sm-2 col-form-label">Relationship</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Relationship" required>
            </div>

            <label for="contactNumbers" class="col-sm-2 col-form-label">Contact Numbers:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="contactNumbers" name="contactNumbers" placeholder="Contact Numbers" required>
            </div>
        </div>

        <br>

        <div class="form-group row">
            <label for="completeAddress" class="col-sm-2 col-form-label">Complete Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="completeAddress" name="completeAddress" placeholder="Complete Address" required>
            </div>
        </div>
        
        <br>
        <input type="submit" id="submit" name="btnSubmit" class="btn btn-primary" value="Submit">

</div>


             </div>
          </div>
          </div>
          <!-- END WHOLE C4 -->

        </div>
        </form>       
        <br>
    </div>

</body>
</html>