<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<?php require_once ("connection/session-check.php") ?>
<?php
    $topic_id = $_GET['topic_id'];
   
?>

<html>
    <head>
        <title>Administrative Portal |  GAPOSA - ScreenClass</title>
        <?php include 'reference.php' ?>
        </head>

        <body>

        <div class="overall-student register-topic">
                
                <form action="connection/code.php?action=register_period&topic_id=<?php echo $topic_id ?>" method="POST" enctype="multipart/form-data">
                    <div class="login-main register-period-main animated animated zoomIn animated">
                        <h1>REGISTER WEEK</h1>
                        <p>SELECT PERIOD:</p>
                        <select name="period" id="period"required>
                            <option value="">Select Period</option>
                            <option value="Period 1">Period 1</option>
                            <option value="Period 2">Period 2</option>
                            <option value="Period 3">Period 3</option>
                            <option value="Period 4">Period 4</option>
                            <option value="Period 5">Period 5</option>
                            <option value="Period 6">Period 6</option>
                        
                        </select>
                    <label class="text-lb">Summary</label>
                    <textarea name="summary" id="summary" cols="42" rows="3" style='margin:0px auto 10px auto;'></textarea>

                    <label style="float:none;">
                       <div class="video-proper" title="Upload Video">
                        
                            <video src="" id="videoDisplay" name="videoDisplay"></video>
                        </div>
                        <input class="" name="videofile" id="videofile" onchange="showVideo(this)" type="file" style="display:none;" required>
                    </label>


                    <label style="float:none;">
                        <div class="video-proper document" title="Upload Note">
                            <i class="fa fa-file-o fa-3x"></i>
                            
                            <input class="" name="pdf" id="pdf" type="file" style="display:none;" required>
                        </div>
                    </label>


                       
                        <button name="submit_video" class="login" type="submit" onClick="_validate_inputs();"><i class="fa fa-pencil-square-o"></i> REGISTER</button>
                    </div>
                </form>
             
            </div>
   
   
        
        </body>
</html>