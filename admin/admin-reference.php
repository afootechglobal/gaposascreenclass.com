<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<?php require_once ("connection/session-check.php") ?>


<div class="left-sided-div animated animated fadeInLeft animated">

<!-- PROFILE INDEX -->
<div class="profile-div">
    <?php
        
        $staff_id_query=mysqli_query($conn, "SELECT * FROM staff_tab WHERE staff_id='$s_staff_id'");
        $count_staff_id=mysqli_num_rows($staff_id_query);

        if ($count_staff_id > 0){
        
        $staff_id_query=mysqli_query($conn, "SELECT * FROM staff_tab WHERE staff_id='$s_staff_id'");
        $getstaff_id=mysqli_fetch_array($staff_id_query);
        $lastname= $getstaff_id['lastname'];
        $firstname= $getstaff_id['firstname'];
        $id= $getstaff_id['staff_id'];
        $role= $getstaff_id['role'];
        $passport = $getstaff_id['passport'];
    
            

        }else{
        $student_id_query=mysqli_query($conn, "SELECT * FROM student_tab WHERE student_id='$s_student_id'");
        $getstudent_id=mysqli_fetch_array($student_id_query);
        $lastname= $getstudent_id['lastname'];
        $firstname= $getstudent_id['firstname'];
        $id= $getstudent_id['student_id'];
        $passport = $getstudent_id['passport'];
        }
    ?>


    <div class="picture-div">
        <img id="ImageDisplay" name="ImageDisplay" alt="Passport"
        <?php
        if ($passport == ''){
?>
src="images/po.png"
<?php
        }else{
?>
        src="staff-picture/<?php echo $passport ?>"
<?php } ?>
            >
    </div>
   
  
    <h6>  <?php echo $lastname ?> <?php echo $firstname ?> </h6>
   
    <p> <i>Role</i><span>: <?php echo $role ?> </span></p>
   
    <a href="myprofile.php"><button name="submitpassport"> View Profile</button></a>


    
    </div>
    



<!-- DASHBOARD INDEX -->
<div class="dashboard-list">
    <ul>
        <a href="index.php"><li class="active"><i class="fa fa-dashboard"></i> Dashboard</li></a>
      <li onclick="_expand_link('staff');"><i class="fa fa-users" ></i> Staff
    
        <div class="toggle" id="staff" style="display: none;">
            <a href="staff-list.php"><div class="sub-link"><i class="fa fa-users" ></i> View All Staff</div></a>
			<a href="active-staff.php"><div class="sub-link"><i class="fa fa-check"></i> Active Staff </div></a>
			<a href="suspended-staff.php"><div class="sub-link"><i class="fa fa-close"></i> Suspended Staff</div></a>
		
            </div>
            </li>
        <li onclick="_expand_link('student');"><i class="fa fa-user"></i> Student
        <div class="toggle" id="student" style="display: none;">
           <div class="sub-link" onClick="_view_student();"><i class="fa fa-users" ></i> View Students</div>
            <div class="sub-link" onClick="_get_change_of_course();"><i class="fa fa-users" ></i>Change of Course</div>
		
            </div>
    
    </li>
        <a href="faculty-table.php"><li><i class="fa fa-building"></i> Faculty</li></a>
       <li onClick="_view_course();"><i class="fa fa-book"></i> Course</li>
        <li><i class="fa fa-sign-out"></i> Sign-out</li>
      
    </ul>
</div>

</div>