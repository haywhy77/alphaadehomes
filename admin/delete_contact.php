<?php
 
 	include("../config.php");
  	$identity = ''; 
	 
	$identity = $_GET['mixhtyr12noitcudorpobguhtennek007'];

	 if(!$identity == '')
	 {
	 	echo  "<script>window.history.back();</script>";
	 }
  
      $sql = "DELETE FROM contact_kdm WHERE id ='{$identity}'";
      $result = mysqli_query($conn,$sql);  
	  echo 'processing...';

	  header("location:index.php");	

	  //echo  "<script>window.history.back();</script>";
	
 
 ?>
 