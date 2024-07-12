<?php  
include("header.php");



$identity = $_GET['htennek007'];

if($_SERVER["REQUEST_METHOD"] == "POST") 
{

$index1Array = $_POST['index1'];
$promise1Array= $_POST['promise1'];
$signal1Array = $_POST['signal1'];
$doings1Array = $_POST['doings1'];



for ($i= 0; $i < count($promise1Array); $i++ ) {

    $index1  = mysqli_real_escape_string($conn, $index1Array);  
    $promise1  = mysqli_real_escape_string($conn, implode('^', $promise1Array)); 
    $signal1  = mysqli_real_escape_string($conn, implode('^', $signal1Array));    
    $doings1  = mysqli_real_escape_string($conn, implode('^', $doings1Array));       




    $sqlx = "UPDATE presidents SET index1='{$index1}', promise1='{$promise1}', signal1='{$signal1}', doings1='{$doings1}' WHERE id='{$identity}' ";

                if(mysqli_query($conn,$sqlx))
                {   
              

               if(isset ($_POST['submit1'])) {

 echo '<script type="text/javascript">window.location.replace("index2.php?htennek007='.$identity.'");</script>';
               }
              

               if(isset ($_POST['submit2'])) { 
                    $msg_good = 'President profile is saved now but not completed, <a href=edit-president.php?mixhtyr12noitcudorpobguhtennek007='.$identity.'>Click here to continue</a>';
                    }
                

                }
               

                else{ $msg_bad ="There was an Error Adding President";  }

                
            }

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
<label>Commitment to Democracy, Human Rights, and Gender Equality</label>
<input type="hidden" class="form-control"   id='index1'  name='index1' value="Commitment to Democracy, Human Rights, and Gender Equality">  
</div>  


        <div class="form-group">  
            <label>Promise</label> 

            <textarea name="promise1[]" rows="5" class="form-control"></textarea>
        </div> 

        <div class="form-group">
            <label>Performance Signal</label>
            <select name="signal1[]" class="form-control">
                        <option value="Invalid Selection">-Select Performance-</option>
                        <option value="High Performance">High Performance</option>
                        <option value="Medium Performance">Medium Performance</option>
                        <option value="Low Performance">Low Performance</option>
                    </select>
        </div>   

        <div id="filiv" class="form-group">
            <label>Actual Doings</label>
            <textarea class="form-control" rows="5" name='doings1[]'></textarea>  
        </div> 
    

<div id="newinput"></div>

<input type="button" class="btn btn-secondary" id="rowAdder" value="+"/>
 
<hr/>



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
    <script type="text/javascript">
        $("#rowAdder").click(function () {
            newRowAdd =
                '<div id="row"><label>Promise</label> <div class="input-group-prepend m-input">' +
                '<div class="input-group-prepend">' +
                '<button class="btn btn-danger" id="DeleteRow" type="button">' +
                '<i class="bi bi-trash"></i>Delete</button> </div>' +
                '<textarea name="promise1[]" rows="5" class="form-control m-input"></textarea></div>'+
                '<label>Performance Signal</label><div class="input-group"><select name="signal1[]" class="form-control m-input">'+
                '<option value="Invalid Selection">-Select Performance-</option>'+
                '<option value="High Performance">High Performance</option>'+
                '<option value="Medium Performance">Medium Performance</option>'+
                '<option value="Low Performance">Low Performance</option>'+
                '</select></div>'+
                '<label>Actual Doings</label><div class="input-group"><textarea class="form-control m-input" rows="5" name="doings1[]"></textarea></div> </div> </div>';

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
<script src="jquery.min.js"></script>
<script src="script.js"></script>


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