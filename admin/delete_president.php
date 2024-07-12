<?php 
include("header.php");
	 
	$identity = $_GET['mixhtyr12noitcudorpobguhtennek007'];

	 if (!$identity == '')
	 {
	 	echo  "<script>window.history.back();</script>";
	 }
  
      $sql = "DELETE FROM presidents WHERE id ='{$identity}'";
      
      if($result = mysqli_query($conn,$sql))
	{ 
	$ref = 'Preseident Deleted Successfully';  

	  header("location:view-president.php");	
	}
?>



<style type="text/css">
  /* The alert message box */
.alert {
    padding: 20px;
    background-color: #f44336; /* Red */
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
.alert {
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
<div class="page__content page-aside--hidden" id="page-content">


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
<li class="breadcrumb-item active">View President</li></ol>
</nav>
</div>
<!-- //END PAGE HEADING -->


<div class="container">
<div class="card">
<div class="card-body padding-top-50 padding-bottom-30">
<div class="row padding-top-50 padding-bottom-50">
<div class="col-12">
<div class="logo-holder logo-holder--xl logo-holder--wide">
<div class="logo-text d-none d-lg-block">
<strong class="text-primary">#</strong><strong> <?php echo $title; ?> </strong></div>
<div class="logo-text d-lg-none"><strong class="text-primary">#</strong><strong>RW</strong></div></div>
<h3 class=" text-center"><?php echo $category; ?></h3>
<p class="subtitle text-center"><?php echo "Published on ".$date_uploaded; ?></p>
</div></div></div>

<div class="card-body"> 
<div class="row">
<div class="col-12"> 
<?php echo $description1; ?>
</div></div></div>


<div class="card-body">
<div class="card-inner-container">
<div class="form-row"> 
<ul>
<li>	
<strong>Category: </strong><?php echo $category; ?></li><li>
<strong>Start Date: </strong><?php echo $date_start; ?></li><li>
<strong>Completion Date: </strong><?php echo $date_end; ?></li><li>
<strong>Location: </strong><?php echo $location; ?></li>
</ul>
</div></div></div>
 

<div class="card-body">
<div class="row">
 
 

<?php

 
        $images_url = explode(",",$total_image); 
        foreach ($images_url as $i)
        {
	         if($i != '')
	         {
				echo '<div class="col-12 col-lg-3"><div class="card"><div class="page-heading page-heading--transparent"><div class="page-heading__container page-heading__container--center"></div></div><div class="card-body card-preview-holder text-center"><img src="';

				echo $i;

				echo '" style="height: 200px; max-width:200px;"><a href="#" class="card-preview-layer"><div class="icon-box icon-box--bordered"><span class="li-eye"></span></div></a></div></div></div>';

	         }
	    }

?>

 

 </div></div>


 

<div class="form-group" >
<a class="btn btn-secondary btn-block" href="edit-project.php?mixhtyr12noitcudorpobguhtennek007=<?php echo $identity; ?>">Edit Package</a>
</div>
  

<div class="form-group" >
<a class="btn btn-danger btn-block" data-toggle="modal" data-target="#invertExampleModal" href="delete_project.php?mixhtyr12noitcudorpobguhtennek007=<?php echo $identity; ?>">Delete Package</a>
</div>
  

 

</div></div>


<div class="modal fade" id="invertExampleModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content invert">
<div class="modal-header">
<h5 class="modal-title">Confirmation</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button></div>
<div class="modal-body">Please note that the new credentials would take effect and you would be Logged Out, and asked to Login again.
 </div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
<input class="btn btn-primary" id="bbb" type="submit" name="bbb" value="Confirm"> 
</div></div></div></div>




</div>
</div>
</div>
</div>
</div>

<!-- //END PAGE CONTENT CONTAINER -->
</div>

<!-- //END PAGE CONTENT -->
</div>

<!-- //END PAGE WRAPPER -->
<script type="text/javascript">

document.addEventListener("DOMContentLoaded", function () {
$(".rating").raty({readOnly: true});
});
</script>


<!-- THIS PAGE SCRIPTS ONLY -->
<script type="text/javascript" src="js/vendors/raty/jquery.raty.js">
</script>
<!-- //END THIS PAGE SCRIPTS ONLY -->

<!-- IMPORTANT SCRIPTS -->
<script type="text/javascript" src="js/vendors/jquery/jquery.min.js">
</script>
<script type="text/javascript" src="js/vendors/jquery/jquery-migrate.min.js">
</script>
<script type="text/javascript" src="js/vendors/bootstrap/bootstrap.bundle.min.js">
</script>
<script type="text/javascript" src="js/vendors/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js">
</script><!-- END IMPORTANT SCRIPTS -->

<!-- TEMPLATE SCRIPTS -->
<script type="text/javascript" src="js/app.js">
</script>
<script type="text/javascript" src="js/plugins.js">
</script>
<script type="text/javascript" src="js/demo.js">
</script>
<script type="text/javascript" src="js/settings.js">
</script>
<!-- END TEMPLATE SCRIPTS -->
</body> 

</html>