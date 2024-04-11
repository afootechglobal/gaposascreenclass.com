<?php 
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
header("Acces-Contorl-Allow-Origin");/// to call API and clear the error from web-page
   

    // Database Configuration //
    $main_server = "localhost";
    $server_username = "root";
    $server_password = "";

    // Create Connection //
    $conn = mysqli_connect($main_server, $server_username, $server_password) or die("connection error");
    mysqli_select_db($conn, "gaposa_screenclass_db");
?>


<?php 

    // variable declaration  //


    $Firstname=strtoupper(trim($_POST['Firstname']));
    $Middlename=strtoupper(trim($_POST['Middlename']));
    $Lastname=strtoupper(trim($_POST['Lastname']));
    $Email=trim($_POST['Email']);
    $Phonenumber=trim($_POST['Phonenumber']);
    $Country=strtoupper(trim($_POST['Country']));
    $Gender=strtoupper(trim($_POST['Gender']));
    $Dob=trim($_POST['Dob']);    
    $City=strtoupper(trim($_POST['City']));
    $State=strtoupper(trim($_POST['State']));///
    $Lga=trim($_POST['Lga']);
    $Residentialaddress=strtoupper(trim($_POST['Residentialaddress']));
    $Role=strtoupper(trim($_POST['Role']));
    $Status=trim($_POST['Status']);
    $State=trim($_POST['State']);
    $studentId=trim($_POST['studentId']);
    $passport=(trim($_POST['passport']));
   
    $staffID=trim($_POST['staffID']);
    $Level=strtoupper(trim($_POST['Level']));
    $Faculty=strtoupper(trim($_POST['Faculty']));
    $Departmentname=strtoupper(trim($_POST['Departmentname']));
    $Coursename=trim($_POST['Coursename']);
    $Coursecode=trim($_POST['Coursecode']);
    $Selectlevel=strtoupper(trim($_POST['Selectlevel']));
    $facultyname=strtoupper(trim($_POST['facultyname']));

    $selectstaff=strtoupper(trim($_POST['selectstaff']));
    $choosestaff=strtoupper(trim($_POST['choosestaff']));
    $topic=strtoupper(trim($_POST['topic']));
    $week=strtoupper(trim($_POST['week']));
    $period=strtoupper(trim($_POST['period']));///
    $summary=strtoupper(trim($_POST['summary']));
    $lev=strtoupper(trim($_POST['lev']));
    $studentlevel=strtoupper(trim($_POST['studentlevel']));
    $studentdepartment=strtoupper(trim($_POST['studentdepartment']));


    $oldfacultyname=trim($_POST['oldfacultyname']);
    $newfacultyname=trim($_POST['newfacultyname']);


    $oldcoursecode=trim($_POST['oldcoursecode']);
    $oldcoursename=trim($_POST['oldcoursename']);

    $newcoursecode=trim($_POST['newcoursecode']);
    $newcoursename=trim($_POST['newcoursename']);

?>