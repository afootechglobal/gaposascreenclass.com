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
                                    <i class="fa fa-pencil-square-o"></i>
                                    Staff Registration
                                </span>
                                    <br/>
                                <span class="admin-portal">
                                    Administrative Portal 
                                </span>
                            </div>

                            <div class="current-time button-div">
                              
                            </div>

                        </div>
                    </div>
                </div>


              

               
            <div class="staff-list-overall-div student-reg-overall-div">
               <form action="connection/code.php?action=registerstaff" method="POST" enctype="multipart/form-data">
               <label>
                        <div class="profile-pix-div" >
                                <div class="profile-img-div" alt="Upload Picture">  
                                <input type="file" id="passport" style="display:none"  name="passport" accept=".jpg,.png" onchange="Test.UpdatePreview(this);"/>
                                <img src="images/up.png" id="MyPassport" />
                                </div>
                                                        
                         </div>
                        </label>
               <fieldset class="side">
                        <legend>Personal Information</legend>
                        <div class="individual-input">
                            <label for="">First Name:</label><br/>
                            <input type="text" placeholder="First Name" name="Firstname" id="Firstname" required>
                        </div>
                        <div class="individual-input">
                            <label for="">Middle Name:</label><br/>
                            <input type="text" placeholder="Middle Name" name="Middlename" id="Middlename" >
                        </div>
                        <div class="individual-input">
                            <label for="">Last Name:</label><br/>
                            <input type="text" placeholder="Last Name" name="Lastname" id="Lastname" required>
                        </div>
                        <div class="individual-input">
                            <label for="">Date of Birth:</label><br/>
                            <input type="date" placeholder="Date of Birth" name="Dob" id="Dob" required>
                        </div>
                        <div class="individual-input">
                            <label for="">Gender:</label><br/>
                            <select name="Gender" id="Gender">
                                <option value="">SELECT GENDER</option>
                                <option value="MALE">MALE</option>
                                <option value="FEMALE">FEMALE</option>
                            </select>
                        </div>
                        <div class="individual-input">
                            <label for="">Email Address:</label><br/>
                            <input type="email" placeholder="Email Address" name="Email" id="Email" required>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Residential Information</legend>
                        <div class="individual-input" style="float:left;">
                            <label for="">Country:</label><br/>
                            <select name="Country" id="Country" required>
                                <option value="NIGERIA">NIGERIA</option>
                                
                            </select>
                        </div> 
                        <div class="individual-input">
                            <label for="">City:</label><br/>
                            <input type="text" placeholder="City" name="City" id="City" required>
                        </div>
                        <div class="individual-input">
                            <label for="">LGA:</label><br/>
                            <input type="text" placeholder="LGA" name="Lga" id="Lga" >
                        </div>
                        <div class="individual-input residential-address">
                            <label for="">Residential Address:</label><br/>
                            <input type="text" class="residential-input" placeholder="Residential Address"  name="Residentialaddress" id="Residentialaddress" required>
                        </div>
                       
                       
                    </fieldset>


                    <fieldset>
                        <legend>Professional Information</legend>
                        <div class="individual-input" style="float:left;">
                            <label for="">Department:</label><br/>
                            <select name="Departmentname" id="Departmentname" required>
                            <option value=""selected>SELECT DEPARTMENT</option>
                            <?php
                            $getdeptid_query=mysqli_query($conn, "SELECT * FROM `department_tab`");
                            while($getdeptid=mysqli_fetch_array($getdeptid_query)){
                            $dept_name= $getdeptid['department_name'];

                            ?>
                            <option value="<?php echo $dept_name ?>"><?php echo strtoupper($dept_name) ?> </option>

                            <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="individual-input" style="float:left;">
                            <label for="">Role:</label><br/>
                            <select name="Role" id="Role" required>
                                <option value="" selected>SELECT ROLE</option>
                                <option value="ADMIN">ADMIN</option>
                                <option value="LECTURER">LECTURER</option>
                                
                            </select>
                        </div>     
                        
                        


                        <div class="individual-input">
                            <label for="">Status:</label><br/>
                            <select name="Status" id="Status" >
                            <option value="" selected>SELECT STATUS</option> 
                                <option value='ACTIVE'>ACTIVE</option> 
                                <option value='SUSPENDED'>SUSPENDED</option> 
                             
                            </select>
                        </div>
                   
                    </fieldset>

                  
                <button class="submit-btn" type="submit" ><i class="fa fa-check"></i> SUBMIT</button>
                        
                </form>   



            </div>   

                   
               
            </div>
        </div>
    </body>
</html>