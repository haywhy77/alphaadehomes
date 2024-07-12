<?php 

include("header.php");
 
 $identity = $_GET['mixhtyr12noitcudorpobguhtennek007'];
 

if (isset($_POST['submit'])) 
{
    $target_path = "uploads/presidents/";     // Declaring Path for uploaded images.

    $image_filenames = '';


  //  for ($i = 0; $i < count($_FILES['file']['name']); $i++) 
    

        // Loop to get individual element from the array
        $validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
        $ext = explode('.', basename($_FILES['file']['name']));   // Explode file name from dot(.)
        $file_extension = end($ext); // Store extensions in the variable.
        $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];   
        // Set the target path with a new name of image.



     //   $j = $j + 1;      // Increment the number of uploaded images according to the files in array.

        if (($_FILES["file"]["size"] < 3072000) && in_array($file_extension, $validextensions)) 
        {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path))
            {
                $image_filenames = $target_path.$image_filenames;   


                $sql = "UPDATE presidents SET  images='{$image_filenames}' WHERE id='{$identity}'";

                if(mysqli_query($conn,$sql))
                {   
                    $msg_good = "Picture updated successfully...";

                }
                else{ $msg_bad ="There was an error updating picture";  }

                
            }
            else { echo $msg_bad = '<span id="error">Invalid file type, please try again!.</span><br/><br/>'; }
        } 
        else { echo  $msg_bad = '<span id="error">***Invalid file Size or Type***</span><br/><br/>';}

    }



?>

<script type="text/javascript">
$(document).ready(function(){    
    //Check if the current URL contains '#'
    if(document.URL.indexOf("#")==-1){
        // Set the URL to whatever it was plus "#".
        url = document.URL+"#";
        location = "#";

        //Reload the page
        location.reload(true);
    }
});
</script>



<style type="text/css">
  /* The alert message box */
.alertx {
    padding: 20px;
    background-color: #0091ff; /* Red */
    color: white; 
    text-align: center;
    z-index: 999;
    position: absolute;
    left: 5px;
    bottom: 5px;
}

/* The close button */
.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
    color: black;
}
.alertx {
    opacity: 1;
    transition: opacity 0.6s; /* 600ms to fade out */
}
</style>

<script>
// Get all elements with class="closebtn"
var close = document.getElementsByClassName("closebtn");
var i;

// Loop through all close buttons
for (i = 0; i < close.length; i++) {
    // When someone clicks on a close button
    close[i].onclick = function(){

        // Get the parent of <span class="closebtn"> (<div class="alert">)
        var div = this.parentElement;

        // Set the opacity of div to 0 (transparent)
        div.style.opacity = "0";

        // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}
</script>
  
 
<!-- PAGE CONTENT WRAPPER -->
<div class="page__content" id="page-content"> 


<!-- PAGE CONTENT CONTAINER -->
<div class="content" id="content">
<!-- PAGE HEADING -->
<div class="page-heading">
<div class="page-heading__container">
<div class="icon"><span class="li-users2"></span></div>
<h1 class="title">Executives Management</h1>
<p class="caption">WELCOME TO KNOWDEMWELL - PRESIDENTS</p>
</div>
<nav aria-label="breadcrumb" role="navigation">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
<li class="breadcrumb-item"><a href="#">Executive Management</a></li> 
<li class="breadcrumb-item active">Edit President</li></ol>
</nav>
</div>
<!-- //END PAGE HEADING -->

<div class="container">
<div class="card">

<div class="card-container">
<div class="dropdown">
<div class="rw-btn rw-btn--card" data-toggle="dropdown"></div>
<div class="dropdown-menu dropdown-menu-right">
<a href="#" class="dropdown-item" data-demo-action="update">Update</a> 
<a href="#" class="dropdown-item" data-demo-action="expand">Expand</a> 
<a href="#" class="dropdown-item" data-demo-action="invert">Invert style</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item" data-demo-action="remove">Remove card</a>
</div></div>
</div>

<div class="card-body">
<h4 id="rw-fl-default">Edit President</h4>
<p class="subtitle margin-bottom-20">Please fill the form to edit a Presidential Profile</p>

 

<form method="POST" action="" autocomplete="yes" enctype="multipart/form-data">

<?php

if(isset($msg_bad)){
echo '<div class="form-group" style="background: red; border-radius: 20px; color:white;" >
<div class="alert alert-useful" style="background: rgba(200,110,110,1); border-radius: 20px; color:white; border-color: red;"> 
<i class="fa fa-lightbulb-o"></i> 
'.$msg_bad.'
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
<i class="fa fa-remove"></i>
</button>
</div>
</div> ';
}



if(isset($msg_good)){
echo '<div class="form-group" style="background: green; border-radius: 20px; color:white;" >
<div class="alert alert-useful" style="border-radius: 20px; color:white;"> 
<i class="fa fa-lightbulb-o"></i> 
'.$msg_good.'
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
<i class="fa fa-remove"></i>
</button>
</div>
</div>';
} 

?>






<div class="form-group">

 
 
<!--/span-->
 

<div id="filediv" class="form-group">

<label>President Picture</label>
<span class="form-text margin-top-0">Please note that the maximun images size is 3MB</span> 

	<input name="file" type="file" id="file" />
</div>




<div class="form-group" id="sign_button">
<input type="submit" value="Update Picture" name="submit" id="upload" class="btn btn-secondary" /> 
</div>
  




</form> 







</div></div>
 


 

</div>
</div>
<!-- //END PAGE CONTENT CONTAINER -->
</div>
<!-- //END PAGE CONTENT -->
</div>
<!-- //END PAGE WRAPPER --> 

<!-- //END TEMPLATE SETTINGS -->

<!-- IMPORTANT SCRIPTS -->
<script type="text/javascript" src="js/vendors/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/vendors/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="js/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/vendors/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- END IMPORTANT SCRIPTS -->

<!-- THIS PAGE SCRIPTS ONLY -->
<script type="text/javascript" src="js/vendors/validation/jquery.form-validator.js"></script>

<!-- THIS PAGE SCRIPTS ONLY -->


<script type="text/javascript" src="js/vendors/moment/moment-with-locales.min.js"></script>

<script type="text/javascript" src="js/vendors/datetimepicker/bootstrap-datetimepicker.js"></script>

<script type="text/javascript" src="js/vendors/daterangepicker/daterangepicker.js"></script>

<script type="text/javascript" src="js/vendors/select2/select2.min.js"></script>

<!-- //END THIS PAGE SCRIPTS ONLY -->

<!-- TEMPLATE SCRIPTS -->
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/demo.js"></script>
<script type="text/javascript" src="js/settings.js"></script>

<!-- END TEMPLATE SCRIPTS -->
<script type="text/javascript">$.validate({
                modules : 'date,file,location',
                onValidate: function(){
                    app._crt(100);                                                            
                }
            });</script></body>

 
</html>