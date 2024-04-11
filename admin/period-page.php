<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<?php require_once ("connection/session-check.php") ?>
<?php
    $co_code = $_GET['course_code'];
    $topic_id = $_GET['topic_id'];
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
                                <th>Topic</th>
                                <th>Period</th>
                                <th>Summary</th>
                                <th>Action</th>
                            </tr>
<?php
         $get_period_query=mysqli_query($conn, "SELECT * FROM `period_tab` WHERE `topic_id`='$topic_id'");
       
        while ($get_period=mysqli_fetch_array($get_period_query)){
            $period = $get_period['period'];
            $summary = $get_period['summary'];
        
        $get_topic_query=mysqli_query($conn, "SELECT * FROM `week_tab` WHERE `topic_id`='$topic_id'");
        $get_topic=mysqli_fetch_array($get_topic_query);
        $topic=$get_topic['topic'];
      
        
    
?>
                            <tr>
                                <th><?php echo $topic ?></th>
                                <th><?php echo $period ?></th>
                                <th><?php echo $summary ?></th>
                                <th>
                                <a href="connection/code.php?action=watchvideo&coursecode=<?php echo $co_code ?>&topic_id=<?php echo $topic_id ?>&period=<?php echo $period ?>&week=<?php echo $weekname ?>"><button class="table-inner-btn view" title="View"><i class="fa fa-eye fa-lg"></i></button></a>
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