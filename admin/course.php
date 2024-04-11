<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<?php require_once ("connection/session-check.php") ?>
<?php
 $get_level=$_GET['level']; 
$dept_id= $_GET['department_id'];
$level= $_GET['level'];
$department_name= $_GET['department_name'];

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
        
        
                                <i class="fa fa-pencil-square-o"></i>
                                    Courses
                                </span>
                                    <br/>
                                <span class="admin-portal">
                                    Administrative Portal 
                                </span>
                            </div>

                          

                            
                        </div>
                    </div>
                </div>
                <?php
                $department_query=mysqli_query($conn, "SELECT department_name FROM `department_tab` WHERE `department_id`='$dept_id'  ");
                $depart=mysqli_fetch_array($department_query);
                $department= $depart['department_name'];
                ?>
                <div class="tittle-div">

                <h4><?php echo strtoupper($department)  ?><?php echo strtoupper($department_name)  ?>  AND <?php echo $level ?> LEVEL COURSES </h4>
                </div>

             



<div class="staff-list-overall-div student-reg-overall-div faculty-table-overall">

       
<table style="margin-top:20px">
    <tr>
        <th>S/N</th>
        <th>COURSE CODE</th>
        <th>COURSE TITLE</th>
        <th>COURSE DIPLOMA</th>
        <th>COURSE DEPARTMENT</th>
        <th>LECTURER-IN-CHARGE</th>
        <th>ALLOCATE COURSE</th>
       
    </tr>
<?php
$sn=0;
$no=0;
    $viewlectures_query=mysqli_query($conn, "SELECT * FROM `course_tab` WHERE `level`='$get_level' AND department_id='$dept_id' ");
    while ($viewlectures=mysqli_fetch_array($viewlectures_query)){
        $sn++;
        $no++;
        $depart_id= $viewlectures['department_id'];
        $coursecode= $viewlectures['course_code'];
        $level= $viewlectures['level'];
        $faculty_id= $viewlectures['faculty_id'];
       


        $getcourse_code_query=mysqli_query($conn, "SELECT * FROM `course_tab` WHERE `course_code`='$coursecode' AND `level`='$get_level'");
        $getco_code=mysqli_fetch_array($getcourse_code_query);
        $course_title= $getco_code['course_title'];
        $dapart = $getco_code['department_id'];

        $depart_query=mysqli_query($conn, "SELECT * FROM `department_tab` WHERE department_id='$dapart' ");
        $depart=mysqli_fetch_array($depart_query);
        $depart_name = $depart['department_name'];
       
        $course_query=mysqli_query($conn, "SELECT * FROM `staff_tab`, lectures_tab WHERE staff_tab.staff_id=lectures_tab.staff_id AND lectures_tab.course_code='$coursecode'");
        $course_c=mysqli_fetch_array($course_query);
        $firstname = $course_c['firstname'];
        $lastname = $course_c['lastname'];
       


        ?>
            







    <tr>
        <th class="row"><?php echo $sn ?> </th>
        <th class="row"><?php echo strtoupper($coursecode) ?> </th>
        <th class="row"><?php echo strtoupper($course_title) ?></th>
        <th class="row"><?php echo strtoupper($level) ?></th>
        <th class="row"><?php echo strtoupper($depart_name)  ?></th>
        <th class="row"><?php echo strtoupper($firstname)  ?> <?php echo strtoupper($lastname)  ?></th>
        
        <th class="row"><a href="assign-course.php?department_id=<?php echo $dept_id?>&level=<?php echo $level ?>&course_code=<?php echo $coursecode ?>"><button class=" row-btn" >ALLOCATE</button></a></th>
       
        <!-- <a href="assign-course.php?department_id=<?php// echo $dept_id ?>&level=<?php //echo $level?>"></a> -->
     
    </tr>
<?php
}

   
?> 
        <th>S/N</th>
        <th>COURSE CODE</th>
        <th>COURSE TITLE</th>
        <th>COURSE DIPLOMA</th>
        <th>COURSE DEPARTMENT</th>
        <th>LECTURER-IN-CHARGE</th>
        <th>ALLOCATE COURSE</th>

      
       
 
</table> 
<?php
if($no==0){
?> 

        <div class="datanotfound-div">
            <p>No Record Found for <span><?php echo $level ?> Level Courses</span> </p>
        </div>
<?php 
    }
?>
  
</div>   






                       
             </div>   


    
                         
                   
               
            </div>

     



        <form action="connection/code.php?action=assign-course" method="POST" enctype="multipart/form-data">

                    <div class="add-faculty-overall assign-div">
                    <div class="add-faculty-main">
                    <h1>ASSIGN COURSE</h1>

                    <label for="">DEPARTMENT:</label><br/>
                    <input type="text"  name="Departmentname" id="Departname"  value="<?php echo strtoupper($depart_name )?>" readonly="" required="">
                   
                    <label for="">DIPLOMA:</label><br/>
                    <input type="text"  name="Level" id="Level" value="<?php echo strtoupper($level)?>" readonly="" required="">
                   
                    <label >COURSE TITLE:</label><br/>
                    <select name="Coursename" id="Coursename" required>
                    <option value="SELECT COURSE TITLE" selected>SELECT COURSE TITLE </option>
                   <?php
                    $depart_course_query=mysqli_query($conn, "SELECT * FROM `course_tab` WHERE `level`='$level' AND department_id='$dept_id'");
                    while ($depart_course=mysqli_fetch_array($depart_course_query)){
                    $course_name= $depart_course['course_title'];
                    ?>

                    <option value="<?php echo strtoupper($course_name) ?>"><?php echo strtoupper($course_name) ?></option>
                    <?php   
                    }
                    ?>
                    </select>

                    <label>STAFF NAME</label><br/>
                    <select name="choosestaff" id="choosestaff" required>
                    <option value="">SELECT STAFF</option>
                    <?php
                    $checkstaff_query=mysqli_query($conn, "SELECT * FROM `staff_tab` WHERE `staff_id` != '$s_staff_id' ORDER by firstname ASC");
                    while ($checkstaff=mysqli_fetch_array($checkstaff_query)){
                    $Firstname= $checkstaff['firstname'];
                    $Lastname= $checkstaff['lastname'];
                    $staff_id= $checkstaff['staff_id'];
                    ?>

                    <option value="<?php echo $Firstname ?>"><?php echo $Firstname ?> <?php echo $Lastname ?> </option>
                    <?php
                    }
                    ?>
                    </select>
                  
                    <button class="add" onClick="_validate_inputs();" style="margin-bottom:15px;" type="submit"> <i class="fa fa-plus"></i> ADD</button>
                    <button class="add" type="button" onClick="_hide_panel();"> <i class="fa fa-close"></i> CLOSE</button>
                    </div>
                    </div>
                    </form>










                        
                <form action="connection/code.php?action=edit-course&staff_id=<?php echo $staff_id?>" method="POST" enctype="multipart/form-data">

                <div class="add-faculty-overall edit-assign-div">
                <div class="add-faculty-main edit-div">
                <h1>EDIT ASSIGN COURSE</h1>

                <label for="">DEPARTMENT:</label><br/>
                <input type="text"  name="Departmentname" id="Departname"  value="<?php echo strtoupper($depart_name )?>" readonly="" required="">

                <label for="">DIPLOMA:</label><br/>
                <input type="text"  name="Level" id="Level" value="<?php echo strtoupper($level)?>" readonly="" required="">

                <label >COURSE TITLE:</label><br/>
                <select name="Coursename" id="Coursename" required>
                <option value="SELECT COURSE TITLE" selected>SELECT COURSE TITLE </option>
                <?php
                $depart_course_query=mysqli_query($conn, "SELECT * FROM `course_tab` WHERE `level`='$level' AND department_id='$dept_id'");
                while ($depart_course=mysqli_fetch_array($depart_course_query)){
                $course_name= $depart_course['course_title'];
                ?>

                <option value="<?php echo strtoupper($course_name) ?>"><?php echo strtoupper($course_name) ?></option>
                <?php   
                }
                ?>
                </select>

                <label>STAFF NAME</label><br/>
                <select name="choosestaff" id="choosestaff" required>
                <option value="">SELECT STAFF</option>
                <?php
                $checkstaff_query=mysqli_query($conn, "SELECT * FROM `staff_tab` WHERE `staff_id` != '$s_staff_id' ORDER by firstname ASC");
                while ($checkstaff=mysqli_fetch_array($checkstaff_query)){
                $Firstname= $checkstaff['firstname'];
                $Lastname= $checkstaff['lastname'];
                $staff_id= $checkstaff['staff_id'];
                ?>

                <option value="<?php echo $Firstname ?> "><?php echo $Firstname ?> <?php echo $Lastname ?> </option>
                <?php
                }
                ?>
                </select>

                <button class="add" onClick="_validate_inputs();" style="margin-bottom:15px;" type="submit"> <i class="fa fa-plus"></i> ADD</button>
                <button class="add" type="button" onClick="_hide_panel();"> <i class="fa fa-close"></i> CLOSE</button>
                </div>
                </div>
                </form>











    </body>
</html> 