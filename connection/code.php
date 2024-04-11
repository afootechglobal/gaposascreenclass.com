<?php include '../connection/connection.php' ?>
<?php include '../connection/session.php' ?>
<?php
    $action = $_GET['action']; //$_GET perform function on the url //
?>

<?php
  //// for logout
  if ($action=='logout'){
	session_destroy();
	?>
		    <script>
        window.parent(location="../login.php");
        </script>
      
<?php
  }
?>

<?php
    if ($action=='validateemail'){
        $countemail_query=mysqli_query($conn, "SELECT email FROM `student_tab` WHERE email='$resetemail'");
        $countemail = mysqli_num_rows($countemail_query);
        $sendotp = rand(11111, 99999);


        if ($countemail > 0) {

            

            

            $checkstudentidquery=mysqli_query($conn, "SELECT `student_id` FROM `student_tab` where email='$resetemail'");
            $studentidcheck=mysqli_fetch_array($checkstudentidquery);
            $checkemail_studentid=$studentidcheck['student_id'];
            mysqli_query($conn, "UPDATE student_tab SET `otp`='$sendotp' WHERE email='$resetemail'") or die('cannot update the database');

           
?>
                <script>
                    window.parent(location="../reset-password-form.php?userid=<?php echo $checkemail_studentid ?>");
                </script>
<?php
        }else{
            $countemail_query=mysqli_query($conn, "SELECT `email` FROM `staff_tab` WHERE `email`='$resetemail'");
            $countemail = mysqli_num_rows($countemail_query);

            if ($countemail > 0){
                $checkstaffidquery=mysqli_query($conn, "SELECT `staff_id` FROM `staff_tab` where email='$resetemail'");
                $staffidcheck=mysqli_fetch_array($checkstaffidquery);
                $checkemail_staffid=$staffidcheck['staff_id'];
                mysqli_query($conn, "UPDATE staff_tab SET `otp`='$sendotp' WHERE email='$resetemail'") or die('cannot update the database');


?>
                <script>
                    window.parent(location="../reset-password-form.php?userid=<?php echo $checkemail_staffid?>");
                </script>
<?php
    }else{
?>
                <script>
                    alert('Email not found');
                    window.parent(location="../login.php");
                </script>
<?php
    }
    } 
    } 
?>



<!-- RESET PASSWORD -->
<?php
        
    if ($action =='resetpassword') {

        
        
        if($createpassword != $confirmpassword){
?>
            <script>
                alert('PASSWORD NOT MATCH!!!');
                window.parent(location="../reset-password-form.php");
            </script>
<?php
        }else{
            $reset_password_userid=$_GET['userid'];
            // CHECK IF THE ID IS A STAFF ID //
            $check_id_query=mysqli_query($conn, "SELECT staff_id FROM staff_tab WHERE staff_id='$reset_password_userid'");
            $count_id=mysqli_num_rows($check_id_query);

            if ($count_id > 0){
            // UPDATE THE STAFF TAB IF IT IS A STAFF_ID //
                mysqli_query($conn, "UPDATE staff_tab SET `password`='$confirmpassword' WHERE staff_id='$reset_password_userid'") or die('cannot update the database');
?>
            <script>
                alert('PASSWORD RESET SUCCESSFUL');
                window.parent(location="../login.php");
            </script>

<?php          
        }else{
            // UPDATE THE STUDENT TAB IF IT IS A STUDENT_ID //
            mysqli_query($conn, "UPDATE student_tab SET `password`='$confirmpassword' WHERE student_id='$reset_password_userid'") or die('cannot update the database');
?>
            <script>
              alert('PASSWORD RESET SUCCESSFUL');
                window.parent(location="../login.php");
            </script>
<?php
}
}
}
?>


<?php
    if ($action == 'login'){
        $loginemailquery=mysqli_query($conn, "SELECT * FROM staff_tab WHERE email='$loginemail' AND `password`='$loginpassword' AND `role`='ADMIN' ");
        $loginemailcount=mysqli_num_rows($loginemailquery);

        if($loginemailcount>0){
            $loginstaffidfetch=mysqli_fetch_array($loginemailquery);
            $loginstaffid=$loginstaffidfetch['staff_id'];
    
            $_SESSION['staff_id']=$loginstaffid;
            $loginstaffid=$_SESSION['staff_id'];
?>

            <script>
                window.parent(location="../admin/index.php");
            </script>




<?php
    }elseif($action=='login'){

        $loginemailquery=mysqli_query($conn, "SELECT * FROM staff_tab WHERE email='$loginemail' AND `password`='$loginpassword' AND `role`='LECTURER' AND status_id='ACT' ");
        $loginemailcount=mysqli_num_rows($loginemailquery);

        if($loginemailcount>0){
            $loginstaffidfetch=mysqli_fetch_array($loginemailquery);
            $loginstaffid=$loginstaffidfetch['staff_id'];
    
            $_SESSION['staff_id']=$loginstaffid;
            $loginstaffid=$_SESSION['staff_id'];
?>

            <script>
                window.parent(location="../staff-login/index.php");
            </script>




<?php
        }elseif($action == 'login'){

        $loginemailquery=mysqli_query($conn, "SELECT * FROM student_tab WHERE email='$loginemail' AND `password`='$loginpassword'");
        $loginemailcount=mysqli_num_rows($loginemailquery);

        if($loginemailcount>0){
            $loginstudentidfetch=mysqli_fetch_array($loginemailquery);
            $loginstudentid=$loginstudentidfetch['student_id'];
    
            $_SESSION['student_id']=$loginstudentid;
            $loginstudentid=$_SESSION['student_id'];
?>
            <script>
                window.parent(location="../student-login/index.php");
            </script>
<?php
            }else{
?>
            <script>
                alert('Invalid Login Details');
                window.parent(location="../login.php");
            </script>
<?php
            }
        }
    }
    }

?>

