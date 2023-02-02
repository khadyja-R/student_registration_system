<?php   
 //logout.php  
 session_start();  
 include "../accueil/Languages.php";
$en_select='';
$fr_select='';		
$language='';
if((isset($_GET['language']) && $_GET['language']=='fr') || !isset($_GET['language'])){
	$fr_select='selected';	
	$language='fr';
}else{
	$en_select='selected';
	$language='en';
}
 session_destroy();  
 header("location:../Login/index.php?language=$language");
 ?>  