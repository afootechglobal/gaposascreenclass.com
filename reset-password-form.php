<?php include 'connection/connection.php' ?>

<?php
    $reset_password_userid=$_GET['userid'];
?>


<html>
    <head>
        <?php include 'reference.php' ?>
    </head>
    <body>
    <?php include 'header.php' ?>
        <div class="login-overall">
               
            <div class="login-image-cover">




            <?php
                     $staff_id_query=mysqli_query($conn, "SELECT * FROM staff_tab WHERE staff_id='$reset_password_userid'");
                     $count_staff_id=mysqli_num_rows($staff_id_query);
             
                     if ($count_staff_id > 0){
                     
                    
                     $getstaff_id=mysqli_fetch_array($staff_id_query);
                     $get_otp= $getstaff_id['otp'];
                  
                 
                     }else{
                     $student_id_query=mysqli_query($conn, "SELECT * FROM student_tab WHERE student_id='$reset_password_userid'");
                     $getstudent_id=mysqli_fetch_array($student_id_query);
                     $get_otp= $getstudent_id['otp'];
                     }
                 ?>

                  
                    <!-- CHANGE PASSWORD FORM -->
                        <form action="connection/code.php?action=resetpassword&userid=<?php echo $reset_password_userid ?>" method="POST" enctype="multipart/form-data">
                            <div class="login-main animated animated zoomIn animated">
                                    <h1>CHANGE PASSWORD</h1>
                                    <p>Enter OTP:</p>
                                    <input type="text" placeholder="Enter OTP" name="otp" id="otp" value="<?php echo $get_otp ?>" >
                                    <p>New Password:</p>
                                    <input type="password" placeholder="Enter Your New Password" name="createpassword" id="createpassword" required>
                                    <p>Confirm New Password:</p>
                                    <span id='message' style="float:left;margin-left:20px"></span>
                                    <input type="password" placeholder="Confirm Your New Password" name="confirmpassword" onkeyup="checkpassword()" id="confirmpassword" required>
                                    
                                    <button class="login change-password" type="submit" id="submit" ><i class="fa fa-undo"></i> RESET</button>
                                    <div class="forgot-password register">
                                       <a href="login.php"> <p><span class="resetpassword">LOGIN </span> </p> </a>
                                    </div>
                            </div>

                        </form>
                                </div>
                   

                

            </div>
        </div>
    </body>
</html>