<?php 
include("header.php");
 $identity = $_GET['htennek007'];
 
	$result = $conn->query("SELECT * FROM presidents where id = {$identity}");
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
    $verdict  = $row['verdict'];


    $index1 = $row['index1'];
    $promise1 = $row['promise1'];
    $doings1 = $row['doings1'];
    $signal1 = $row['signal1'];


    $index2  = $row['index2'];   
    $promise2 = $row['promise2'];
    $doings2 = $row['doings2'];
    $signal2 = $row['signal2'];


    $index3  = $row['index3'];    
    $promise3 = $row['promise3'];
    $doings3 = $row['doings3'];
    $signal3 = $row['signal3'];

    $index4  = $row['index4'];       
    $promise4 = $row['promise4'];
    $doings4 = $row['doings4'];
    $signal4 = $row['signal4'];


    $index5  = $row['index5'];       
    $promise5 = $row['promise5'];
    $doings5 = $row['doings5'];
    $signal5 = $row['signal5'];


    $index6  = $row['index6'];       
    $promise6 = $row['promise6'];
    $doings6 = $row['doings6'];
    $signal6 = $row['signal6'];


    $index7  = $row['index7'];       
    $promise7 = $row['promise7'];
    $doings7 = $row['doings7'];
    $signal7 = $row['signal7'];

	$date_uploaded = $row['date'];	 
	$images  = $row['images']; 


$dob = date("d F Y", strtotime($dob));


	 
	    }
	}

?>

<!-- PAGE CONTENT WRAPPER -->
<div class="page__content page-aside--hidden" id="page-content">

<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to delete profile?');
}
</script>
<style>
    
    li{ padding-top:10px; }
</style>



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
<div class="card-body padding-top-10 padding-bottom-10">
<div class="row padding-top-1 padding-bottom-1">
<div class="col-12">
<?php
    echo '<img src="'.$images.'" style="height: 200px; max-width:200px; padding-left:10px important!;">';
?>

</div>
<div class="logo-holder logo-holder--xl logo-holder--wide">

<div class="logo-text d-none d-lg-block">

<strong> <?php echo $fullname; ?> </strong></div>
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
<strong>Date of Birth: </strong><?php echo $dob; ?> OR 29 March 1952 OR 29 March 1954</li><li>
<strong>Occupation: </strong><?php echo $occupation; ?></li><li>
<strong>State of Origin: </strong><?php echo $state; ?></li><li>
<strong>Religion: </strong><?php echo $religion; ?></li><li>
<strong>Political Party: </strong><?php echo $party; ?></li><li>
<strong>Ideology: </strong><?php echo $ideology; ?></li><li>
<strong>Verdict: </strong><?php echo $verdict; ?></li>
</ul>
</div></div></div>


 
<div class="card-body">
<div class="card-inner-container">
<div class="form-row"> 
<ul>
<li><strong>Manifesto: </strong><?php echo $manifesto; ?></li>
</ul>
</div></div></div>

<div class="card-body">
<div class="card-inner-container">
<div class="form-row"> 
<ul>
<li><strong><?php echo $index1; ?></strong></li>


<?php
$prom1 = explode("^",$promise1); 
$doin1 = explode("^", $doings1);
$sig1 = explode("^", $signal1);
$j = 0;
foreach ($prom1 as $i => $value)
{
    $j++;
        echo '<li><strong>Promise['.$j.']: </strong>'.$prom1[$i].'</li>
        <li><strong>Actual Doings['.$j.']: </strong>'.$doin1[$i].'</li>
        <li><strong>Performance Signal['.$j.']: </strong>'.$sig1[$i].'</li><p>';
     
}
?>

</ul>
</div></div></div>

 
<div class="card-body">
<div class="card-inner-container">
<div class="form-row"> 
<ul>
<li><strong><?php echo $index2; ?></strong></li>
<?php
$prom2 = explode("^",$promise2); 
$doin2 = explode ("^", $doings2);
$sig2 = explode("^", $signal2);
$j = 0;
foreach ($prom2 as $i => $value)
{
    $j++;
        echo '<li><strong>Promise['.$j.']: </strong>'.$prom2[$i].'</li>
        <li><strong>Actual Doings['.$j.']: </strong>'.$doin2[$i].'</li>
        <li><strong>Performance Signal['.$j.']: </strong>'.$sig2[$i].'</li><p>';
     
}
?>
</ul>
</div></div></div>


<div class="card-body">
<div class="card-inner-container">
<div class="form-row"> 
<ul>
<li><strong><?php echo $index3; ?></strong></li>
<?php
$prom3 = explode("^",$promise3); 
$doin3 = explode("^", $doings3);
$sig3 = explode("^", $signal3);
$j = 0;
foreach ($prom3 as $i => $value)
{
    $j++;
        echo '<li><strong>Promise['.$j.']: </strong>'.$prom3[$i].'</li>
        <li><strong>Actual Doings['.$j.']: </strong>'.$doin3[$i].'</li>
        <li><strong>Performance Signal['.$j.']: </strong>'.$sig3[$i].'</li><p>';
     
}
?>
</ul>
</div></div></div>


<div class="card-body">
<div class="card-inner-container">
<div class="form-row"> 
<ul>
<li><strong><?php echo $index4; ?></strong></li>
<?php
$prom4 = explode("^",$promise4); 
$doin4 = explode("^", $doings4);
$sig4 = explode("^", $signal4);
$j = 0;
foreach ($prom4 as $i => $value)
{
    $j++;
        echo '<li><strong>Promise['.$j.']: </strong>'.$prom4[$i].'</li>
        <li><strong>Actual Doings['.$j.']: </strong>'.$doin4[$i].'</li>
        <li><strong>Performance Signal['.$j.']: </strong>'.$sig4[$i].'</li><p>';
     
}
?>
</ul>
</div></div></div>


<div class="card-body">
<div class="card-inner-container">
<div class="form-row"> 
<ul>
<li><strong><?php echo $index5; ?></strong></li>
<?php
$prom5 = explode("^",$promise5); 
$doin5 = explode("^", $doings5);
$sig5 = explode("^", $signal5);
$j = 0;
foreach ($prom5 as $i => $value)
{
    $j++;
        echo '<li><strong>Promise['.$j.']: </strong>'.$prom5[$i].'</li>
        <li><strong>Actual Doings['.$j.']: </strong>'.$doin5[$i].'</li>
        <li><strong>Performance Signal['.$j.']: </strong>'.$sig5[$i].'</li><p>';
     
}
?>
</ul>
</div></div></div>


<div class="card-body">
<div class="card-inner-container">
<div class="form-row"> 
<ul>
<li><strong><?php echo $index6; ?></strong></li>
<?php
$prom6 = explode("^",$promise6); 
$doin6 = explode("^", $doings6);
$sig6 = explode("^", $signal6);
$j = 0;
foreach ($prom6 as $i => $value)
{
    $j++;
        echo '<li><strong>Promise['.$j.']: </strong>'.$prom6[$i].'</li>
        <li><strong>Actual Doings['.$j.']: </strong>'.$doin6[$i].'</li>
        <li><strong>Performance Signal['.$j.']: </strong>'.$sig6[$i].'</li><p>';
     
}
?>
</ul>
</div></div></div>


<div class="card-body">
<div class="card-inner-container">
<div class="form-row"> 
<ul>
<li><strong><?php echo $index7; ?></strong></li>
<?php
$prom7 = explode("^",$promise7); 
$doin7 = explode("^", $doings7);
$sig7 = explode("^", $signal7);
$j = 0;
foreach ($prom7 as $i => $value)
{
 $j++;
        echo '<li><strong>Promise['.$j.']: </strong>'.$prom7[$i].'</li>
        <li><strong>Actual Doings['.$j.']: </strong>'.$doin7[$i].'</li>
        <li><strong>Performance Signal['.$j.']: </strong>'.$sig7[$i].'</li><p>';
     
}
?>
</ul>
</div></div></div>






<div class="form-group" >
<a class="btn btn-secondary btn-block" href="edit-president.php?mixhtyr12noitcudorpobguhtennek007=<?php echo $identity; ?>">Edit Profile</a>
</div>
  

<div class="form-group" >
<a class="btn btn-danger btn-block remove" href="delete_profile.php?mixhtyr12noitcudorpobguhtennek007=<?php echo $identity; ?>" onclick="return confirm('Are you sure you want to delete profile?')">Delete Profile</a>
</div>
  

 

</div></div>


 




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