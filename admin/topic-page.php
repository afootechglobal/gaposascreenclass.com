<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<?php require_once ("connection/session-check.php") ?>
<?php
    $course_code = $_GET['course_code'];
    $level = $_GET['level'];
?>
<html>
    <head>
    <title>Administrative Portal | GAPOSA - ScreenClass</title>
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
                                    Lectures
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
                        <table class="topic-table">
                            <tr>
                                <th>Week</th>
                                <th class="topic">Topic
                                </th>
                                <th>Action</th>
                            </tr>
<?php
        
        $getweek_query=mysqli_query($conn, "SELECT * FROM `week_tab` WHERE `course_code`='$course_code' ORDER by week ASC");
        while ($getweek=mysqli_fetch_array($getweek_query)){
        $week=$getweek['week'];
        $topic=$getweek['topic'];
        $topic_id=$getweek['topic_id'];
        
      
        
    
?>
                            <tr>
                                <th><?php echo $week ?></th>
                                <th><?php echo $topic ?></th>
                                <th>
                                <a href="period-page.php?topic_id=<?php echo $topic_id ?>&course_code=<?php echo $course_code ?>&week=<?php echo $week?>"><button class="table-inner-btn view" title="View"><i class="fa fa-eye fa-lg"></i></button>
                                    <button class="table-inner-btn delete"  title="Delete"><i class="fa fa-trash fa-lg"></i></button>
                                    <button class="table-inner-btn edit"  title="Edit"><i class="fa fa-edit fa-lg"></i></button>
                                </th>
<?php
}
?>
                            </tr>
                        </table>
                </div>   


    
                         
                   
               
            </div>
        </div>

           
    </body>
</html> 