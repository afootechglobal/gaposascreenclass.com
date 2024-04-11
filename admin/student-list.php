<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<?php require_once ("connection/session-check.php") ?>
<?php
 $dept_id= $_GET['department_id'];
 $department_name= $_GET['department_name'];
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
                                    <i class="fa fa-user"></i>
                                    Student list
                                </span>
                                    <br/>
                                <span class="admin-portal">
                                    Administrative Portal 
                                </span>
                            </div>
                    <?php
                            $department_query=mysqli_query($conn, "SELECT department_name FROM `department_tab` WHERE `department_id`='$dept_id'  ");
                            $depart=mysqli_fetch_array($department_query);
                            $department= $depart['department_name'];
                    ?>
                            <div class="current-time button-div">
                               <a href="student-registration.php?department_id=<?php echo $dept_id ?>&level=<?php echo $level ?>"><button> <i class="fa fa-pencil-square-o"></i> REGISTER STUDENT</button></a>
                            </div>

                            
                        </div>
                    </div>
                </div>

                
                <div class="tittle-div">

                <h4><?php echo $department_name?><?php echo strtoupper($department)  ?>  AND <?php echo $level ?> LEVEL STUDENTS </h4>
                </div>


                <div class="staff-list-overall-div">
<?php
$no=0;
    $viewlist_query=mysqli_query($conn, "SELECT * FROM `student_tab` WHERE `department_id`='$dept_id' AND `level`='$level'");
    while ($viewlist=mysqli_fetch_array($viewlist_query)){
        $no++;
        $Firstname= $viewlist['firstname'];
        $Lastname= $viewlist['lastname'];
        $student_id= $viewlist['student_id'];
        $passport= $viewlist['passport'];

?>
                   <div class="staff-list-proper">
                       <div class="passport-div">
                       <?php if ($passport!='') { ?>
                         <img src="student-picture/<?php echo $passport ?>" id="MyPassport" alt="My Picture"/>  
                     <?php } else { ?>
                        <img src="images/po.png" id="MyPassport" alt="My Picture"/>  
                     <?php } ?>
                     
                        </div>
                       <h3> <?php echo $Firstname ?>  <?php echo $Lastname ?></h3>
                       <p> Student id: <span class="staff-id"><?php echo $student_id ?></span></p>
                       <div class="buttons">
                       
                       <a href="view-student-profile-page.php?student_id=<?php echo $student_id ?>"><button class="view"> VIEW</button></a>
                       </div>
                   </div>
                   
<?php
}
    if($no==0){
?> 

        <div class="datanotfound-div">
            <p>No Record Found for <span><?php echo $department_name ?></span> and <span><?php echo $level ?> Level Student</span> </p>
        </div>
<?php 
    }
?>
                  
               </div>
                    

                   
                </div>
            </div>
        </div>
    </body>
</html>