<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<?php require_once ("connection/session-check.php") ?>
<?php
 $student_id= $_GET['student_id'];
 $department_id= $_GET['department_id'];
 $department_name= $_GET['department_name'];
 
 $level= $_GET['level'];
?>

<html>
    <head>
    <title>Administrative Portal |  GAPOSA - ScreenClass</title>
    <?php include 'reference.php' ?> 
    </head>
    <body>
        <?php include 'header.php' ?>
        <div class="dashboard-main-div">
            <?php include 'admin-reference.php' ?>


            <div class="right-sided-div">
                <div class="bg-image-div staff-list-bg">
                    <div class="bg-cover">
                        <div class="dashboard-overall">

                            <div class="dashboard-admin-text staff-dashboard">
                                <span class="dashboard">
                                    <i class="fa fa-user-circle"></i>
                                    Student Profile
                                </span>
                                    <br/>
                                <span class="admin-portal">
                                    Administrative Portal 
                                </span>
                            </div>

                            <div class="current-time button-div">
                              
                            </div>

                            
                        </div>
                    </div>
                </div>


  
               
            <div class="staff-list-overall-div student-reg-overall-div">
          
                <form action="connection/code.php?action=registerstudent" method="POST" enctype="multipart/form-data">
                 
                
                <label>
                        <div class="profile-pix-div" >
                                <div class="profile-img-div" alt="Upload Picture">  
                                <input type="file" id="passport" style="display:none"  name="passport" accept=".jpg,.png" onchange="Test.UpdatePreview(this);"/>
                                <img src="images/up.png" id="MyPassport" />
                                </div>
                                                        
                         </div>
                        </label>
                
                
                
                
                
                
                <fieldset>
                        <legend>Personal Information</legend>
                        <div class="individual-input">
                            <label for="">First Name:</label><br/>
                            <input type="text" placeholder="First Name" name="Firstname" id="firstname" required>
                        </div>
                        <div class="individual-input">
                            <label for="">Middle Name:</label><br/>
                            <input type="text" placeholder="Middle Name" name="Middlename" id="middlename" >
                        </div>
                        <div class="individual-input">
                            <label for="">Last Name:</label><br/>
                            <input type="text" placeholder="Last Name" name="Lastname" id="lastname" required>
                        </div>
                        <div class="individual-input">
                            <label for="">Date of Birth:</label><br/>
                            <input type="date" placeholder="Date of Birth" name="Dob" id="Dob" required>
                        </div>
                        <div class="individual-input">
                            <label for="">Gender:</label><br/>
                            <select name="Gender" id="gender" required>
                            <option selected>SELECT GENDER</option>
                               
                                <option value='MALE'>MALE</option> 
                             
                                <option value='FEMALE'>FEMALE</option> 
                              
                            </select>
                        </div>
                        <div class="individual-input">
                            <label for="">Email Address:</label><br/>
                            <input type="email" placeholder="Email Address" name="Email" id="email" required>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Residential Information</legend>
                        <div class="individual-input">
                            <label for="">Country:</label><br/>
                            <select name="Country" id="Country" required>
                            <option value='NIGERIA' selected>NIGERIA</option> 
                               
                            </select>
                        </div>

                        <div class="individual-input">
                            <label for="">State:</label><br/>
                            <input type="text" placeholder="State" name="State" id="state" required>
                        </div>
                        <div class="individual-input">
                            <label for="">LGA:</label><br/>
                            <input type="text" placeholder="LGA" name="Lga" id="lga" required>
                        </div>
                        <div class="individual-input residential-address">
                            <label for="">Residential Address:</label><br/>
                            <input type="text" class="residential-input" placeholder="Residential Address"  name="Residentialaddress" required>
                        </div>
                       
                       
                    </fieldset>


                    <fieldset>
                        <legend>Professional Information</legend>
                    
                            <?php
                            $getdeptid_query=mysqli_query($conn, "SELECT * FROM `department_tab` WHERE department_id='$department_id'");
                            $getdeptid=mysqli_fetch_array($getdeptid_query);
                            $dept_name= $getdeptid['department_name'];
                            ?>
                        
                        <div class="individual-input " style="float:left;">
                            <label for="">Department:</label><br/>
                            <input type="text" class="residential-input"   name="Departmentname" value="<?php echo strtoupper($dept_name) ?> <?php echo $department_name?>" required="" readonly="">
                        </div>
                       
                       

                        <div class="individual-input " style="float:left;">
                            <label for="">DIPLOMA:</label><br/>
                            <input type="text" class="residential-input"   name="Level" value="<?php echo strtoupper($level) ?>" required="" readonly="">
                        </div>
                    </fieldset>
                        
                        <button class="submit-btn" type="submit" ><i class="fa fa-check"></i> UPDATE PROFILE</button>
                </form>     
            </div>   

                   
               
            </div>
        </div>
    </body>
</html>