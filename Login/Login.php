<?php

include '../Inscription/connexion.php';
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
try  
 {  
      if(isset($_POST["Login"]))  
      {  
           if(empty($_POST["email"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM student WHERE email = :email AND password = :password";  
                $statement = $database->prepare($query);  
                $statement->execute(  
                     array(  
                          'email'     =>     $_POST["email"],  
                          'password'     =>      $_POST["password"] , 
                     )  
                );  
                $count = $statement->rowCount();  
                var_dump($id[0]);
                if($count > 0)  
                {  
                     $_SESSION["password"] = $_POST["password"]; 
                    $idrow = $statement->fetch(PDO::FETCH_OBJ);
                    $_SESSION['id']=$idrow->id; 
                    $_SESSION['adress']=$idrow->adress;
                    $_SESSION['status']= "Connectez  avec succès";
                    header("location: ../Inscription/info.php?id=".$idrow->id ."&language=".$language);       
                }  
                else  
                {  

                    $_SESSION['err'] =   $msg[$language]['2'] ;
                    header("location:index.php?language=$language");
               }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }