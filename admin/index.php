<?php include 'connection/connection.php'?>
<?php include 'connection/session.php'?>
<?php require_once ("connection/session-check.php") ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <?php require_once ("reference.php")?>
        <title>Administrative Portal | GAPOSA - ScreenClass</title>
      
    </head>
    <body>
    
            
          
        <?php include 'header.php' ?>
       
            
        <div class="dashboard-main-div">
        <?php include 'admin-reference.php' ?>

            <div class="right-sided-div">
                <div class="bg-image-div">
                    <div class="bg-cover">
                        <div class="dashboard-overall">

                            <div class="dashboard-admin-text">
                                <span class="dashboard">
                                    <i class="fa fa-dashboard"></i>
                                    Dashboard 
                                </span>
                                    <br/>
                                <span class="admin-portal">
                                    Administrative Portal 
                                </span>
                            </div>

                          
                            <div class="current-time">
                                <span class="text">
                                    Current Time
                                </span><br/>
                                <span class="time" id="datetime">
                                    <?php echo date("h:i:s") ?> <sup> <?php echo date("A") ?> </sup>
                                    </span><br/>
                                <span class="text">
                                <?php $date = date("l, dS F, Y");
				                echo $date 
                                ?>
                                </span>
                            </div>
                            <div class="user-details">
                                <div class="picture-div">
                                <img id="ImageDisplay" name="ImageDisplay" alt="Passport"
                                    <?php
                                    if ($passport == ''){
                                    ?>
                                    src="images/po.png"
                                    <?php
                                    }else{
                                    ?>
                                    src="../admin/staff-picture/<?php echo $passport ?>"
                                    <?php } ?>
                                    >
                                </div>
                               <div class="welcome-text">
                                    Welcome Back! 
                                    <h1><?php echo $lastname ?> <?php echo $firstname ?></h1>
                                    <span class="login-date"><i class="fa fa-clock"></i>
                                    Last Login Date
                                    <span> | </span> 
                                    2021-11-04 18:52:11
                                    </span>
                               </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="main-displayed-div">
                    <a href="staff-list.php"><div class="main-div-proper staffs">
                  <div class="inner-div">
                        <?php
                            $staff_count_query = mysqli_query ($conn,"SELECT * FROM `counter_tab` WHERE counter_id='STAFF'") or die ('cannot select staff table');
                            $staff_count=mysqli_fetch_array($staff_count_query);	
                            $staff=$staff_count['counter_value'];	
                         ?>
                            <i class="fa fa-user"></i>
                             <span class="number">
                        
                              <?php echo $staff ?>
                            </span><br/>
                            Staffs
                       </div>
                    </div></a>
                    <div class="main-div-proper students"  onclick="_view_student()">
                    <div class="inner-div">
                      <?php
                            $staff_count_query = mysqli_query ($conn,"SELECT * FROM `counter_tab` WHERE counter_id='STUDENT'") or die ('cannot select staff table');
                            $staff_count=mysqli_fetch_array($staff_count_query);	
                            $student=$staff_count['counter_value'];	
                         ?>
                            <i class="fa fa-users"></i>
                            <span class="number">
                            <?php echo $student ?>
                            </span><br/>`
                            Students
                       </div>
                    </div>
                    <a href="faculty-table.php"><div class="main-div-proper faculties">
                        <div class="inner-div">
                        <?php
                            $staff_count_query = mysqli_query ($conn,"SELECT * FROM `counter_tab` WHERE counter_id='FACULTY'") or die ('cannot select staff table');
                            $staff_count=mysqli_fetch_array($staff_count_query);	
                            $faculty=$staff_count['counter_value'];	
                         ?>
                            <i class="fa fa-building"></i>
                            <span class="number">
                            <?php echo $faculty ?>
                            </span><br/>
                            Faculty
                        </div>
                    </div></a>

                   <div class="main-div-proper courses" onClick="_view_course();">
                        <div class="inner-div">
                        <?php
                            $staff_count_query = mysqli_query ($conn,"SELECT * FROM `counter_tab` WHERE counter_id='COURSE'") or die ('cannot select staff table');
                            $staff_count=mysqli_fetch_array($staff_count_query);	
                            $courses=$staff_count['counter_value'];	
                         ?>
                            <i class="fa fa-book"></i>
                            <span class="number">
                            <?php echo $courses ?>
                            </span><br/>
                            Courses
                       </div>
                    </div>
                </div>
                    <div class="bookings-overall animated animated fadeIn animated">
                        <div class="bookings">
                            <div class="booking-inner">
                                <span class="booking-span">
                                    <i class="fa fa-calendar-check-o"></i>
                                    Booking
                                </span>
                                <button>0</button>
                            </div>
                        </div>

                        <div class="bookings">
                            <div class="booking-inner">
                                <span class="booking-span">
                                    <i class="fa fa-calendar-check-o"></i>
                                    Upcoming Events
                                </span>
                                <button>0</button>
                            </div>
                        </div>


                     
                                <div class="chat-div">
                            
                                <img src="../images/chat.jpeg" id="ImageDisplay" name="ImageDisplay" alt="Passport"/>
                               
                                </div>



                </div>
            </div>
        </div>

    </body>
</html>