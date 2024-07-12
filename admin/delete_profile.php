<?php
 
 	include("../config.php");
  	$identity = ''; 
	 
	$identity = $_GET['mixhtyr12noitcudorpobguhtennek007'];

	 if(!$identity == '')
	 {
	 	echo  "<script>window.history.back();</script>";
	 }
  
      $sql = "DELETE FROM presidents WHERE id ='{$identity}'";
      $result = mysqli_query($conn,$sql);  
	  echo 'processing...';

	  header("location:view-president.php");	

	  //echo  "<script>window.history.back();</script>";
	
 
 ?>
 