<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<?php require_once ("connection/session-check.php") ?>
<?php
$faculty= $_GET['faculty_id'];
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
                                    Faculty
                                </span>
                                    <br/>
                                <span class="admin-portal">
                                    Administrative Portal 
                                </span>
                            </div>

                            <div class="current-time button-div">
                                <button onClick="_add_panel();">ADD FACULTY</button>
                            </div>

                            
                        </div>
                    </div>
                </div>

               
            <div class="staff-list-overall-div student-reg-overall-div faculty-table-overall">

       
                   <table style="">
                       <tr>
                           <th>S/N</th>
                           <th>FACULTY NAME</th>
                           <th>NUMBER OF DEPARTMENTS</th>
                           <th>VIEW</th>
                           <th>EDIT</th>
                           <th>DELETE</th>
                       </tr>
<?php
        $sn=0;
        $no=0;
        $getfaculty_query=mysqli_query($conn, "SELECT * FROM `faculty_tab`");
        while ($getfaculty=mysqli_fetch_array($getfaculty_query)){
            $no++;
        $sn++;
        $facultyname=$getfaculty['faculty_name'];
        $faculty_id=$getfaculty['faculty_id'];

        $numofdept_query=mysqli_query($conn, "SELECT * FROM `department_tab` WHERE `faculty_id`='$faculty_id'");
        $getdepart=mysqli_fetch_array($getdepart_query);
        $department_id=$getdepart['department_id'];
        $numofdept= mysqli_num_rows($numofdept_query);
      

    
        
    
?>


                       <tr>
                           <th><?php echo $sn ?> </th>
                           <th class="row"> <?php echo strtoupper($facultyname) ?> </th>
                           <th class="row"> <?php echo strtoupper($numofdept) ?> </th>

                          
                           <th class="row">
                           <a href="department-table.php?faculty_id=<?php echo $faculty_id ?>"><button class="table-inner-btn view" title="View"><i class="fa fa-eye fa-lg"></i></button></a>
                             </th>

                             <th class="row">
                               <button class="table-inner-btn edit" onClick="_edit_panel();" title="Edit"><i class="fa fa-edit fa-lg"></i></button>
                               </th>
                               <th class="row">
                               <a href="connection/code.php?action=deletefaculty&faculty_id=<?php echo $faculty_id ?>">
                                <button class="table-inner-btn delete" onClick="return confirm('ARE YOU SURE YOU WANT TO DELETE FACULTY?!!!')" title="Delete"><i class="fa fa-trash fa-lg"></i></button></a>
                             </th>

                          </tr>
                    <?php
                    }

                    ?> 
                            <th>S/N</th>
                           <th>FACULTY NAME</th>
                           <th>NUMBER OF DEPARTMENTS</th>
                           <th>VIEW</th>
                           <th>EDIT</th>
                           <th>DELETE</th>
                       </table>   

        <?php
        if($no==0){
        ?> 

        <div class="datanotfound-div">
        <p>No Record Found </span> </p>
        </div>
        <?php 
        }
        ?>



                   
            </div>   

                   
               
            </div>

        </div>


        <form action="connection/code.php?action=registerfaculty" method="POST" enctype="multipart/form-data">

            <div class="add-faculty-overall">
                <div class="add-faculty-main">
                    <h1>ADD FACULTY</h1>
                    <label>Faculty Name</label><br/>
                    <input type="text" placeholder="Faculty Name" name="facultyname" id="facultyname" required>
                    <button class="add"  type="submit"> <i class="fa fa-plus"></i> ADD</button>
                    <button class="add" type="button" onClick="_hide_panel();"> <i class="fa fa-close"></i> CLOSE</button>
                </div>
            </div>
        </form>



<form action="connection/code.php?action=update-faculty" method="POST" enctype="multipart/form-data">

<div class="add-faculty-overall faculty-back">
    <div class="add-faculty-main faculty-div-in">
        <h1>EDIT FACULTY</h1>
        <label>Old Faculty Name</label><br/>
        <input type="text" placeholder="Old Faculty" name="oldfacultyname" id="oldfacultyname" required>
        <label>New Faculty Name</label><br/>
        <input type="text" placeholder="New Faculty" name="newfacultyname" id="newfacultyname" required>
        <button class="add"  type="submit"> <i class="fa fa-exchange"></i> CHANGE</button>
        <button class="add" type="button" onClick="_hide_panel();"> <i class="fa fa-close"></i> CLOSE</button>
    </div>
</div>
</form>




    </body>
</html>