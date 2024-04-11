<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<?php require_once ("connection/session-check.php") ?>
<?php
 $faculty_id= $_GET['faculty_id'];
 $department_id= $_GET['department_id'];
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
                                    <i class="fa fa-pencil-square-o"></i>
                                    <?php
                                     $getfac_name_query=mysqli_query($conn, "SELECT * FROM `faculty_tab` WHERE `faculty_id`='$faculty_id'");
                                     $getfac_name=mysqli_fetch_array($getfac_name_query);
                                     $fac_name=$getfac_name['faculty_name'];
                                
                                     
                                     
                                     $getdept_name_query=mysqli_query($conn, "SELECT * FROM `department_tab` WHERE `department_id`='$department_id'");
                                     $getdept_name=mysqli_fetch_array($getdept_name_query);
                                     $dept_name=$getdept_name['department_name'];
                                     echo $fac_name."/".$dept_name. " DEPARTMENT"
                                    ?>

                                </span>
                                    <br/>
                                <span class="admin-portal">
                                    Administrative Portal 
                                </span>
                            </div>

                            <div class="current-time button-div">
                              <button onClick="_add_panel();">ADD COURSE</button>
                            </div>

                            
                        </div>
                    </div>
                </div>

               
            <div class="staff-list-overall-div student-reg-overall-div faculty-table-overall">
                <form action="">
                   <table style="">
                       <tr>
                    
                            <th>S/N</th>
                            <th>COURSE CODE</th>
                            <th>COURSE TITLE</th>
                            <th> DIPLOMA</th>
                            <th>EDIT</th>
                         

                       </tr>
<?php
        $no=0;
        $sn=0;
        $getcourse_query=mysqli_query($conn, "SELECT * FROM `course_tab` WHERE `department_id`='$department_id' AND faculty_id='$faculty_id' ORDER BY `level` ASC");
        while ($getcourse=mysqli_fetch_array($getcourse_query)){
        $sn++;
        $no++;
        $coursetitle=$getcourse['course_title'];
        $coursecode=$getcourse['course_code'];
        $course_level=$getcourse['level'];


        $getlectid_query=mysqli_query($conn, "SELECT * FROM `lectures_tab` WHERE `course_code`='$coursecode'");
        $getlectid=mysqli_fetch_array($getlectid_query);
        $lectid= $getlectid['staff_id'];
         //  $level= $getlectid['level'];

        $getlectname_query=mysqli_query($conn, "SELECT * FROM `staff_tab` WHERE `staff_id`='$lectid'");
        $getlectname=mysqli_fetch_array($getlectname_query);
        $staff_id= $getlectname['staff_id'];
        $passport = $getlectname['passport'];
        $lectrer_departm_id = $getlectname['department_id'];
        ?>

                        <tr>
                            <th class="row"> <?php echo $sn ?> </th>
                            <th class="row"> <?php echo strtoupper($coursecode) ?> </th>
                            <th class="row"> <?php echo strtoupper($coursetitle) ?> </th>
                            <th class="row"> <?php echo strtoupper($course_level) ?> </th>
                            <th class="row">
                            <button class="table-inner-btn edit" onClick="_edit_panel();" type="button" title="Edit"><i class="fa fa-edit fa-lg"></i></button>
                            </th> 
                        
                        </tr>
                        
                        <?php
                        }
                        ?>
                            <th>S/N</th>
                            <th>COURSE CODE</th>
                            <th>COURSE TITLE</th>
                            <th> DIPLOMA</th>
                            <th>EDIT</th>
                            
                            
                   </table>
                </form> 
<?php    
                if($no==0){
?> 

        <div class="datanotfound-div">
            <p>No Record Found </span> </p>
        </div>
<?php 
    }
?>
            </div>   

                   
               
            </div>
        </div>



        

    <form action="connection/code.php?action=registercourse&department_id=<?php echo $department_id ?>&faculty_id=<?php echo $faculty_id ?>" method="POST" enctype="multipart/form-data">
        <div class="add-faculty-overall add-course-overall">
            <div class="add-faculty-main">
                <h1>ADD COURSE</h1>

                <label>Course Code</label><br/>
                <input type="text" placeholder="Course Code" name="Coursecode" id="Coursecode" required>
               


                <label>Course Title</label><br/>
                <input type="text" placeholder="Course Title" name="Coursename" id="Coursename" required>

                
                <label for="">DIPLOMA:</label><br/>
                            <select name="Level" id="level">
   
                                <option value="Select Diploma" selected>Select Diploma</option>
                                
                                <option value="ND 1">ND 1</option>
                                <option value="ND 2">ND 2</option>
                                <option value="HND 1">HND 1</option>
                                <option value="HND 2">HND 2</option>
                                
                            </select>
    
                <button class="add" style="margin-bottom: 15px;"> <i class="fa fa-plus"></i> ADD</button>
                <button class="add" onClick="_hide_panel();"> <i class="fa fa-close"></i> CLOSE</button>
            </div>
        </div>
    </form>






            <form action="connection/code.php?action=update-course" method="POST" enctype="multipart/form-data">

                <div class="add-faculty-overall faculty-back">
                <div class="add-faculty-main faculty-div-in ">
                <h1>EDIT COURSE</h1>
                <label>Old Course Code</label><br/>
                <input type="text" placeholder="Old Course Code" name="oldcoursecode" id="oldcoursecode" required>
                <label>Old Course Name</label><br/>
                <input type="text" placeholder="Old Course Name" name="oldcoursename" id="oldcoursename" required>
              
                <label>New Course Code</label><br/>
                <input type="text" placeholder="Old Course Code" name="newcoursecode" id="newcoursecode" required>
                <label>New Course Name</label><br/>
                <input type="text" placeholder="New Course Name" name="newcoursename" id="newcoursename" required>
                
        
                
                
                
                <button class="add"  type="submit"> <i class="fa fa-exchange"></i> CHANGE</button>
                <button class="add" onClick="_hide_panel();"> <i class="fa fa-close"></i> CLOSE</button>
                </div>
                </div>
            </form>










    </body>
</html>