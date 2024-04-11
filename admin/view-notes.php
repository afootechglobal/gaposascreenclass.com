<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<?php require_once ("connection/session-check.php") ?>
<?php
  $course_code = $_GET['coursecode'];
  $top = $_GET['topic'];
  $notename = $_GET['note'];
  $weekname = $_GET['week'];

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

<?php 
   $getcoursecode_query=mysqli_query($conn, "SELECT * FROM `course_tab` WHERE `course_code`='$course_code'");
   $getcoursecode=mysqli_fetch_array($getcoursecode_query);
   $code= $getcoursecode['course_title'];

    $selecttopic_query= mysqli_query($conn, "SELECT * FROM `week_tab` WHERE`topic_id`='$top'");
    $selecttopic = mysqli_fetch_array($selecttopic_query);
    $topic = $selecttopic['topic'];

    
                                    
?>


            <div class="right-sided-div">
                <div class="bg-image-div staff-list-bg">
                    <div class="bg-cover">
                        <div class="dashboard-overall">

                            <div class="dashboard-admin-text staff-dashboard">
                                <span class="dashboard">
                                    <i class="fa fa-pencil-square-o"></i>
                                    Lectures/Note-Page/Course-title: <?php echo $code ?>/Topic: <?php echo $topic ?>/Week: <?php echo $weekname ?>
                                </span>
                                    <br/>
                                <span class="admin-portal">
                                    Administrative Portal 
                                </span>
                            </div>


                        </div>
                    </div>
                </div>

               
                <div class="staff-list-overall-div faculty-table-overall topic-overall">
                       <div class="watchvideo-div">
                           <iframe type="application/pdf" src="../connection/note/<?php echo $notename ?>" frameborder="0"></iframe>
                       </div>
                </div>   

                         
                   
               
            </div>
        </div>

           
    </body>
</html> 