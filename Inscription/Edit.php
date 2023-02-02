<?php
session_start();
include '../Inscription/connexion.php';

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

if(isset($_POST['Edit']))
{
    $student_id = $_POST['id'];
    $email = $_POST['email'];
    $cin = $_POST['cin'];
    $cne = $_POST['cne'];
    $birthday = $_POST['birthday'];
    $bac_note = $_POST['bac_note'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $situation = $_POST['situation'];
    $adress = $_POST['adress'];
    $nationality = $_POST['nationality'];
    $first_name= $_POST['first_name'];
    $last_name= $_POST['last_name'];
    $bacttype = $_POST['bac_type'];
    $sector1 = $_POST['sector1'];
    $sector2= $_POST['sector2'];
    $bacyear= $_POST['bac_year'];
    $limite = $_POST['limite'];
    $schoolyear= $_POST['school_year'];
    $bac_type_id = $_POST['bac_type'];

    try {
        $query = "UPDATE student SET first_name=:first_name,last_name=:last_name,cin=:cin,birthday=:birthday,adress=:adress,nationality=:nationality,phone=:phone,email=:email
        ,gender=:gender,situation=:situation,bac_note=:bac_note,cne=:cne,limite=limite+1  WHERE id=:id LIMIT 1";
        $statement = $database->prepare($query);
        $statement->bindParam(':id',$student_id, PDO::PARAM_INT);
        $statement->bindParam(':first_name',$first_name,);
        $statement->bindParam(':last_name', $last_name);
        $statement->bindParam(':cin', $cin);
        $statement->bindParam(':birthday',$birthday);
        $statement->bindParam(':adress',$adress);
        $statement->bindParam(':nationality',$nationality);
        $statement->bindParam(':phone', $phone);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':gender', $gender);
        $statement->bindParam(':situation', $situation);
        $statement->bindParam(':bac_note', $bac_note);
        $statement->bindParam(':cne', $cne);
        $query_execute = $statement->execute();
        $query = "UPDATE registration SET bac_type_id=:bac_type_id, bac_year=:bacyear,sector_id1=:sector1,sector_id2=:sector2,school_year=:schoolyear
         WHERE student_id=:id LIMIT 1";
       $statement = $database->prepare($query);
       $statement->bindParam(':id',$student_id, PDO::PARAM_INT);
       $statement->bindParam(':bac_type_id',$bac_type_id);
       $statement->bindParam(':bacyear',$bacyear);
       $statement->bindParam(':sector1',$sector1);
       $statement->bindParam(':sector2', $sector2);
       $statement->bindParam(':schoolyear',$schoolyear);
       $query_execute2 = $statement->execute();
        if($query_execute && $query_execute2)
        {
            header("Location:info.php?id=".$student_id."&language=".$language);
            $_SESSION['message'] = "modifier avec succés";
            exit(0);
        }
        else
        {
            header("Location:info.php?id=".$student_id."&language=".$language);
            $_SESSION['message'] = "Pas modifier";
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else{
    $_SESSION['err']="It has not gone  ";
}

?>