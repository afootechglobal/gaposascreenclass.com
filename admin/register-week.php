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

        <div class="overall-student register-topic">
                
                <form action="connection/code.php?action=registerweek&course_code=<?php echo $course_code ?>&level=<?php echo $level ?>" method="POST" enctype="multipart/form-data">
                    <div class="login-main animated animated zoomIn animated">
                        <h1>REGISTER WEEK</h1>
                        <p>SELECT WEEK:</p>
                        <select name="week" id="week"required>
                            <option value="">Select Week</option>
                            <option value="WEEK 1">WEEK 1</option>
                            <option value="WEEK 2">WEEK 2</option>
                            <option value="WEEK 3">WEEK 3</option>
                            <option value="WEEK 4">WEEK 4</option>
                            <option value="WEEK 5">WEEK 5</option>
                            <option value="WEEK 6">WEEK 6</option>
                            <option value="WEEK 7">WEEK 7</option>
                            <option value="WEEK 8">WEEK 8</option>
                            <option value="WEEK 9">WEEK 9</option>
                            <option value="WEEK 10">WEEK 10</option>
                            <option value="WEEK 11">WEEK 11</option>
                            <option value="WEEK 12">WEEK 12</option>
                            <option value="WEEK 13">WEEK 13</option>
                            <option value="WEEK 14">WEEK 14</option>
                            <option value="WEEK 15">WEEK 15</option>
                            <option value="WEEK 16">WEEK 16</option>
                        </select>
                    <label for="">TOPIC</label>
                    <input type="text" placeholder="Topic" name="topic" id="topic" required>
                        <div class="forgot-password">
                        <a href="lectures.php"><p><span class="resetpassword">BACK TO LECTURES</span></p></a>
                        </div>
                        <button class="login" type="submit" onClick="_validate_inputs();"><i class="fa fa-pencil-square-o"></i> REGISTER</button>
                    </div>
                </form>
             
            </div>
   
   
        
        </body>
</html>