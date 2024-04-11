<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<?php require_once ("connection/session-check.php") ?>

<?php
$get_level=$_GET['level']; 
$department_name= $_GET['department_name'];
$department_id= $_GET['department_id'];
$level= $_GET['level'];
$course_code=$_GET['course_code'];
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

    $viewlectures_query=mysqli_query($conn, "SELECT * FROM `course_tab` WHERE `level`='$get_level'");
    $viewlectures=mysqli_fetch_array($viewlectures_query);
    
        $depart_id= $viewlectures['department_id'];
        $coursecode= $viewlectures['course_code'];
        $level= $viewlectures['level'];
       


        $getcourse_code_query=mysqli_query($conn, "SELECT * FROM `course_tab` WHERE `course_code`='$coursecode' AND `level`='$level'");
        $getco_code=mysqli_fetch_array($getcourse_code_query);
        $course_title= $getco_code['course_title'];


        $depart_query=mysqli_query($conn, "SELECT * FROM `department_tab`WHERE department_id='$department_id'");
        $depart=mysqli_fetch_array($depart_query);
        $depart_name = $depart['department_name'];
       
        


        ?>
            


            <form action="connection/code.php?action=assign-course" method="POST" enctype="multipart/form-data">
            <div class="staff-list-overall-div student-reg-overall-div assign-back-div">
                <form action="connection/code.php?action=update-profile&staff_id=<?php echo $staff_id ?>" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <legend>ASSIGN COURSE FOR LECTURER</legend>

                        <div class="individual-input assign-course">
                        <label for="">DEPARTMENT:</label><br/>
                        <input type="text"  name="Departmentname" id="Departname" value="<?php echo strtoupper($depart_name )?>" readonly="" required="">
                   </div>

                        <div class="individual-input assign-course">
                        <label for="">DIPLOMA:</label><br/>
                    <input type="text"  name="Level" id="Level" value="<?php echo strtoupper($level)?>" readonly="" required="">
                   
                         </div>

                   <?php
                    $depart_course_query=mysqli_query($conn, "SELECT * FROM `course_tab` WHERE course_code='$course_code'");
                    $depart_course=mysqli_fetch_array($depart_course_query);
                    $course_name= $depart_course['course_title'];
                    ?>

                   
<div class="individual-input assign-course">
                        <label for="">COURSE TITLE:</label><br/>
                    <input type="text"  name="Coursename" id="Level" value="<?php echo strtoupper($course_name)?>" readonly="" required="">
                   
                         </div>

                    
                  

                    <div class="individual-input  assign-course " >
                     <label >STAFF NAME</label><br/>
                    <select class="co" name="choosestaff" id="choosestaff" required>
                    <option value="">SELECT STAFF</option>
                    <?php
                    $checkstaff_query=mysqli_query($conn, "SELECT * FROM `staff_tab` WHERE `staff_id` != '$s_staff_id' ORDER by firstname ASC");
                    while ($checkstaff=mysqli_fetch_array($checkstaff_query)){
                    $Firstname= $checkstaff['firstname'];
                    $Lastname= $checkstaff['lastname'];
                    $staff_id= $checkstaff['staff_id'];
                    ?>

                    <option value="<?php echo $Firstname ?>  "><?php echo $Firstname ?> <?php echo $Lastname ?> </option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
                  
               
                <div class="assign-back-div">
                <button class="submit-btn assign-btn"  style="margin-bottom:15px;" type="submit"> <i class="fa fa-check"></i> ALLOCATE</button>
                </div>
                
                    </fieldset>

                        
                   
                    </form>   
            </div>   

                   
               
            </div>
        </div>
        






    </body>
</html>