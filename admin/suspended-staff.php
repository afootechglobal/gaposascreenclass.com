<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<?php require_once ("connection/session-check.php") ?>
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
                                    Staff list
                                </span>
                                    <br/>
                                <span class="admin-portal">
                                    Administrative Portal 
                                </span>
                            </div>

                            <div class="current-time button-div">
                               <a href="staff-registration.php"><button> <i class="fa fa-pencil-square-o"></i> REGISTER STAFF</button></a>
                            </div>

                            
                        </div>
                    </div>
                </div>


                <div class="tittle-div">
                    <h4>SUSPENDED STAFF</h4>
                </div>

   

               <div class="staff-list-overall-div">
            
<?php
$no=0;
    $viewlist_query=mysqli_query($conn, "SELECT * FROM `staff_tab` WHERE staff_id!='$s_staff_id' AND status_id='SUSP'");
    while ($viewlist=mysqli_fetch_array($viewlist_query)){
        $no++;
        $Firstname= $viewlist['firstname'];
        $Lastname= $viewlist['lastname'];
        $staff_id=$viewlist['staff_id'];
      

?>
                    <?php
                        $staff_status_query=mysqli_query($conn, "SELECT `status_name` FROM `status_tab`, `staff_tab`  WHERE status_tab.status_id =staff_tab.status_id AND staff_tab.staff_id='$staff_id'") or die('cannot select staff status');
                        $staff_status=mysqli_fetch_array($staff_status_query);
                        $status= $staff_status['status_name'];
                    ?>

                   <div class="staff-list-proper">
                       <div class="passport-div">
                           <img src="images/images (10).jpeg" alt="">
                       </div>
                       <h3> <?php echo $Firstname ?>  <?php echo $Lastname ?></h3>
                       <p> STAFF ID: <span class="staff-id"><?php echo $staff_id ?></span></p>
                       <p> STATUS: <span class="staff-id"><?php echo $status ?></span></p>
                       <div class="buttons">
                       
                           <a href="view-staff-profile-page.php?staff_id=<?php echo $staff_id ?>"><button class="view"> VIEW</button></a>
                       </div>
                   </div>
                   
                   
<?php
  } 
  ?>    
         


        <?php if ($no==0){?>
            <div class="datanotfound-div"><p>No Record Found for <span>STAFF</span> </p></div>
        <?php
        }
        ?>


                  
               </div>
                    

            
                </div>
            </div>

     
        </div>

    </body>
</html>