

<?php 
            $user_profile_query=mysqli_query($conn, "SELECT * FROM `staff_tab` WHERE `staff_id`='$s_staff_id'") or die('cannot select');
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
            
if ($s_staff_id=='' || $Status=='SUSP'){
    session_destroy();
?>
<script>
 window.parent(location="../login.php");
 </script>

<?php }?>

