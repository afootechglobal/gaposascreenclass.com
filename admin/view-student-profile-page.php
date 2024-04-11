<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<?php require_once ("connection/session-check.php") ?>
<?php
 $student_id= $_GET['student_id'];
?>

<html>
    <head>
    <title>Administrative Portal | GAPOSA - ScreenClass</title>
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


        <?php 
            $user_profile_query=mysqli_query($conn, "SELECT * FROM `student_tab` WHERE `student_id`='$student_id'") or die('cannot select');
            $user_profile=mysqli_fetch_array($user_profile_query);

            $Firstname=$user_profile['firstname'];
            $Lastname=$user_profile['lastname'];  
            $Middlename=$user_profile['middlename'];
            $Dob=$user_profile['dob'];
            $Email=$user_profile['email'];
            $Residentialaddress=$user_profile['residential_address'];
            $Gender=$user_profile['gender'];
            $Country=$user_profile['country'];
            $state=$user_profile['state'];
            $lga=$user_profile['lga'];
            $Residentialaddress=$user_profile['address'];
            $Department=$user_profile['department_id'];
            $Level=$user_profile['level'];
            $passport=$user_profile['passport'];

        ?>

               
            <div class="staff-list-overall-div student-reg-overall-div">
          
                <form action="connection/code.php?action=update-student-profile&student_id=<?php echo $student_id ?>" method="POST" enctype="multipart/form-data">
                 
                
                <label>
                            <div class="profile-pix-div">
                
                                <div class="profile-img-div">  
                                <input type="file" id="passport" style="display:none"  name="passport" accept=".jpg,.png" onchange="Test.UpdatePreview(this);"/>
                                <img src="student-picture/<?php echo $passport ?>" id="MyPassport"/>
                                </div>
                                                        
                         </div>

               

                        </label>
         
                
                
                
                
                
                
                <fieldset>
                        <legend>Personal Information</legend>
                        <div class="individual-input">
                            <label for="">First Name:</label><br/>
                            <input type="text" placeholder="First Name" name="Firstname" id="firstname" value="<?php echo strtoupper($Firstname) ?>" required>
                        </div>
                        <div class="individual-input">
                            <label for="">Middle Name:</label><br/>
                            <input type="text" placeholder="Middle Name" name="Middlename" id="middlename" value="<?php echo strtoupper($Middlename) ?>" required>
                        </div>
                        <div class="individual-input">
                            <label for="">Last Name:</label><br/>
                            <input type="text" placeholder="Last Name" name="Lastname" id="lastname" value="<?php echo strtoupper($Lastname) ?>" required>
                        </div>
                        <div class="individual-input">
                            <label for="">Date of Birth:</label><br/>
                            <input type="text" placeholder="Date of Birth" name="Dob" id="Dob" value="<?php echo $Dob ?>" required>
                        </div>
                        <div class="individual-input">
                            <label for="">Gender:</label><br/>
                            <select name="Gender" id="gender">
                            <option value="<?php echo $Gender ?>"selected><?php echo $Gender ?></option>
                                <?php if($Gender=='Female'){?>
                                <option value='MALE'>MALE</option> 
                                <?php }else{ ?>
                                <option value='FEMALE'>FEMALE</option> 
                                <?php } ?>
                            </select>
                        </div>
                        <div class="individual-input">
                            <label for="">Email Address:</label><br/>
                            <input type="email" placeholder="Email Address" name="Email" id="email" value="<?php echo $Email ?>" required>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Residential Information</legend>
                        <div class="individual-input">
                            <label for="">Country:</label><br/>
                            <select name="Country" id="Country">
                            <option value="<?php echo $Country ?>"selected><?php echo strtoupper($Country) ?></option>
                               
                            </select>
                        </div>

                        <div class="individual-input">
                            <label for="">State:</label><br/>
                            <input type="text" placeholder="State" name="State" id="state" value="<?php echo strtoupper($state)?>" required>
                        </div>
                        <div class="individual-input">
                            <label for="">LGA:</label><br/>
                            <input type="text" placeholder="LGA" name="Lga" id="lga" value="<?php echo strtoupper($lga) ?>" required>
                        </div>
                        <div class="individual-input residential-address">
                            <label for="">Residential Address:</label><br/>
                            <input type="text" class="residential-input" placeholder="Residential Address"  name="Residentialaddress" value="<?php echo strtoupper($Residentialaddress) ?>" required>
                        </div>
                       
                       
                    </fieldset>


                    <fieldset>
                        <legend>Professional Information</legend>
                        <div class="individual-input" style="float:left;">
                            <label for="">Department:</label><br/>
                            <select name="Departmentname" id="Departmentname" required>
                            <?php
                            $checkdept_query=mysqli_query($conn, "SELECT department_name FROM `department_tab`, `student_tab` WHERE department_tab.department_id='$Department' AND student_tab.student_id='$student_id'");
                            while ($checkdept=mysqli_fetch_array($checkdept_query)){
                            $Department= $checkdept['department_name'];
                            ?>

                            <option value="<?php echo strtoupper($Department) ?>"><?php echo strtoupper($Department) ?></option>
                            <?php   
                            }
                            ?>
                            </select>

    
                        </div>



                        <div class="individual-input" style="float:left;" required>
                            <label for="">DIPLOMA:</label><br/>
                            <select name="Level" id="level">
   
                                <option value="<?php echo $Level ?>" selected><?php echo $Level ?></option>
                                
                                <option value="ND 1">ND 1</option>
                                <option value="ND 2">ND 2</option>
                                <option value="HND 1">HND 1</option>
                                <option value="HND 2">HND 2</option>
                                
                            </select>
                        </div>   
                    </fieldset>
                        
                        <button class="submit-btn" type="submit" ><i class="fa fa-check"></i> UPDATE PROFILE</button>
                </form>     
            </div>   

                   
               
            </div>
        </div>
    </body>
</html>