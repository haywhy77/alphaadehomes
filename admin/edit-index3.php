<?php  
include("header.php");
$identity = $_GET['htennek007'];

    $result = $conn->query("SELECT * FROM presidents where id = '{$identity}' ");
    if($result->num_rows > 0)
    { 
        while($row = $result->fetch_assoc()) 
        {     
    $index3  = $row['index3'];       
    $promise3 = $row['promise3'];
    $doings3 = $row['doings3'];
    $signal3 = $row['signal3'];
    $id = $row['id'];
        }
    }

if($_SERVER["REQUEST_METHOD"] == "POST") 
{

$index3Array = $_POST['index3'];
$promise3Array= $_POST['promise3'];
$signal3Array = $_POST['signal3'];
$doings3Array = $_POST['doings3'];



for ($i= 0; $i < count($promise3Array); $i++ ) {

    $index3  = mysqli_real_escape_string($conn, $index3Array);  
    $promise3  = mysqli_real_escape_string($conn, implode('^', $promise3Array)); 
    $signal3  = mysqli_real_escape_string($conn, implode('^', $signal3Array));    
    $doings3  = mysqli_real_escape_string($conn, implode('^', $doings3Array));       




    $sqlx = "UPDATE presidents SET index3='{$index3}', promise3='{$promise3}', signal3='{$signal3}', doings3='{$doings3}' WHERE id='{$identity}' ";

                if(mysqli_query($conn,$sqlx))
                {   
              

               if(isset ($_POST['submit1'])) {

 echo '<script type="text/javascript">window.location.replace("edit-index4.php?htennek007='.$identity.'");</script>';
               }
              

               if(isset ($_POST['submit2'])) { 
                    $msg_good = 'President profile is saved now but not completed, <a href=edit-president.php?mixhtyr12noitcudorpobguhtennek007='.$identity.'>Click here to continue</a>';
                    }
                

                }
               

                else{ $msg_bad ="There was an erro editing President profile";  }

                
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
.alertn {
    padding: 20px;
    background-color: #007bff;  
    color: white; 
    text-align: center;
    z-index: 999;
    position: absolute;
    left: 5px;
    bottom: 5px; 
    opacity: 1;
    transition: opacity 0.6s; /* 600ms to fade out */
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
<h4 id="rw-fl-default">Continue President Profile</h4>
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

<!--/span-->

<?php 
echo '<div class="form-group">
<label>'.$index3.'</label>
<input type="hidden" class="form-control"   id="index1"  name="index3" value="'.$index3.'">  
</div>';  


$prom1 = explode("^",$promise3); 
$doin1 = explode("^", $doings3);
$sig1 = explode("^", $signal3);
$j = 0;
foreach ($prom1 as $i => $value)
{
 $j++;

echo
        '<div class="form-group">  
            <label>Promise</label> 

            <textarea name="promise3[]" id="txt" rows="5" value="'.$prom1[$i].'" class="form-control">'.$prom1[$i].'</textarea>
        </div> 

        <div class="form-group">
            <label>Performance Signal</label>
            <select name="signal3[]" class="form-control">
                        <option value="'.$sig1[$i].'">'.$sig1[$i].'</option>
                        <option value="High Performance">High Performance</option>
                        <option value="Medium Performance">Medium Performance</option>
                        <option value="Low Performance">Low Performance</option>
            </select>
        </div>   

        <div id="filiv" class="form-group">
            <label>Actual Doings</label>
            <textarea class="form-control" rows="5" name="doings3[]">'.$doin1[$i].'</textarea>  
        </div>'; 


}

        ?> 

<div id="newinput"></div>
<input type="button" class="btn btn-secondary" id="rowAdder" value="+"/>
 
<hr/>


<div class="form-group" id="sign_button">
<input type="submit" value="Edit and Proceed" name="submit1" id="upload" class="btn btn-secondary" /> 
<input type="submit" value="Edit Profile" name="submit2" id="upload" class="btn btn-success" /> 
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
    <script type="text/javascript">
        $("#rowAdder").click(function () {
            newRowAdd =
                '<div id="row"><label>Promise</label> <div class="input-group-prepend m-input">' +
                '<div class="input-group-prepend">' +
                '<button class="btn btn-danger" id="DeleteRow" type="button">' +
                '<i class="bi bi-trash"></i>Delete</button> </div>' +
                '<textarea name="promise3[]" rows="5" class="form-control m-input"></textarea></div>'+
                '<label>Performance Signal</label><div class="input-group"><select name="signal3[]" class="form-control m-input">'+
                '<option value="Invalid Selection">-Select Performance-</option>'+
                '<option value="High Performance">High Performance</option>'+
                '<option value="Medium Performance">Medium Performance</option>'+
                '<option value="Low Performance">Low Performance</option>'+
                '</select></div>'+
                '<label>Actual Doings</label><div class="input-group"><textarea class="form-control m-input" rows="5" name="doings3[]"></textarea></div> </div> </div>';

            $('#newinput').append(newRowAdd);
        });
        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })
    </script>

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