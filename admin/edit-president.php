<?php  
include("header.php");
$identity = $_GET['mixhtyr12noitcudorpobguhtennek007'];

    $result = $conn->query("SELECT * FROM presidents where id = '{$identity}' ");
    if($result->num_rows > 0)
    { 
        while($row = $result->fetch_assoc()) 
        {     
    $fullname = $row['fullname'];  
    $occupation  = $row['occupation'];   
    $dob  = $row['dob'];    
    $state  = $row['state'];       
    $religion  = $row['religion'];       
    $party  = $row['party'];       
    $manifesto  = $row['manifesto'];       
    $ideology  = $row['ideology'];       
    $policy  = $row['policy'];       
    $verdict  = $row['verdict'];       
    $other_verdict  = $row['other_verdict'];
    $images = $row['images'];
    $new_id = $row['id'];
        }
    }




if($_SERVER["REQUEST_METHOD"] == "POST") 
{

    $fullname  = mysqli_real_escape_string($conn,$_POST['fullname']);  
    $occupation  = mysqli_real_escape_string($conn,$_POST['occupation']);   
    $dob  = mysqli_real_escape_string($conn,$_POST['dob']);    
    $state  = mysqli_real_escape_string($conn,$_POST['state']);       
    $religion  = mysqli_real_escape_string($conn,$_POST['religion']);       
    $party  = mysqli_real_escape_string($conn,$_POST['party']);       
    $manifesto  = mysqli_real_escape_string($conn,$_POST['manifesto']);       
    $ideology  = mysqli_real_escape_string($conn,$_POST['ideology']);       
//    $policy  = mysqli_real_escape_string($conn,$_POST['policy']);       
    $verdict  = mysqli_real_escape_string($conn,$_POST['verdict']);       
 //   $other_verdict  = mysqli_real_escape_string($conn,$_POST['other_verdict']);

    
    $sqlx = "UPDATE presidents SET fullname='{$fullname}', occupation='{$occupation}', dob='{$dob}', state='{$state}', religion='{$religion}', party='{$party}', manifesto='{$manifesto}', status='0', ideology='{$ideology}', verdict='{$verdict}' WHERE id='$identity'";

                if(mysqli_query($conn,$sqlx))
                {   
                    $NewInputID = mysqli_insert_id($conn);  
               if(isset ($_POST['submit1'])) {
 echo '<script type="text/javascript">window.location.replace("edit-index1.php?htennek007='.$new_id.'");</script>';
               }
               if(isset ($_POST['submit2'])) { 
echo '<script type="text/javascript">window.location.replace("view-president.php");</script>'; }
                }
                else{ $msg_bad ="There was an Error editing President";  }

                
            

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

input[type=date] {
    position: relative;
    width: 200px; height: 40px;
    color: white;
}

input[type=date]:before {
    position: absolute;
    content: attr(data-date);
    display: inline-block;
    color: black;
}

input[type=date]::-webkit-datetime-edit, input::-webkit-inner-spin-button, input::-webkit-clear-button {
    display: none;
}

input[type=date]::-webkit-calendar-picker-indicator {
    position: absolute;
    top: 3px;
    right: 0;
    color: black;
    opacity: 1;
}
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


<?php
    echo '<img src="'.$images.'" style="height: 200px; max-width:200px; margin-bottom:5px;">';
?>
<div class="form-group" >
<a class="btn btn-success" href="edit-picture.php?mixhtyr12noitcudorpobguhtennek007=<?php echo $identity; ?>">Edit Picture</a>
</div>


<!--/span-->
 
<div class="form-group">
<label>Full Name</label>
<input type="text" class="form-control"   id='fullname'  name='fullname' value="<?php echo $fullname; ?>">  
<span  class="form-text"> Enter Full Name of President</span> 
</div>  


<div class="form-group">
<label>Occupation</label>
<input type="text" class="form-control"   id='occupation'  name='occupation' value="<?php echo $occupation; ?>">  
<span  class="form-text">Enter Occupation of President</span> 
</div>

<div class="form-group">
<label>Date of Birth</label>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<input type="date" data-date="" data-date-format="DD MMMM YYYY" value="<?php echo $dob; ?>" class="form-control" name="dob">
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
<option  selected="" value="<?php echo $state; ?>" ><?php echo $state; ?></option> 
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
<option  selected="" value="<?php echo $religion; ?>" ><?php echo $religion; ?></option> 
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
<input type="text" class="form-control"   id='party'  name='party' value="<?php echo $party; ?>">  
<span  class="form-text">Enter Political Party of President</span> 
</div>
 
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<div class="form-group">  
<label>Manifesto</label> 

 <textarea name="manifesto" id="editor1" rows="5" style="width:300px;"><?php echo $manifesto; ?></textarea>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
<span  class="form-text">Enter Manifesto of the President</span> 
</div> 

<div class="form-group">
<label>Ideology</label>
<input type="text" class="form-control"   id='ideology'  name='ideology' value="<?php echo $ideology; ?>">  
<span  class="form-text">Enter Ideology Spectrum of President</span> 
</div>
<!--
<div class="form-group">
<label>Actual Doings</label>
<input type="text" class="form-control"   id='policy'  name='policy' value="<?php echo $policy; ?>">  
<span  class="form-text">Enter Actual Policy of President</span> 
</div>
-->

<div class="form-group">
<label>Verdict</label>
<select name="verdict" class="form-control">
<option  selected="" value="<?php echo $verdict; ?>" ><?php echo $verdict; ?></option> 
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
<input type="text" class="form-control"   id='other_verdict'  name='other_verdict' value="<?php echo $other_verdict; ?>">  
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