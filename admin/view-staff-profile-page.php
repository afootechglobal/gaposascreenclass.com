<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<?php require_once ("connection/session-check.php") ?>
<?php
 $staff_id= $_GET['staff_id'];
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
                                    Staff Profile
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
            $user_profile_query=mysqli_query($conn, "SELECT * FROM `staff_tab` WHERE `staff_id`='$staff_id'") or die('cannot select');
            $user_profile=mysqli_fetch_array($user_profile_query);

            $Firstname=$user_profile['firstname'];
            $Lastname=$user_profile['lastname'];  
            $Middlename=$user_profile['middlename'];
            $Dob=$user_profile['dob'];
            $Email=$user_profile['email'];
            $Residentialaddress=$user_profile['residential_address'];
            $Gender=$user_profile['gender'];
            $Country=$user_profile['country'];
            $City=$user_profile['city'];
            $Lga=$user_profile['lga'];
            $Department=$user_profile['department_id'];
            $Role=$user_profile['role'];
            $Status=$user_profile['status_id'];
            $passport=$user_profile['passport'];
        ?>

               
            <div class="staff-list-overall-div student-reg-overall-div">
                <form action="connection/code.php?action=update-profile&staff_id=<?php echo $staff_id ?>" method="POST" enctype="multipart/form-data">
             
                <label>
                <?php if ($passport!=''){?>
                         <div class="profile-pix-div">
                
                                <div class="profile-img-div">  
                                <input type="file" id="passport" style="display:none"  name="passport" accept=".jpg,.png" onchange="Test.UpdatePreview(this);"/>
                                <img src="staff-picture/<?php echo $passport ?>" id="MyPassport"/>
                                </div>
                                                        
                         </div>

                <?php  } else { ?>

                    <div class="profile-pix-div">
                        
                        <div class="profile-img-div">  
                        <input type="file" id="passport" style="display:none"  name="passport" accept=".jpg,.png" onchange="Test.UpdatePreview(this);"/>
                        <img src="images/up.png" id="MyPassport"/>
                        </div>
                                                
                </div>

               <?php } ?>

                        </label>
         
                <fieldset class="side">
                        <legend>Personal Information</legend>
                        <div class="individual-input">
                            <label for="">First Name:</label><br/>
                            <input type="text" placeholder="First Name" name="Firstname" id="Firstname" value="<?php echo strtoupper($Firstname) ?>" required>
                        </div>
                        <div class="individual-input">
                            <label for="">Middle Name:</label><br/>
                            <input type="text" placeholder="Middle Name" name="Middlename" id="Middlename" value="<?php echo strtoupper($Middlename)?>" >
                        </div>
                        <div class="individual-input">
                            <label for="">Last Name:</label><br/>
                            <input type="text" placeholder="Last Name" name="Lastname" id="Lastname" value="<?php echo strtoupper($Lastname) ?>" required>
                        </div>
                        <div class="individual-input">
                            <label for="">Date of Birth:</label><br/>
                            <input type="date" placeholder="Date of Birth" name="Dob" id="Dob" value="<?php echo  $Dob?>" required>
                        </div>
                        <div class="individual-input">
                            <label for="">Gender:</label><br/>
                            <select name="Gender" id="Gender">
                            <option value="<?php echo strtoupper($Gender) ?>"selected><?php echo strtoupper($Gender)?></option>
                                <?php if($Gender=='FEMALE'){?>
                                <option value="MALE">MALE</option> 
                                <?php }else{ ?>
                                <option value="FEMALE">FEMALE</option> 
                                <?php } ?>
                            </select>
                        </div>
                        <div class="individual-input">
                            <label for="">Email Address:</label><br/>
                            <input type="email" placeholder="Email Address" name="Email" id="Email" value="<?php echo $Email ?>" required>
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
                            <label for="">City:</label><br/>
                            <input type="text" placeholder="City" name="City" id="City" value="<?php echo strtoupper($City )?>" required>
                        </div>
                        <div class="individual-input">
                            <label for="">LGA:</label><br/>
                            <input type="text" placeholder="LGA" name="Lga" id="Lga" value="<?php echo strtoupper( $Lga) ?>" >
                        </div>
                        <div class="individual-input residential-address">
                            <label for="">Residential Address:</label><br/>
                            <input type="text" class="residential-input" placeholder="Residential Address"  name="Residentialaddress" id="Residentialaddress" value="<?php echo strtoupper($Residentialaddress) ?>" required>
                        </div>
                       
                       
                    </fieldset>


                    <fieldset>
                        <legend>Professional Information</legend>
                        <div class="individual-input" style="float:left;">
                            <label for="">Department:</label><br/>
                            <select name="Departmentname" id="Departmentname" required>
                            <?php
                            $checkdept_query=mysqli_query($conn, "SELECT department_name FROM `department_tab`");
                            while ($checkdept=mysqli_fetch_array($checkdept_query)){
                            $Department_name= $checkdept['department_name'];
                            ?>

                            <option value="<?php echo strtoupper($Department_name) ?>" selected><?php echo strtoupper($Department_name) ?></option>
                            <?php   
                            }
                            ?>
                            </select>
                         
                        </div>

                        <div class="individual-input" style="float:left;">
                            <label for="">Role:</label><br/>
                            <select name="Role" id="Role" >
                    <?php
                        $checkrole_query=mysqli_query($conn, "SELECT `role` FROM `staff_tab` WHERE staff_id='$staff_id'");
                         $checkrole=mysqli_fetch_array($checkrole_query);
                        $Role= $checkrole['role'];
                    ?>
                                <option value="<?php echo strtoupper($Role)?>" selected> <?php echo strtoupper($Role)?> </option>
                                <?php
                             
                                    if($Role == 'ADMIN'){
                                ?>
                                <option value="LECTURER">LECTURER</option>
                                <?php
                                    }else{
                                        if($Role == 'LECTURER'){
                                ?>    
                                <option value="ADMIN">ADMIN</option>
                                <?php 
                                    }
                                }
                            
                                ?>
                                
                     </select>
                        </div>    
                        
                        
                        <?php
                        $staff_status_query=mysqli_query($conn, "SELECT * FROM `status_tab`, `staff_tab`  WHERE status_tab.status_id=staff_tab.status_id AND staff_tab.staff_id='$staff_id'") or die('cannot select staff status');
                        $staff_status=mysqli_fetch_array($staff_status_query);
                        $Status= $staff_status['status_name'];
                    ?>
                        
                        <div class="individual-input">
                            <label for="">Status:</label><br/>
                            <select name="Status" id="Status">
                            <option value="<?php echo $Status ?>" ><?php echo $Status ?> </option>
                                <?php if ($Status=='ACTIVE'){?>
                                    <option value="SUSPENDED">SUSPENDED</option> 
                              <?php  }else {?>
                                <option value="ACTIVE">ACTIVE</option> 
                            <?php  }?>
                                
                             
                               
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