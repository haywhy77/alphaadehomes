<?php   
session_start(); 

$InboxCount = 0;

if (!isset($_SESSION['login_user'])){header ("Location:login.php");}

include("../config.php"); 
ini_set("display_errors","on");
date_default_timezone_set('UTC');
$Date = date("l, j-F-Y"); 
$Time = date("g:i:s A");  
$ID = $_SESSION['login_user']; 
$Nomencleture = 'Home';


if($ID == "")
{header("location:login.php");}
  
?>


<?php error_reporting(0); ?>

<!DOCTYPE html><html lang="en">

<head>
	<title>KnowDemWell - Administrator</title>
	<!-- META SECTION -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1"> 

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- END META SECTION -->
	<!-- CSS INCLUDE -->
	<link rel="stylesheet" href="css/styles2c70.css?v=1.0.3">
	<!-- EOF CSS INCLUDE -->
	<link rel="icon" type="image/png" href="img/logo.jpg"/>


        <script src="jquery.min.js"></script>
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
            $("#add_more").click(function(){
                let $el = $('.child').first().clone();
                console.log("Cloned: ", $el.length)
                $('#filediv').append($el);
            })
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

</head>

<body class="indent indent--rounded indent--shadowed" style="background: linear-gradient(to right,#000, 0, #16181d 100%); font-family: Comfortaa,Arial,Helvetica Neue,Helvetica,serif,sans-serif;">
	<!-- PAGE WRAPPER -->
<div class="page page--w-header page--w-container">
<!-- PAGE HEADER -->
<header class="page__header ">

<div class="logo-holder" style="border-radius: 100px;">
<a href="index.php" class="logo-text d-none d-lg-block">
<img src="img/logo.png" style="height: 35px;" />
</a> 
<a href="index.php" class="logo-text d-lg-none">
<strong class="text-primary">M</strong><strong>W</strong></a>
</div>
 



<div class="box-fluid"></div>
 
</header>
<!-- //END PAGE HEADER -->

	<!-- PAGE CONTAINER -->

	<div class="page__container invert">
		<nav class="horizontal-navigation">
			<button class="btn btn-light btn--icon" data-action="horizontal-show">
				<span class="fa fa-bars"></span> Toggle navigation</button>

<ul>

<li class="title">Main</li>

<li class="openable">
<a href="#"><span class="icon li-home"></span> <span class="text"><?php echo $Nomencleture; ?></span></a>
<ul> 
<li><a href="index.php" class="no-icon"><span class="text">Dashboard</span></a></li> 
</ul>
</li>



<li class="openable">
<a href="#"><span class="icon li-group-work"></span> <span class="text">Add Candidates</span></a>
<ul>
<li><a href="add-project.php" class="no-icon"><span class="text">Add Presidential</span></a></li>  
<li><a href="view-project.php" class="no-icon"><span class="text">Add Legislative</span></a></li>    
<li><a href="view-project.php" class="no-icon"><span class="text">Add House of Assembly</span></a></li>    
<li><a href="view-project.php" class="no-icon"><span class="text">Add Governorship</span></a></li>    
<li><a href="view-project.php" class="no-icon"><span class="text">Add LGA</span></a></li>    
</ul>
</li> 

<li class="openable">
<a href="#"><span class="icon li-bubble-dots"></span> <span class="text">View Candidates</span></a>
<ul>
<li><a href="add-project.php" class="no-icon"><span class="text">View Presidential</span></a></li>  
<li><a href="view-project.php" class="no-icon"><span class="text">View Legislative</span></a></li>    
<li><a href="view-project.php" class="no-icon"><span class="text">View Reps Members</span></a></li>    
<li><a href="view-project.php" class="no-icon"><span class="text">View Assembly Members</span></a></li>    
<li><a href="view-project.php" class="no-icon"><span class="text">View Governorship</span></a></li>    
<li><a href="view-project.php" class="no-icon"><span class="text">View LGAs</span></a></li>    
</ul>
</li> 

<li class="openable">
<a href="#"><span class="icon li-group-work"></span> <span class="text">Add Executives</span></a>
<ul>
<li><a href="add-presidents.php" class="no-icon"><span class="text">Add Presidents</span></a></li>  
<li><a href="view-project.php" class="no-icon"><span class="text">Add Vice Presidents</span></a></li>    
</ul>
</li> 

<li class="openable">
<a href="#"><span class="icon li-bubble-dots"></span> <span class="text">View Executives</span></a>
<ul>
<li><a href="view-president.php" class="no-icon"><span class="text">View Presidents</span></a></li>  
<li><a href="view-project.php" class="no-icon"><span class="text">View Vice Presidents</span></a></li>    
</ul>
</li>  

<li class="openable">
<a href="#"><span class="icon li-group-work"></span> <span class="text">Add Legislature</span></a>
<ul>
<li><a href="add-project.php" class="no-icon"><span class="text">Add Senators</span></a></li>  
<li><a href="view-project.php" class="no-icon"><span class="text">Add House of Reps.</span></a></li>    
<li><a href="view-project.php" class="no-icon"><span class="text">Add House of Assembly</span></a></li>    
</ul>
</li> 

<li class="openable">
<a href="#"><span class="icon li-bubble-dots"></span> <span class="text">View Legislators</span></a>
<ul>
<li><a href="add-project.php" class="no-icon"><span class="text">View Senators</span></a></li>  
<li><a href="view-project.php" class="no-icon"><span class="text">View House of Reps.</span></a></li>    
<li><a href="view-project.php" class="no-icon"><span class="text">View House of Assembly</span></a></li>    
</ul>
</li>  

<li class="openable">
<a href="#"><span class="icon li-cog"></span> <span class="text">Setting</span></a>
<ul>
<li><a href="setting.php" class="no-icon"><span class="text">Change Credentials</span></a></li> 
</ul>
</li> 



<li class="openable">
<a href="#"><span class="icon li-user"></span> <span class="text">Logout</span></a>
<ul>
<li><a href="logout.php" class="no-icon"><span class="text">Logout</span></a></li> 
</ul>
</li> 



</ul></nav></div>
<!-- //END PAGE CONTAINER -->