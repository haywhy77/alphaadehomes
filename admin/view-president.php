<?php 

include("header.php");

//$identity = $_GET['htennek007'];



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
<li class="breadcrumb-item active">View President</li></ol>
</nav>
</div>
<!-- //END PAGE HEADING -->
<div class="container-fluid">
<div class="row">
<div class="col-12 col-lg-12" style="display: none;">
<div class="card">
<div class="card-body">
<div class="form-group margin-bottom-0"><label>Search</label>
<div class="input-group">
<div class="input-group-prepend"><span class="input-group-text"><span class="fa fa-search"></span></span></div>
<input type="text" class="form-control" placeholder="Keyword to search..."></div>
</div>
</div>
 
 </div></div>

<div class="col-12 col-lg-12"> 
<div class="form-row gallery">
 
<?php



$result = $conn->query("SELECT * FROM presidents order by id desc");
if($result->num_rows > 0)
{ 
    while($row = $result->fetch_assoc()) 
    {    
    	if ($row['status']==0){ $status='<font color="red"><strong>Not Completed</strong></font>'; }
    		else { $status = '<font color="green"><strong>Completed</strong></font>'; }
		echo '<div class="col-12 col-md-6 col-lg-3 gallery-item nature"><div class="card margin-bottom-10"><div class="card-body"><div class="row"><div class="col-8"><h5 class="margin-bottom-0">';
		echo $row['fullname'];
		echo '</h5></div><div class="col-4 text-right"><small class="text-muted">';
		echo $status;
		echo '</small></div></div></div><a href="view-presidents.php?htennek007=';
		echo $row['id'];
		echo '" class="link-wrapper" data-lightbox="image-1"><img class="card-img-bottom" src="';
		$OriginalString =  $row['images']; 
		        echo explode(",",$OriginalString)[0]; 
		echo '" alt="President Image" height="400"></a></div></div>';

    }
}
else
{ echo "No Record Found."; }

?>



</div>


	
	
 
 


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


<!-- IMPORTANT SCRIPTS -->

<script type="text/javascript" src="js/vendors/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/vendors/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="js/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/vendors/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- END IMPORTANT SCRIPTS -->

<!-- THIS PAGE SCRIPTS ONLY -->

<script type="text/javascript" src="js/vendors/ionrangeslider/ion.rangeSlider.min.js"></script>
<!-- //END THIS PAGE SCRIPTS ONLY -->

<!-- TEMPLATE SCRIPTS -->

<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/demo.js"></script>
<script type="text/javascript" src="js/settings.js"></script>
<!-- END TEMPLATE SCRIPTS -->
</body>
 

</html>