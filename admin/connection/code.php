
<?php require_once('../connection/connection.php');?>
<?php require_once('../connection/session.php');?>


<?php
    $action = $_GET['action']; //$_GET perform function on the url //
?>




<?php

  if ($action=='date_time'){
	?>
<?php echo date("h:i:s") ?> <sup> <?php echo date("A") ?> </sup>
<?php
  }
?>



        <!-- STAFF REGISTRATION -->
<?php 
    if ($action=='registerstaff'){
        $passport = $_FILES["passport"]["name"]; 

        $checkemail_query=mysqli_query($conn, "SELECT * FROM `staff_tab` WHERE `email`='$Email'");
        $checkemail=mysqli_num_rows($checkemail_query);

        if( $checkemail > 0 ){
?>

            <script>
                alert('EMAIL HAS ALREADY BEEN USED!!!');
                window.history.back();
              
            </script>
<?php
        }else{

        $counterid="STAFF";

        $counterquery=mysqli_query($conn, "SELECT counter_value+1 AS counter_value FROM counter_tab WHERE counter_id='$counterid'");
        $counterqueryfetch=mysqli_fetch_array($counterquery);

        $countervalue=$counterqueryfetch['counter_value'];
        $staff_id=$counterid."-"."00".$countervalue;

        
        // UPDATE THE COUNTER TAB //
        mysqli_query($conn, "UPDATE counter_tab SET counter_value='$countervalue' WHERE counter_id='$counterid'");


        // GET DEPARTMENT ID //

        $getdeptid_query=mysqli_query($conn, "SELECT `department_id` FROM `department_tab` WHERE `department_name`='$Departmentname'");
        $getdeptid=mysqli_fetch_array($getdeptid_query);
        $dept_id= $getdeptid['department_id'];


//// insert into staff_status_tab
        $active_status="ACTIVE";
        $suspended_status="SUSPENDED";

if ($Status == $active_status){
            $status_id="ACT";
            $status_name="ACTIVE";

            if($passport==''){

             
      

        // INSERT INTO STAFF TAB //

        mysqli_query($conn, "INSERT INTO `staff_tab`
        (`staff_id`, `firstname`, `middlename`, `lastname`, `password`, `dob`, `gender`, `email`, `country`, `city`, `lga`, `residential_address`, `department_id`, `role`, `status_id`, `passport`, `date`)
         VALUES ('$staff_id','$Firstname','$Middlename','$Lastname','','$Dob','$Gender','$Email','$Country','$City','$Lga','$Residentialaddress','$dept_id','$Role','$status_id','', NOW())")
        or die('cannot insert into staff-tab');
          ?>
          <script>
           
              window.parent(location="../registration-successful.php");
            </script>
            <?php
              }else {//////////////////////////////
            
                      $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png");
                      $extension = pathinfo($_FILES["passport"]["name"], PATHINFO_EXTENSION);
                     if (in_array($extension, $allowedExts)){				 //////////array 
                      
                      move_uploaded_file($_FILES["passport"]["tmp_name"], "../staff-picture/".$passport);
                      }//////////////////end array4
            
  

        // INSERT INTO STAFF TAB //

        mysqli_query($conn, "INSERT INTO `staff_tab`
        (`staff_id`, `firstname`, `middlename`, `lastname`, `password`, `dob`, `gender`, `email`, `country`, `city`, `lga`, `residential_address`, `department_id`, `role`, `status_id`, `passport`, `date`)
         VALUES ('$staff_id','$Firstname','$Middlename','$Lastname','','$Dob','$Gender','$Email','$Country','$City','$Lga','$Residentialaddress','$dept_id','$Role','$status_id','$passport', NOW())")
        or die('cannot insert into staff-tab');
?>
            <script>
            window.parent(location="../registration-successful.php");
        </script>
<?php


}} elseif($Status ==  $suspended_status){
    $Status_id="SUSP";
    $status_name="SUSPENDED";

    
    if($passport==''){

       

           /// INSERT INTO STAFF STATUS TAB
           mysqli_query($conn, "INSERT INTO `status_tab`
           (`staff_id`, `status_id`, `status_name`) VALUES
               ('$staff_id','$status_id', '$status_name')")   or die('cannot insert into status_tab');
   
        // INSERT INTO STAFF TAB //

        mysqli_query($conn, "INSERT INTO `staff_tab`
        (`staff_id`, `firstname`, `middlename`, `lastname`, `password`, `dob`, `gender`, `email`, `country`, `city`, `lga`, `residential_address`, `department_id`, `role`, `status_id`, `passport`, `date`)
         VALUES ('$staff_id','$Firstname','$Middlename','$Lastname','','$Dob','$Gender','$Email','$Country','$City','$Lga','$Residentialaddress','$dept_id','$Role','$status_id','', NOW())")
        or die('cannot insert into staff-tab');


    }else {
        $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png");
        $extension = pathinfo($_FILES["passport"]["name"], PATHINFO_EXTENSION);
       if (in_array($extension, $allowedExts)){				 //////////array 
        
        move_uploaded_file($_FILES["passport"]["tmp_name"], "../staff-picture/".$passport);
        }//////////////////end array4


        mysqli_query($conn, "INSERT INTO `staff_tab`
        (`staff_id`, `firstname`, `middlename`, `lastname`, `password`, `dob`, `gender`, `email`, `country`, `city`, `lga`, `residential_address`, `department_id`, `role`, `status_id`, `passport`, `date`)
         VALUES ('$staff_id','$Firstname','$Middlename','$Lastname','','$Dob','$Gender','$Email','$Country','$City','$Lga','$Residentialaddress','$dept_id','$Role','$status_id','$passport', NOW())")
        or die('cannot insert into staff-tab');

    }

   
?>
        <script>
            window.parent(location="../registration-successful.php");
        </script>

<?php
}

}
    }

?>



        <!-- STUDENT REGISTRATION -->
<?php 
    if ($action== 'registerstudent'){
        $passport = $_FILES["passport"]["name"]; 

        $checkemail_query=mysqli_query($conn, "SELECT * FROM `student_tab` WHERE `email`='$Email'");
        $checkemail=mysqli_num_rows($checkemail_query);

        if( $checkemail > 0 ){
?>

            <script>
                alert('EMAIL HAS ALREADY BEEN USED!!!');
              window.history.back();
            </script>
<?php
        }else{


        if($passport!=''){


     

        $counterid="STUDENT";
       // $department_code="19";
       /// $middle_code=rand(11, 99);


        $counterquery=mysqli_query($conn, "SELECT counter_value+1 AS counter_value FROM counter_tab WHERE counter_id='$counterid' FOR UPDATE");
        $counterqueryfetch=mysqli_fetch_array($counterquery);

        $countervalue=$counterqueryfetch['counter_value'];
        $student_id=$counterid."-"."00".$countervalue;
      //  $student=$department_code."/".$middle_code."/"."000".$countervalue;


     
      // UPDATE THE COUNTER TAB //
        mysqli_query($conn, "UPDATE counter_tab SET counter_value='$countervalue' WHERE counter_id='$counterid'");

         // GET DEPARTMENT ID //

         $getdeptid_query=mysqli_query($conn, "SELECT `department_id` FROM `department_tab` WHERE `department_name`='$Departmentname'");
         $getdeptid=mysqli_fetch_array($getdeptid_query);
         $dept_id= $getdeptid['department_id'];

        // INSERT INTO STAFF TAB //

        $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png");
        $extension = pathinfo($_FILES["passport"]["name"], PATHINFO_EXTENSION);
       if (in_array($extension, $allowedExts)){				 //////////array 
        
        move_uploaded_file($_FILES["passport"]["tmp_name"], "../student-picture/".$passport);
        }//////////////////end array4


        mysqli_query($conn, "INSERT INTO `student_tab`
        (`student_id`, `firstname`, `middlename`, `lastname`, `password`, `dob`, `gender`, `email`, `country`, `state`, `lga`, `address`, `department_id`, `level`,`passport`, `date`)
         VALUES ('$student_id','$Firstname','$Middlename','$Lastname','','$Dob','$Gender','$Email','$Country','$State','$Lga', '$Residentialaddress','$dept_id','$Level','$passport', NOW())")
        or die('cannot insert into student-tab');
?>
            <script>
                window.parent(location="../registration-successful.php")
            </script>
<?php
    }else {
      
?>
          <script>
                alert('UPLOAD STUDENT PICTURE!!!');
              window.history.back();
            </script>
<?php

    }
    }
}

?>

    <!-- LOGOUT FUNCION -->
<?php
    if ($action== 'logout'){
        session_destroy();
?>
            <script>
                window.parent(location="../../login.php")
            </script>
<?php
    }
?>


        <!-- REGISTER FACULTY -->
<?php
    if ($action == 'registerfaculty'){

        $checkdept_query=mysqli_query($conn, "SELECT * FROM `faculty_tab` WHERE faculty_name='$facultyname'");
        $checkdept=mysqli_num_rows($checkdept_query);

        

            if ($checkdept > 0){
?>
            <script>
                 alert('Faculty exists');
                 window.parent(location="../faculty-table.php");
            </script>
<?php
            }else{
        
        $counterid="FACULTY";

        $counterquery=mysqli_query($conn, "SELECT counter_value+1 AS counter_value FROM counter_tab WHERE counter_id='$counterid'");
        $counterqueryfetch=mysqli_fetch_array($counterquery);

        $countervalue=$counterqueryfetch['counter_value'];
        $faculty_id=$counterid.$countervalue;

          // INSERT INTO THE FACULTY TAB //
          mysqli_query($conn, "UPDATE counter_tab SET counter_value='$countervalue' WHERE counter_id='$counterid'");
        // INSERT INTO THE FACULTY TAB //
        mysqli_query($conn, "INSERT INTO `faculty_tab`(`faculty_id`, `faculty_name`) 
        VALUES ('$faculty_id','$facultyname')") or die('cannot insert into faculty tab');

      
?>
             <script>
                 window.parent(location="../action-successful.php");
            </script>
<?php
    }
}
?>


<!-- UPDATE FACULTY -->

<?php
    if ($action == 'update-faculty'){
      

        $checkdept_query=mysqli_query($conn, "SELECT * FROM `faculty_tab` WHERE faculty_name='$oldfacultyname'");
        $checkdept=mysqli_num_rows($checkdept_query);

        

            if ($checkdept == 1 ){

// UPDATE INTO THE FACULTY TAB //
        mysqli_query($conn, "UPDATE faculty_tab SET faculty_name='$newfacultyname' WHERE faculty_name='$oldfacultyname'");
    
?>
             <script>
                 window.parent(location="../action-successful.php");
            </script>
            
<?php
            }else{?>
        
            <script>
            alert('Faculty does not exists');
            window.parent(location="../faculty-table.php");
            </script>
     
<?php
    }
}
?>







<!-- UPDATE COURSE -->

<?php
        if ($action == 'update-course'){
            $checkdept_query=mysqli_query($conn, "SELECT * FROM `course_tab` WHERE course_title='$oldcoursename'");
        // UPDATE INTO THE FACULTY TAB //
        mysqli_query($conn, "UPDATE course_tab SET course_code='$newcoursecode',`course_title`='$newcoursename' WHERE course_title='$oldcoursename'");

        ?>
            <script>
                window.parent(location="../update-success.php");
        </script>

      
<?php
}

?>




<!-- UPDATE DEPARTMENT -->

<?php
        if ($action == 'update-department'){


        $checkdept_query=mysqli_query($conn, "SELECT * FROM `department_tab` WHERE department_name='$oldfacultyname'");
        $checkdept=mysqli_num_rows($checkdept_query);



        if ($checkdept == 1 ){

        // UPDATE INTO THE FACULTY TAB //
        mysqli_query($conn, "UPDATE department_tab SET department_name='$newfacultyname' WHERE department_name='$oldfacultyname'");

        ?>
            <script>
                 window.parent(location="../update-success.php");
        </script>

        <?php
        }else{?>

        <script>
        alert('department does not exists');
        window.parent(location="../department-table.php");
        </script>

<?php
}
}
?>











            <!-- REGISTER DEPARTMENT -->
 <?php
    if ($action == 'registerdepartment'){

        $getdept_query=mysqli_query($conn, "SELECT * FROM `department_tab` WHERE department_name='$Departmentname'");
        $getdept=mysqli_num_rows($getdept_query);

        

            if ($getdept > 0){
?>
            <script>
                 alert('department exists');
                 window.parent(location="../faculty-table.php");
            </script>
<?php
            }else{

            




        $faculty_id = $_GET['faculty_id'];
        $counterid="DEPARTMENT";

        $counterquery=mysqli_query($conn, "SELECT counter_value+1 AS counter_value FROM counter_tab WHERE counter_id='$counterid'");
        $counterqueryfetch=mysqli_fetch_array($counterquery);

        $countervalue=$counterqueryfetch['counter_value'];
        $department_id=$counterid.$countervalue;\

         // INSERT INTO THE FACULTY TAB //
         mysqli_query($conn, "UPDATE counter_tab SET counter_value='$countervalue' WHERE counter_id='$counterid'");

        // INSERT INTO THE FACULTY TAB //
        mysqli_query($conn, "INSERT INTO `department_tab`(`faculty_id`, `department_id`, `department_name`) 
        VALUES ('$faculty_id','$department_id','$Departmentname')") or die('cannot insert into faculty tab');

       
?>
             <script>
                 window.parent(location="../action-successful.php");
            </script>
<?php
}
    }
?>




<?php
if ($action == 'level'){
$department_id=$_GET['department_id'];

    $level_query=mysqli_query($conn, "SELECT * FROM `student_tab` WHERE department_id='$department_id' AND `level`='$Level'");
    $get_level=mysqli_fetch_array($level_query);
    
    $Level=$get_level['level'];

    
?>
        <script>
            
             window.parent(location="../course-table.php?department_id=<?php echo $department_id?>");
        </script>
<?php
}
?>






<?php
if ($action == 'department-level'){
    $faculty_id = $_GET['faculty_id'];

    $level_query=mysqli_query($conn, "SELECT * FROM `course_tab` WHERE department_id='DEPARTMENT29' AND `level`='$Level'");
    $get_level=mysqli_fetch_array($level_query);
    
    $level=$get_level['level'];
    $department_id=$get_level['department_id'];

    
?>
        <script>
            
            window.parent(location="../course-table.php?faculty_id=<?php echo $faculty_id?>&department_id=<?php echo $department_id?>&level=<?php echo $level?>");

        </script>
<?php
}
?>
































 <!-- REGISTER COURSE -->
 <?php
    if ($action == 'registercourse'){


        $getcourse_query=mysqli_query($conn, "SELECT * FROM `course_tab` WHERE course_title='$Coursename' AND course_code='$Coursecode'AND `level`='$Level'");
        $getcourse=mysqli_num_rows($getcourse_query);

        

            if ($getcourse > 0){
?>
            <script>
                 alert('Course exists');
                 window.parent(location="../course-table.php");
            </script>

<?php
        
            }else{
        $department_id = $_GET['department_id'];
        $faculty_id = $_GET['faculty_id'];

        $counterid="COURSE";

        $counterquery=mysqli_query($conn, "SELECT counter_value+1 AS counter_value FROM counter_tab WHERE counter_id='$counterid'");
        $counterqueryfetch=mysqli_fetch_array($counterquery);

        $countervalue=$counterqueryfetch['counter_value'];
        $course_id=$counterid.$countervalue;

        // GET STAFF ID //
        $getstaffid_query=mysqli_query($conn, "SELECT * FROM `staff_tab` WHERE `firstname`='$selectstaff'");
        $getstaffid=mysqli_fetch_array($getstaffid_query);
        $staff_id= $getstaffid['staff_id'];

  // UPDATE THE COUNTER TAB //
  mysqli_query($conn, "UPDATE counter_tab SET counter_value='$countervalue' WHERE counter_id='$counterid'");


        // INSERT INTO THE FACULTY TAB //
        mysqli_query($conn, "INSERT INTO `course_tab`(`faculty_id`, `department_id`, `course_code`,`course_title`,`level`) 
        VALUES ('$faculty_id','$department_id','$Coursecode','$Coursename','$Level')") or die('cannot insert into course tab');

      

?>
             <script>
                 window.parent(location="../action-successful.php");
            </script>
<?php
        }
    }
?>


        <!-- LECTURE REGISTRATION -->
 <?php
    if($action == 'registerlectures'){

         // GET DEPARTMENT ID //
         $getdepart_query=mysqli_query($conn, "SELECT * FROM `department_tab` WHERE `department_name`='$Departmentname'");
         $getdepart_id=mysqli_fetch_array($getdepart_query);
         $departm_id= $getdepart_id['department_id'];




        
        // GET COURSE CODE //

        $getcoursecode_query=mysqli_query($conn, "SELECT * FROM `course_tab` WHERE `course_title`='$Coursename'");
        $getcoursecode=mysqli_fetch_array($getcoursecode_query);
        $coursecode= $getcoursecode['course_code'];



        $security_query=mysqli_query($conn, "SELECT * FROM `lectures_tab` WHERE `course_code`='$Coursecode' AND `level`='$Level' ");
        $security=mysqli_num_rows($security_query);
        

            if ($security > 0){
?>
                <script>
                    alert('Course allocated already for that level')
                    window.parent(location="../lectures.php");
                </script>
<?php
               
            }else{
        

        // INSERT INTO THE LECTURE TAB //
        mysqli_query($conn, "INSERT INTO `lectures_tab`(`staff_id`, `course_code`, `department_id`, `level`) 
        VALUES ('$staffID','$coursecode','$departm_id','$Level')") or die('cannot insert into lecture tab');
?>
         <script>
                 window.parent(location="../action-successful.php");
        </script>
<?php
}
}
?>




<?php
    if($action == 'assign-course'){

         // GET DEPARTMENT ID //
         $getdepart_query=mysqli_query($conn, "SELECT * FROM `department_tab` WHERE `department_name`='$Departmentname'");
         $getdepart_id=mysqli_fetch_array($getdepart_query);
         $departm_id= $getdepart_id['department_id'];




        
        // GET COURSE //

        $getcourse_query=mysqli_query($conn, "SELECT * FROM `course_tab` WHERE `level`='$Level' AND `course_title`='$Coursename'");
        $getcourse=mysqli_fetch_array($getcourse_query);
        $coursecode= $getcourse['course_code'];
        $course_level= $getcourse['level'];


        // GET STAFF ID //
        $get_staff_query=mysqli_query($conn, "SELECT * FROM `staff_tab` WHERE CONCAT(`firstname`='$choosestaff',' ',`lastname`='$choosestaff') AND staff_id!='$s_staff_id'");
        $get_staff_id=mysqli_fetch_array($get_staff_query);
        $staff_id= $get_staff_id['staff_id'];



        

        // INSERT INTO THE LECTURE TAB //
        mysqli_query($conn, "INSERT INTO `lectures_tab`(`staff_id`, `course_code`, `department_id`, `level`) 
        VALUES ('$staff_id','$coursecode','$departm_id','$Level')") or die('cannot insert into lecture tab');

 // INSERT INTO THE LECTURE TAB //
    
 mysqli_query($conn, "UPDATE lectures_tab SET `staff_id`='$staff_id',`course_code`='$coursecode',`department_id`='$departm_id',`level`='$Level' WHERE `course_code`='$coursecode'");


?>
         <script>
                 window.parent(location="../action-successful.php");
        </script>
<?php
}

?>







<?php
    if($action == 'edit-course'){
        $staff_id=$_GET['staff_id'];
         // GET DEPARTMENT ID //
         $getdepart_query=mysqli_query($conn, "SELECT * FROM `department_tab` WHERE `department_name`='$Departmentname'");
         $getdepart_id=mysqli_fetch_array($getdepart_query);
         $departm_id= $getdepart_id['department_id'];

        
        // GET COURSE //

        $getcourse_query=mysqli_query($conn, "SELECT * FROM `course_tab` WHERE `level`='$Level' AND `course_title`='$Coursename'");
        $getcourse=mysqli_fetch_array($getcourse_query);
        $coursecode= $getcourse['course_code'];
        $course_level= $getcourse['level'];


        // GET STAFF ID //
        $get_staff_query=mysqli_query($conn, "SELECT * FROM `staff_tab` WHERE CONCAT(`firstname`='$choosestaff',' ',`lastname`='$choosestaff') AND staff_id!='$s_staff_id'");
        $get_staff_id=mysqli_fetch_array($get_staff_query);
        $staff_id= $get_staff_id['staff_id'];
        

        // INSERT INTO THE LECTURE TAB //
     
  mysqli_query($conn, "UPDATE lectures_tab SET `staff_id`='$staff_id',`course_code`='$coursecode',`department_id`='$departm_id',`level`='$Level' WHERE `course_code`='$coursecode'");
?>
         <script>
                 window.parent(location="../action-successful.php");
        </script>
<?php
}

?>



















        <!-- DELETE STUDENT -->
<?php
    if($action == 'delete-student'){
        $student_id= $_GET['student_id'];

        // DELETE FROM STAFF_TAB //
        mysqli_query($conn, "DELETE FROM `student_tab` WHERE student_id='$student_id'");

        $counterid = "STUDENT";
         // UPDATE THE COUNTER TAB //
         mysqli_query($conn, "UPDATE counter_tab SET counter_value=counter_value-1 WHERE counter_id='$counterid'");
?>
        <script>
            window.parent(location="../delete-success.php");
        </script>

<?php

    }
?>







<!-- UPDATE STAFF PROFILE -->
<?php
    
    if($action == 'update-profile'){
        $staff_id = $_GET['staff_id'];
        $passport = $_FILES["passport"]["name"]; 
     
        $query=mysqli_query($conn, "SELECT * FROM staff_tab WHERE email='$Email' AND `staff_id`!='$staff_id'") or die ('cannot check');
        $nums=mysqli_num_rows($query);
    
            if ($nums>0) { // check 2
              ?>
            <script>
                  alert('THE EMAIL HAD ALREADY BEEN USED!!!');
                  window.history.back();
                  </script>
            <?php }else{
                  if($passport==''){
        
        $get_statust_id_query=mysqli_query($conn, "SELECT * FROM `status_tab` WHERE `status_name`='$Status'");
        $get_status_tid=mysqli_fetch_array($get_statust_id_query);
        $status_id= $get_status_tid['status_id'];
        $status_name= $get_status_tid['status_name'];
        mysqli_query($conn, "UPDATE staff_tab SET `firstname`='$Firstname',`middlename`='$Middlename',`lastname`='$Lastname',`dob`='$Dob',`gender`='$Gender',`email`='$Email',`country`='$Country',`city`='$City',`lga`='$Lga',`residential_address`='$Residentialaddress',`role`='$Role',`status_id`='$status_id',`date`=NOW() WHERE staff_id='$staff_id '");
?>

        <script>
            window.parent(location="../update-success.php");
            window.history.back();
        </script>
<?php
} else {
                $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png");
                $extension = pathinfo($_FILES["passport"]["name"], PATHINFO_EXTENSION);
              if (in_array($extension, $allowedExts)){				 //////////array 
                  move_uploaded_file($_FILES["passport"]["tmp_name"], "../staff-picture/".$passport);
                }//////////////////end array4
            $get_statust_id_query=mysqli_query($conn, "SELECT * FROM `status_tab` WHERE `status_name`='$Status'");
            $get_status_tid=mysqli_fetch_array($get_statust_id_query);
            $status_id= $get_status_tid['status_id'];
            $status_name= $get_status_tid['status_name'];
            mysqli_query($conn, "UPDATE staff_tab SET `firstname`='$Firstname',`middlename`='$Middlename',`lastname`='$Lastname',`dob`='$Dob',`gender`='$Gender',`email`='$Email',`country`='$Country',`city`='$City',`lga`='$Lga',`residential_address`='$Residentialaddress',`role`='$Role',`status_id`='$status_id',`passport`='$passport',`date`=NOW() WHERE staff_id='$staff_id '");

    
?>
        <script>
                window.parent(location="../update-success.php");
            window.history.back();
        </script>

<?php
}
}
}
?>


<!-- UPDATE STUDENT PROFILE -->

<?php
    
    if($action == 'update-student-profile'){
        $student_id = $_GET['student_id'];
        $passport = $_FILES["passport"]["name"]; 

       
            
                    $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png");
                    $extension = pathinfo($_FILES["passport"]["name"], PATHINFO_EXTENSION);
                  if (in_array($extension, $allowedExts)){				 //////////array 
                      move_uploaded_file($_FILES["passport"]["tmp_name"], "../student-picture/".$passport);
                    }//////////////////end array4

        $getdeptid_query=mysqli_query($conn, "SELECT `department_id` FROM `department_tab` WHERE `department_name`='$Departmentname'");
        $getdeptid=mysqli_fetch_array($getdeptid_query);
        $dept_id= $getdeptid['department_id'];


        mysqli_query($conn, "UPDATE student_tab SET `firstname`='$Firstname',`middlename`='$Middlename',`lastname`='$Lastname',`dob`='$Dob',`gender`='$Gender',`email`='$Email',`country`='$Country',`state`='$State',`lga`='$Lga',`address`='$Residentialaddress',`department_id`='$dept_id',`level`='$Level',`date`=NOW() WHERE student_id='$student_id'");
?>

     
            <script>
               window.parent(location="../update-success.php");
        </script>   

            
<?php
}

?>




<?php
    
    if($action == 'ChangeStudentCourse'){

        $getdeptid_query=mysqli_query($conn, "SELECT `department_id` FROM `department_tab` WHERE `department_name`='$studentdepartment'");
        $getdeptid=mysqli_fetch_array($getdeptid_query);
        $dept_id= $getdeptid['department_id'];


        mysqli_query($conn, "UPDATE student_tab SET `department_id`='$dept_id',`level`='$studentlevel',`date`=NOW() WHERE student_id='$studentId'");
?>

        <script>
               window.parent(location="../update-success.php");
        </script>
<?php
}

?>

















<!-- REGISTER WEEK -->
<?php
    if($action == 'registerweek'){
        $coursecode = $_GET['course_code'];
        $level = $_GET['level'];
        $counterid="OOU_TOPIC";

        $counterquery=mysqli_query($conn, "SELECT counter_value+1 AS counter_value FROM counter_tab WHERE counter_id='$counterid'");
        $counterqueryfetch=mysqli_fetch_array($counterquery);

        $countervalue=$counterqueryfetch['counter_value'];
        $topic_id=$counterid."-".$countervalue;

       
        mysqli_query($conn, "INSERT INTO `week_tab`(`course_code`, `topic_id`, `week`, `topic`,`level`, `date`) VALUES ('$coursecode','$topic_id', '$week','$topic', '$level', NOW())") or die('cannot insert');

         // UPDATE THE COUNTER TAB //
         mysqli_query($conn, "UPDATE counter_tab SET counter_value='$countervalue' WHERE counter_id='$counterid'");
?>
        <script>
            window.parent(location="../action-successful.php");
        </script>
<?php
    }
?>


<!-- REGISTER PERIOD -->

<?php
  if ($action == 'register_period'){
    $topic_id = $_GET['topic_id'];
    $period = $_GET['period'];



    $uploadfile=$_FILES['videofile']['name'];
					
    $datetime=date("Ymdhis");	
    $allowedExts = array("avi", "flv", "wmv", "mov", "mp4");
    $extension = pathinfo($_FILES['videofile']['name'], PATHINFO_EXTENSION);
    if (in_array($extension, $allowedExts)){				  
        $uploadfile = $datetime.'_'.$uploadfile;
      move_uploaded_file($_FILES["videofile"]["tmp_name"], "uploaded_videos/".$uploadfile);
      $tempname = $_FILES["uploadfile"]["tmp_name"];


      $note=$_FILES['pdf']['name'];
                
      $datetime=date("Ymdhis");	
      $allowedExts = array("txt", "pdf");
      $extension = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
      if (in_array($extension, $allowedExts)){				  
        $note = $datetime.'_'.$note;
        move_uploaded_file($_FILES["pdf"]["tmp_name"], "note/".$note);
        $notetempname = $_FILES["uploadfile"]["tmp_name"];



      mysqli_query($conn, "INSERT INTO `period_tab`(`topic_id`, `period`, `summary`, `video`, `note`, `date`) VALUES 
      ('$topic_id','$per','$summary' ,'$uploadfile' ,'$note' , NOW())") or die('cannot insert');
}   
?>
        <script>
            window.parent(location="../action-successful.php");
        </script> 
<?php       
  }   
}    
?>






<?php
    if ($action == 'view-course'){
      ///  $faculty_id=$_GET['faculty_id'];

        $get_department_query=mysqli_query($conn, "SELECT * FROM `department_tab` WHERE `department_name`='$studentdepartment'");
        $get_department=mysqli_fetch_array($get_department_query);
        $dept_name= $get_department['department_id'];


            $checkdept_query=mysqli_query($conn, "SELECT * FROM `course_tab` WHERE `department_id`='$dept_name'  AND `level`='$studentlevel'");
            $checkdept=mysqli_num_rows($checkdept_query);
            
            if ($checkdept > 0){
?>
                 <script>
                    window.parent(location="../course.php?department_id=<?php echo $dept_name ?>&level=<?php echo $studentlevel ?>");
                </script> 
<?php
            }else{
?>
                <script>
                    
                    window.parent(location="../course.php?department_name=<?php echo $studentdepartment ?>&level=<?php echo $studentlevel ?>");
                </script> 
<?php
            }
?>


              
<?php
    }

?>
















<?php
    if ($action == 'checkstudent'){

        $checkcourse_query=mysqli_query($conn, "SELECT * FROM `department_tab` WHERE `department_name`='$studentdepartment'");
        $checkcourse=mysqli_fetch_array($checkcourse_query);
            $dept_name= $checkcourse['department_id'];
    
?>
                 <script>
                    window.parent(location="../student-list.php?department_id=<?php echo $dept_name ?>&level=<?php echo $studentlevel ?>");
                </script> 
       
<?php
    
}

?>












<!-- DELETE FACULTY -->
<?php
    if ($action == 'deletefaculty'){
        $faculty_id = $_GET['faculty_id'];

         // DELETE FROM STAFF_TAB //
         mysqli_query($conn, "DELETE FROM `faculty_tab` WHERE faculty_id='$faculty_id'");


         // DELETE FROM LECTURES_TAB //
         mysqli_query($conn, "DELETE FROM `department_tab` WHERE faculty_id='$faculty_id'");

         // DELETE FROM LECTURES_TAB //
         mysqli_query($conn, "DELETE FROM `course_tab` WHERE faculty_id='$faculty_id'");


        
?>
                <script>
                    window.parent(location="../delete-success.php");
                </script>
<?php
    }
?>




<!-- DELETE DEPARTMENT -->

<?php
    if ($action == 'deletedepartment'){
        $department_id = $_GET['department_id'];

         // DELETE FROM STAFF_TAB //
         mysqli_query($conn, "DELETE FROM `department_tab` WHERE department_id='$department_id'");

         // DELETE FROM LECTURES_TAB //
         mysqli_query($conn, "DELETE FROM `course_tab` WHERE department_id='$department_id'");
?>
                <script>
                   window.parent(location="../delete-success.php");
                </script>
<?php
    }
?>


<?php
    if ($action == 'watchvideo'){
        $coursecode = $_GET['coursecode'];
        $topic_id= $_GET['topic_id'];
        $period= $_GET['period'];
        $weekname= $_GET['week'];


        $getvideo_query = mysqli_query($conn, "SELECT * FROM `period_tab` WHERE topic_id='$topic_id' and period='$period' ") or die('cannot select');
        $getvideo = mysqli_fetch_array($getvideo_query);
        $video = $getvideo['video'];

?>
          <script>
               window.parent(location="../video-page.php?video=<?php echo $video ?>&co_code=<?php echo $coursecode ?>&topic=<?php echo $topic_id ?>&period=<?php echo $period ?>&week=<?php echo $weekname?>");
            </script>
<?php
    }
?>



<?php
    if ($action == 'viewnote'){
        $coursecode = $_GET['coursecode'];
        $topic_id= $_GET['topic_id'];
        $period= $_GET['period'];
        $weekname= $_GET['week'];

        $getvideo_query = mysqli_query($conn, "SELECT * FROM `period_tab` WHERE topic_id='$topic_id' and period='$period' ") or die('cannot select');
        $getvideo = mysqli_fetch_array($getvideo_query);
        $note = $getvideo['note'];

?>
          <script>
               window.parent(location="../view-notes.php?note=<?php echo $note ?>&co_code=<?php echo $coursecode ?>&topic=<?php echo $topic_id ?>&period=<?php echo $period ?>&week=<?php echo $weekname ?>");
            </script>
<?php
    }
?>

