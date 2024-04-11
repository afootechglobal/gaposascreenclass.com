<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<?php require_once ("connection/session-check.php") ?>

                    <div class="overall-student view-student" >
                        <form action="connection/code.php?action=checkstudent" method="POST" enctype="multipart/form-data">
                            
                            <div class="login-main animated animated zoomIn animated">
                                <h1>VIEW STUDENT</h1>
                                <p>DEPARTMENT:</p>
                                <select name="studentdepartment" id="studentdepartment"  required>
                                <option value="">SELECT DEPARTMENT</option>
                    <?php
                    $checkcourse_query=mysqli_query($conn, "SELECT * FROM `department_tab`");
                    while ($checkcourse=mysqli_fetch_array($checkcourse_query)){
                        $dept_name= $checkcourse['department_name'];
                    ?>
                                    <option value="<?php echo strtoupper($dept_name) ?>"><?php echo strtoupper($dept_name) ?></option>

                    <?php
                    }
                    ?>
                        </select>
                        <p>DIPLOMA:</p>
                        <select name="studentlevel" id="studentlevel" required>
                            <option>SELECT DIPLOMA</option>
                            <option value="ND 1">ND 1</option>
                            <option value="ND 2">ND 2</option>
                            <option value="HND 1">HND 1</option>
                            <option value="HND 2">HND 2</option>

                        </select>
                        <div class="forgot-password">
                        <p onclick="_hide_panel()"><span class="resetpassword">BACK TO DASHBOARD</span> </p>
                        </div>
                        <button class="login" type="submit"><i class="fa fa-eye"></i> VIEW</button>
                    </div>
                </form>
            </div>










            <div class="overall-student view-course" >
                        <form action="connection/code.php?action=view-course" method="POST" enctype="multipart/form-data">
                            
                            <div class="login-main animated animated zoomIn animated">
                                <h1>VIEW COURSE</h1>
                                <p>DEPARTMENT:</p>
                                <select name="studentdepartment" id="studentdepartment"  required>
                                <option value="">SELECT DEPARTMENT</option>
                    <?php
                    $checkcourse_query=mysqli_query($conn, "SELECT * FROM `department_tab`");
                    while ($checkcourse=mysqli_fetch_array($checkcourse_query)){
                        $dept_name= $checkcourse['department_name'];
                    ?>
                                    <option value="<?php echo strtoupper($dept_name) ?>"><?php echo strtoupper($dept_name) ?></option>

                    <?php
                    }
                    ?>
                        </select>
                        <p>DIPLOMA:</p>
                        <select name="studentlevel" id="studentlevel" required>
                            <option>SELECT DIPLOMA</option>
                            <option value="ND 1">ND 1</option>
                            <option value="ND 2">ND 2</option>
                            <option value="HND 1">HND 1</option>
                            <option value="HND 2">HND 2</option>

                        </select>
                        <div class="forgot-password">
                        <p onclick="_hide_panel()"><span class="resetpassword">BACK TO DASHBOARD</span> </p>
                        </div>
                        <button class="login" type="submit"><i class="fa fa-eye"></i> VIEW</button>
                    </div>
                </form>
            </div>



















 
            <div class="overall-student" >
                <form action="connection/code.php?action=ChangeStudentCourse" method="POST" enctype="multipart/form-data">
                    
                    <div class="login-main animated animated zoomIn animated">
                        <h1>CHANGE OF COURSE</h1>

                        </select>
                        <p>STUDENT ID NO:</p>
                        <div class="individual-input">
                            <input type="text" placeholder="Enter student ID" name="studentId" id="studentId"  required>
                        </div>



                        <p>DEPARTMENT:</p>
                        <select name="studentdepartment" id="studentdepartment" style="background:#fff;" required>
                        <option value="">SELECT DEPARTMENT</option>
                        <?php
                        $checkcourse_query=mysqli_query($conn, "SELECT * FROM `department_tab`");
                        while ($checkcourse=mysqli_fetch_array($checkcourse_query)){
                        $dept_name= $checkcourse['department_name'];
                        ?>
                        <option value="<?php echo strtoupper($dept_name) ?>"><?php echo strtoupper($dept_name) ?></option>

                        <?php
                        }
                        ?>


                        </select>
                        <p>DIPLOMA:</p>
                        <select name="studentlevel" id="studentlevel" style="background:#fff;" required>
                            <option>SELECT DIPLOMA</option>
                            <option value="ND 1">ND 1</option>
                            <option value="ND 2">ND 2</option>
                            <option value="HND 1">HND 1</option>
                            <option value="HND 2">HND 2</option>

                        </select>


                     
                        <div class="forgot-password">
                        <p onclick="_hide_panel()"><span class="resetpassword">BACK TO DASHBOARD</span> </p>
                        </div>
                        <button class="login" type="submit"><i class="fa fa-check"></i> CHANGE COURSE</button>
                    </div>
                </form>
            </div>
         
   
 
   <header class="animated animated fadeInDown animated">
                <div class="header-div-inner">
                <a href="index.php"><div class="logo-div"><img src="../images/gaposa_logo.png" alt="OOU IMAGE"></div></a>
                        <a href="index.php"><h1>ScreenClass</h1></a>

                        <ul  id="myDIV">
                        
                            <a href="index.php"><li class="click_to active" ><i class="fa fa-dashboard"></i> Dashboard</li></a>
                            <a href="myprofile.php"><li class="click_to " ><i class="fa fa-user-circle"></i> My Profile</li></a>
  
                        </ul>

                        <a href="../connection/code.php?action=logout"><button class="login-btn"><i class="fa fa-lock"></i> Log-Out</button></a>
              
                    </div>
        </header>
<script>

</script>


      
   