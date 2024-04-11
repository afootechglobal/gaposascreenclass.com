/////////////////23/12/2021//////////// by Afolabi Taiwo
$(function() {
    Test = {
       UpdatePreview: function(obj){
          if (!window.FileReader){
             // do nothing
          }else{
    
         
          var reader= new FileReader();
          var target= null;
          reader.onload = function(e){
             target = e.target || e.srcElement;
          $('#MyPassport').prop("src", target.result);
          };
                reader.readAsDataURL(obj.files[0]);
       }
    }
    };
    });



    $(document).ready(function() {
        setInterval(function(){ _get_PHP_current_time() }, 1000);
      });
      
      function _get_PHP_current_time(){
       $.ajax({
           url: "connection/code.php?action=date_time",
           success: function(html){
            $("#datetime").html(html);
          }});
      }








        // Add active class to the current button (highlight it)
        var header = document.getElementById("myDIV");
        var click = header.getElementsByClassName("click_to");
        for (var i = 0; i < click.length; i++) {
            click[i].addEventListener("click", function() {
          var current = document.getElementsByClassName("active");
          current[0].className = current[0].className.replace(" active", "active");
          this.className += " active";
          });
        }












    function displayImage(image){
        if (image.files[0]) {
            var reader = new FileReader();
            reader.onload= function(image){
                document.querySelector('#ImageDisplay').setAttribute('src', image.target.result);
            }
            reader.readAsDataURL( image.files[0]);
        }
    }
    
    function triggerClick(){
        document.querySelector('#ImageSelector').click();
    }

    
    
    
    
    



function _next_page(next_id) {
    $('.next-div').hide();
    $('#'+next_id).fadeIn(1000);
}


function _add_panel() {
  
    $('.add-faculty-overall').animate({'margin-top':'0%'},100);
    $('.add-faculty-main').animate({'margin-top':'0px'},500);

    $('.alert-back-div').animate({'margin-top':'-100%'},100);
    $('.alert-div').animate({'margin-top':'0px'},100);


    $('.get-back-level').animate({'margin-top':'-100%'},100);
    $('.get-level').animate({'margin-top':'0px'},500);

    $('.faculty-back').animate({'margin-top':'-100%'},100);
    $('.faculty-div-in').animate({'margin-top':'0px'},500);
    
    $('.edit-assign-div').animate({'margin-top':'-100%'},100);
    $('.edit-div').animate({'margin-top':'0px'},500);

  
   
}

function _hide_panel() {
    $('.add-faculty-overall').animate({'margin-top':'-100%'},1000);
    $('.add-faculty-main').animate({'margin-top':'-250px'},600);
    $('.overall-student').animate({'margin-left':'-100%'},1000);
}

function _edit_panel(){
    $('.faculty-back').animate({'margin-top':'-1.1%'},100);
    $('.faculty-div-in').animate({'margin-top':'0px'},500);

    $('.edit-assign-div').animate({'margin-top':'-1.1%'},100);
    $('.edit-div').animate({'margin-top':'0px'},500);

}

function _delete_panel(){
    $('.alert-back-div').animate({'margin-top':'-1.1%'},100);
    $('.alert-div').animate({'margin-top':'0px'},500);


}







function _get_panel() {
    $('.get-back-level').animate({'margin-top':'-1.1%'},100);
    $('.get-level').animate({'margin-top':'0px'},500);
}


function _view_student() {
    $('.overall-student').animate({'margin-left':'-1000%'},100);
    $('.view-student').animate({'margin-left':'0%'},100);

}

function _view_course() {
    $('.view-course').animate({'margin-left':'0%'},100);
}

function _get_change_of_course() {
    $('.overall-student').animate({'margin-left':'0%'},100);
    $('.view-student').animate({'margin-left':'-1000%'},100);
}










function _validate_inputs(){
    var message = 'Fill in the necessary fields to continue';

    var Firstname= $('#firstname').val(); 
    var Middlename= $('#middlename').val();
    var Lastname= $('#lastname').val();
    var Age= $('#age').val();
    var Gender= $('#gender').val();
    var Email= $('#email').val();
    var Country= $('#country').val();
    var City= $('#city').val();
    var Lga= $('#lga').val();
    var Residentialaddress= $('#residentialaddress').val();
    var Department= $('#department').val();
    var Role= $('#role').val(); 
    var Level= $('#level').val(); 
    var facultyname= $('#facultyname').val();
    var departmentname= $('#departmentname').val();
    var coursecode= $('#coursecode').val();
    var coursename= $('#coursename').val();
    var selectstaff= $('#selectstaff').val();
    var picklevel= $('#picklevel').val();
    var selectlevel= $('#selectlevel').val();
    var choosestaff= $('#choosestaff').val();
    var week= $('#week').val();
    var topic= $('#topic').val();
    var period= $('#period').val();
    var summary= $('#summary').val();


    if( (Firstname=='') || (Middlename=='') || (Lastname=='') || (Age=='') || (Gender=='') || (Email=='') ||
    (Country=='') || (City=='') || (Lga=='') || (Residentialaddress=='') || (Department=='') 
    || (Role=='') || (Level=='') || (departmentname =='')  ){
        alert(message);
    }
}


















// VIDEO SCRIPT //
function showVideo(video) {
    if (video.files[0]){
        var reader = new FileReader();

        reader.onload = function(video) {
            document.querySelector('#videoDisplay').setAttribute('src', video.target.result);
        }
        reader.readAsDataURL(video.files[0]);
    }
}


function _expand_link(divid){
	$('#'+divid).toggle(500);
}
