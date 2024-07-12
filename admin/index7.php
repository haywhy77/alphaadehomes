<?php  
include("header.php");
$identity = $_GET['htennek007'];

if($_SERVER["REQUEST_METHOD"] == "POST") 
{

$index7Array = $_POST['index7'];
$promise7Array= $_POST['promise7'];
$signal7Array = $_POST['signal7'];
$doings7Array = $_POST['doings7'];



for ($i= 0; $i < count($promise7Array); $i++ ) {

    $index7  = mysqli_real_escape_string($conn, $index7Array);  
    $promise7  = mysqli_real_escape_string($conn, implode('^', $promise7Array)); 
    $signal7 = mysqli_real_escape_string($conn, implode('^', $signal7Array));    
    $doings7  = mysqli_real_escape_string($conn, implode('^', $doings7Array));       


    if (isset($_POST['submit1']))
    {

    $sqlx = "UPDATE presidents SET index7='{$index7}', promise7='{$promise7}', signal7='{$signal7}', doings7='{$doings7}' WHERE id='{$identity}' ";

        if(mysqli_query($conn,$sqlx))
        {   
 
        $msg_good = 'President profile is saved now, <a href=edit-president.php?mixhtyr12noitcudorpobguhtennek007='.$id.'>Click here to continue</a>';
        }
    }

              

    if (isset($_POST['submit2']))
    {
    

        date_default_timezone_set('Africa/Lagos');      
        $date_uploaded = date("M j, Y"); 

        $sql = "UPDATE presidents SET index7='{$index7}', promise7='{$promise7}', signal7='{$signal7}', doings7='{$doings7}', date='{$date_uploaded}' WHERE id ='{$identity}'";
        
        $res=mysqli_query($conn,$sql);
        if($res){       
    
            $sqlxx = "SELECT * FROM presidents where id='$identity'";
            $results = $conn->query($sqlxx);

            if($results->num_rows > 0)
            { 
            $row = $results->fetch_assoc();

                $allColumnsNotEmpty = true;
                //echo $row["fullname"];exit;
                foreach ($row as $column) {
                
                    if ($column =='') {
                        $allColumnsNotEmpty = false;
                        break;
                    }
                } 
                //echo $allColumnsNotEmpty;exit;
                if ($allColumnsNotEmpty) {
                    
                    $sqls = "UPDATE presidents SET status='1', date='{$date_uploaded}' WHERE id ='{$identity}'";
                    $resp=mysqli_query($conn,$sqls);
                    
                    if($resp){
                        $msg_good = "President profile is now completely submitted";
                    }
                }else{
                    $msg_good = 'President profile is saved now but not completed, <a href=edit-president.php?mixhtyr12noitcudorpobguhtennek007='.$id.'>Click here to continue</a>';
                }
                
            }else{
                $msg_bad = "Unable to save President profile";
            }
            
        }else { 
            $msg_bad = "President profile was not found"; 
            
        }
}

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
<label>Commitment and Approach to Peace and Conflict Resolution</label>
<input type="hidden" class="form-control"   id='index1'  name='index7' value="Commitment and Approach to Peace and Conflict Resolution">  
</div>  


        <div class="form-group">  
            <label>Promise</label> 

            <textarea name="promise7[]" id="txt" rows="5" class="form-control"></textarea>
        </div> 

        <div class="form-group">
            <label>Performance Signal</label>
            <select name="signal7[]" class="form-control">
                        <option value="Invalid Selection">-Select Performance-</option>
                        <option value="High Performance">High Performance</option>
                        <option value="Medium Performance">Medium Performance</option>
                        <option value="Low Performance">Low Performance</option>
            </select>
        </div>   

        <div id="filiv" class="form-group">
            <label>Actual Doings</label>
            <textarea class="form-control" rows="5" name='doings7[]'></textarea>  
        </div> 
    

<div id="newinput"></div>

<input type="button" class="btn btn-secondary" id="rowAdder" value="+"/>


<hr/>



<div class="form-group" id="sign_button">
<input type="submit" value="Save and Proceed" name="submit1" id="upload" class="btn btn-secondary" /> 
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
    <script type="text/javascript">
        $("#rowAdder").click(function () {
            newRowAdd =
                '<div id="row"><label>Promise</label> <div class="input-group-prepend m-input">' +
                '<div class="input-group-prepend">' +
                '<button class="btn btn-danger" id="DeleteRow" type="button">' +
                '<i class="bi bi-trash"></i>Delete</button> </div>' +
                '<textarea name="promise7[]" rows="5" class="form-control m-input"></textarea></div>'+
                '<label>Performance Signal</label><div class="input-group"><select name="signal7[]" class="form-control m-input">'+
                '<option value="Invalid Selection">-Select Performance-</option>'+
                '<option value="High Performance">High Performance</option>'+
                '<option value="Medium Performance">Medium Performance</option>'+
                '<option value="Low Performance">Low Performance</option>'+
                '</select></div>'+
                '<label>Actual Doings</label><div class="input-group"><textarea class="form-control m-input" rows="5" name="doings7[]"></textarea></div> </div> </div>';

            $('#newinput').append(newRowAdd);
        });
        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })
    </script>



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
<script src="jquery.min.js"></script>
<script src="script.js"></script>
<script src="scripted.js"></script>

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