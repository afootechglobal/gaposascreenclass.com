<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<?php require_once ("connection/session-check.php") ?>
<?php
    $course_code = $_GET['co_code'];
    $top = $_GET['topic'];
    $videoname = $_GET['video'];
    $weekname = $_GET['week'];
    $period = $_GET['period'];
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
                                    Staff Registration
                                </span>
                                    <br/>
                                <span class="admin-portal">
                                    Administrative Portal 
                                </span>
                            </div>

                            <div class="current-time button-div">
                                <a href="connection/code.php?action=viewnote&coursecode=<?php echo $course_code ?>&topic_id=<?php echo $top ?>&period=<?php echo $period ?>&week=<?php echo $weekname ?>"><button>VIEW NOTES</button></a>
                            </div>

                            
                        </div>
                    </div>
                </div>
               

            <div class="staff-list-overall-div video">
           
                <form action="connection/code.php?action=fetchvideo&topic_id=<?php echo $per ?>&period=<?php echo $period ?>" method="POST" enctype="multipart/form-data">
                       <div class="watchvideo-div">
                           <iframe src="../connection/uploaded_videos/<?php echo $videoname ?>" frameborder="0"></iframe>
                       </div>
                 


                </form>     
            </div>   

                   
               
            </div>
        </div>
    </body>
</html>