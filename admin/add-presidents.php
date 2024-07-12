<?php  
include("header.php");

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
 //   $j = 0;     // Variable for indexing uploaded image.
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

    $fullname  = mysqli_real_escape_string($conn,$_POST['fullname']);  
    $occupation  = mysqli_real_escape_string($conn,$_POST['occupation']);   
    $dob  = mysqli_real_escape_string($conn,$_POST['dob']);    
    $state  = mysqli_real_escape_string($conn,$_POST['state']);       
    $religion  = mysqli_real_escape_string($conn,$_POST['religion']);       
    $party  = mysqli_real_escape_string($conn,$_POST['party']);       
    $manifesto  = mysqli_real_escape_string($conn,$_POST['manifesto']);       
    $ideology  = mysqli_real_escape_string($conn,$_POST['ideology']);       
  //  $policy  = mysqli_real_escape_string($conn,$_POST['policy']);       
    $verdict  = mysqli_real_escape_string($conn,$_POST['verdict']);       
    $other_verdict  = mysqli_real_escape_string($conn,$_POST['other_verdict']);

    
    $sqlx = "INSERT INTO presidents (fullname, occupation, dob, state, religion, party, manifesto, status, ideology, verdict, images) VALUES ('{$fullname}', '{$occupation}', '{$dob}', '{$state}', '{$religion}', '{$party}', '{$manifesto}', '0', '{$ideology}', '{$verdict}', '{$image_filenames}')";

                if(mysqli_query($conn,$sqlx))
                {   
                    $NewInputID = mysqli_insert_id($conn);  
               if(isset ($_POST['submit1'])) {
 echo '<script type="text/javascript">window.location.replace("index1.php?htennek007='.$NewInputID.'");</script>';
               }
               if(isset ($_POST['submit2'])) { 
                    $msg_good = 'President profile is saved now but not completed, <a href=view-president.php>Click here to continue</a>';
                }
                }
                else{ $msg_bad ="There was an Error Adding President";  }

                
            }
            else { $msg_bad = '<span id="error">Invalid file type, please try again!.</span><br/><br/>'; }
        } 
        else {  $msg_bad = '<span id="error">You must add a picture first before saving</span><br/><br/>';}

    }



?>


  
 
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
<h4 id="rw-fl-default">Add President</h4>
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
<div id="filediv" class="form-group">
<label>President Picture</label>
<span class="form-text margin-top-0">Please note that the maximun image size allowed is 3MB</span> 

    <input name="file" type="file" id="file" />
</div> 
<!--/span-->
 
<div class="form-group">
<label>Full Name</label>
<input type="text" class="form-control"   id='fullname'  name='fullname'>  
<span  class="form-text"> Enter Full Name of President</span> 
</div>  


<div class="form-group">
<label>Occupation</label>
<input type="text" class="form-control"   id='occupation'  name='occupation' >  
<span  class="form-text">Enter Occupation of President</span> 
</div>

<div class="form-group">
<label>Date of Birth</label>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<input type="date" data-date="" data-date-format="DD MMMM YYYY" value="No Date" class="form-control" name="dob">
<script>
    $("input").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD")
        .format( this.getAttribute("data-date-format") )
    )
}).trigger("change")
</script>
<span  class="form-text">Enter Date of Birth for President</span> 
</div>

<div class="form-group">
<label>State of Origin</label>
<select name="state" class="form-control">
              <option value="Invalid Selection">-Select State-</option>
              <option value="Abia">Abia</option>
              <option value="Adamawa">Adamawa</option>
              <option value="Akwa Ibom">Akwa Ibom</option>
              <option value="Anambra">Anambra</option>
              <option value="Bauchi">Bauchi</option>
              <option value="Bayelsa">Bayelsa</option>
              <option value="Benue">Benue</option>
              <option value="Borno">Borno</option>
              <option value="Cross River">Cross River</option>
              <option value="Delta">Delta</option>
              <option value="Ebonyi">Ebonyi</option>
              <option value="Edo">Edo</option>
              <option value="Ekiti">Ekiti</option>
              <option value="Enugu">Enugu</option>
              <option value="Gombe">Gombe</option>
              <option value="Imo">Imo</option>
              <option value="Jigawa">Jigawa</option>
              <option value="Kaduna">Kaduna</option>
              <option value="Kano">Kano</option>
              <option value="Katsina">Katsina</option>
              <option value="Kebbi">Kebbi</option>
              <option value="Kogi">Kogi</option>
              <option value="Kwara">Kwara</option>
              <option value="Lagos">Lagos</option>
              <option value="Nassarawa">Nassarawa</option>
              <option value="Niger">Niger</option>
              <option value="Ogun">Ogun</option>
              <option value="Ondo">Ondo</option>
              <option value="Osun">Osun</option>
              <option value="Oyo">Oyo</option>
              <option value="Plateau">Plateau</option>
              <option value="Rivers">Rivers</option>
              <option value="Sokoto">Sokoto</option>
              <option value="Taraba">Taraba</option>
              <option value="Yobe">Yobe</option>
              <option value="Zamfara">Zamfara</option>
              <option value="FCT">FCT Abuja</option>
</select>
<span class="form-text">Select Origin of President</span>
</div>

<div class="form-group">
<label>Religion</label>
<select name="religion" class="form-control">
              <option value="Invalid Selection">-Select Religion-</option>
              <option value="Christian">Christian</option>
              <option value="Islam">Islam</option>
              <option value="Traditional">Traditional</option>
              <option value="Atheist">Atheist</option>
              <option value="Agnostic">Agnostic</option>
              <option value="Animist">Animist</option>
              <option value="Buddhist">Buddhist</option>
              <option value="Other">Others</option>
          </select>
<span  class="form-text">Select Religion</span> 
</div>   

<div class="form-group">
<label>Political Party</label>
<input type="text" class="form-control"   id='party'  name='party'>  
<span  class="form-text">Enter Political Party of President</span> 
</div>
 
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<div class="form-group">  
<label>Manifesto</label> 

 <textarea name="manifesto" id="editor1" rows="5" style="width:300px;"></textarea>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
<span  class="form-text">Enter Manifesto of the President</span> 
</div> 

<div class="form-group">
<label>Ideology</label>
<input type="text" class="form-control"   id='ideology'  name='ideology'>  
<span  class="form-text">Enter Ideology Spectrum of President</span> 
</div>

<!--
<div class="form-group">
<label>Actual Doings</label>
<input type="text" class="form-control"   id='policy'  name='policy'>  
<span  class="form-text">Enter Actual Policy of President</span> 
</div>
-->

<div class="form-group">
<label>Verdict</label>
<select name="verdict" class="form-control">
              <option value="Invalid Selection">-Select Performance-</option>
              <option value="High Performance">High Performance</option>
              <option value="Medium Performance">Medium Performance</option>
              <option value="Low Performance">Low Performance</option>
              <option value="Others">Others</option>
          </select>
<span  class="form-text">Select Verdict</span> 
</div> 

<!--
<div class="form-group">
<label>If other verdict</label>
<input type="text" class="form-control"   id='other_verdict'  name='other_verdict'>  
<span  class="form-text">Enter Verdict</span> 
</div>
-->

<div class="form-group" id="sign_button">
<input type="submit" value="Save and Proceed" name="submit1" id="upload" class="btn btn-secondary" /> 
<input type="submit" value="Save and Continue Later" name="submit2" id="upload" class="btn btn-secondary" /> 

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