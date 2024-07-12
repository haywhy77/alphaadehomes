<?php  
include("header.php");
$identity = $_GET['htennek007'];




    $index1  = mysqli_real_escape_string($conn,$_POST['index1']);       
    $index2  = mysqli_real_escape_string($conn,$_POST['index2']);       
    $index3  = mysqli_real_escape_string($conn,$_POST['index3']);       
    $index4  = mysqli_real_escape_string($conn,$_POST['index4']);       
    $index5  = mysqli_real_escape_string($conn,$_POST['index5']);       
    $index6  = mysqli_real_escape_string($conn,$_POST['index6']);       
    $index7  = mysqli_real_escape_string($conn,$_POST['index7']);       
    $index1_doings  = mysqli_real_escape_string($conn,$_POST['index1_doings']);       
    $index2_doings  = mysqli_real_escape_string($conn,$_POST['index2_doings']);       
    $index3_doings  = mysqli_real_escape_string($conn,$_POST['index3_doings']);       
    $index4_doings  = mysqli_real_escape_string($conn,$_POST['index4_doings']);       
    $index5_doings  = mysqli_real_escape_string($conn,$_POST['index5_doings']);       
    $index6_doings  = mysqli_real_escape_string($conn,$_POST['index6_doings']);       
    $index7_doings  = mysqli_real_escape_string($conn,$_POST['index7_doings']);       

    date_default_timezone_set('Africa/Lagos');      
    $date_uploaded = date("M j, Y"); 

    if (isset($_POST['submit1']))
    {
    $sqlx = "UPDATE presidents SET index1='{$index1}', index2='{$index2}', index3='{$index3}', index4='{$index4}', index5='{$index5}', index6='{$index6}', index7='{$index7}', index1_doings='{$index1_doings}', index2_doings='{$index2_doings}', index3_doings='{$index3_doings}', index4_doings='{$index4_doings}', index5_doings='{$index5_doings}', index6_doings='{$index6_doings}', index7_doings='{$index7_doings}' WHERE id ='{$identity}'";
        if(mysqli_query($conn,$sqlx))
        {   

        $NewInputID = mysqli_insert_id($conn);  
        $msg_good = "President profile is saved now, <a href=add-president.php?'.$NewInputID.'>Click here to continue</a>";
        }
    }
    if (isset($_POST['submit2']))
    {
    $sql = "UPDATE presidents SET index1='{$index1}', index2='{$index2}', index3='{$index3}', index4='{$index4}', index5='{$index5}', index6='{$index6}', index7='{$index7}', index1_doings='{$index1_doings}', index2_doings='{$index2_doings}', index3_doings='{$index3_doings}', index4_doings='{$index4_doings}', index5_doings='{$index5_doings}', index6_doings='{$index6_doings}', index7_doings='{$index7_doings}', status='1', date='{$date_uploaded}' WHERE id ='{$identity}'";

                if(mysqli_query($conn,$sql))
                {   
                    $NewInputID = mysqli_insert_id($conn);  
                    $msg_good = 'President is added successfully, <a href="add-presidents.php">Click to add another President</a> '; 
                }
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
<li class="breadcrumb-item active">Add President</li></ol>
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
<h4 id="rw-fl-default">Continue President Profile</h4>
<p class="subtitle margin-bottom-20">Please fill the form to add a Presidential Profile</p>

 

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
 






<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<div class="form-group">  
<label>Commitment to Democracy, Human Rights, and Gender Equality</label> 

 <textarea name="index1" id="editor2" rows="5" style="width:300px;"></textarea>
<script>
    CKEDITOR.replace( 'editor2' );
</script>
<span  class="form-text">Enter Commitment to Democracy, Human Rights, and Gender Equality</span> 
</div> 

<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<div class="form-group">  
<label>Actual Doings</label> 

 <textarea name="index1_doings" id="edit1" rows="5" style="width:300px;"></textarea>
<script>
    CKEDITOR.replace( 'edit1' );
</script>
<span  class="form-text">Enter Actual Doings</span> 
</div> 


<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<div class="form-group">  
<label>Commitment to Poverty Eradication</label> 

 <textarea name="index2" id="editor3" rows="5" style="width:300px;"></textarea>
<script>
    CKEDITOR.replace( 'editor3' );
</script>
<span  class="form-text">Enter Commitment to Poverty Eradication</span> 
</div> 

<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<div class="form-group">  
<label>Actual Doings</label> 

 <textarea name="index2_doings" id="edit2" rows="5" style="width:300px;"></textarea>
<script>
    CKEDITOR.replace( 'edit2' );
</script>
<span  class="form-text">Enter Actual Doings</span> 
</div> 


<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<div class="form-group">  
<label>Commitment to Ending Corruption in Public Offices and Society</label> 

 <textarea name="index3" id="editor4" rows="5" style="width:300px;"></textarea>
<script>
    CKEDITOR.replace( 'editor4' );
</script>
<span  class="form-text">Enter Commitment to Ending Corruption in Public Offices and Society</span> 
</div> 

<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<div class="form-group">  
<label>Actual Doings</label> 

 <textarea name="index3_doings" id="edit3" rows="5" style="width:300px;"></textarea>
<script>
    CKEDITOR.replace( 'edit3' );
</script>
<span  class="form-text">Enter Actual Doings</span> 
</div> 


<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<div class="form-group">  
<label>Commitment to Socio-Economic Development and Environmental Protection</label> 

 <textarea name="index4" id="editor5" rows="5" style="width:300px;"></textarea>
<script>
    CKEDITOR.replace( 'editor5' );
</script>
<span  class="form-text">Enter Commitment to Socio-Economic Development and Environmental Protection</span> 
</div> 

<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<div class="form-group">  
<label>Actual Doings</label> 

 <textarea name="index4_doings" id="edit4" rows="5" style="width:300px;"></textarea>
<script>
    CKEDITOR.replace( 'edit4' );
</script>
<span  class="form-text">Enter Actual Doings</span> 
</div> 


<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<div class="form-group">  
<label>Commitment to Education and Social Change</label> 

 <textarea name="index5" id="editor6" rows="5" style="width:300px;"></textarea>
<script>
    CKEDITOR.replace( 'editor6' );
</script>
<span  class="form-text">Enter Commitment to Education and Social Change</span> 
</div> 

<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<div class="form-group">  
<label>Actual Doings</label> 

 <textarea name="index5_doings" id="edit5" rows="5" style="width:300px;"></textarea>
<script>
    CKEDITOR.replace( 'edit5' );
</script>
<span  class="form-text">Enter Actual Doings</span> 
</div> 


<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<div class="form-group">  
<label>Commitment and Approach to Internal Security and Public Safety</label> 

 <textarea name="index6" id="editor7" rows="5" style="width:300px;"></textarea>
<script>
    CKEDITOR.replace( 'editor7' );
</script>
<span  class="form-text">Enter Commitment and Approach to Internal Security and Public Safety</span> 
</div> 

<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<div class="form-group">  
<label>Actual Doings</label> 

 <textarea name="index6_doings" id="edit6" rows="5" style="width:300px;"></textarea>
<script>
    CKEDITOR.replace( 'edit6' );
</script>
<span  class="form-text">Enter Actual Doings</span> 
</div> 


<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<div class="form-group">  
<label>Commitment and Approach to Peace and Conflict Resolution</label> 

 <textarea name="index7" id="editor8" rows="5" style="width:300px;"></textarea>
<script>
    CKEDITOR.replace( 'editor8' );
</script>
<span  class="form-text">Enter Commitment and Approach to Peace and Conflict Resolution</span> 
</div> 

<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<div class="form-group">  
<label>Actual Doings</label> 

 <textarea name="index7_doings" id="edit7" rows="5" style="width:300px;"></textarea>
<script>
    CKEDITOR.replace( 'edit7' );
</script>
<span  class="form-text">Enter Actual Doings</span> 
</div> 


<div class="form-group" id="sign_button">
<input type="submit" value="Save and Continue Later" name="submit1" id="upload" class="btn btn-secondary" /> 
<input type="submit" value="Submit Profile" name="submit2" id="upload" class="btn btn-success" /> 
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