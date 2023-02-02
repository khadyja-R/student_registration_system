<?php
include 'connexion.php';

include 'validEmail.php';
include 'validPassword.php';
include 'validCin.php';
include 'validCne.php';
include 'validPhone.php';

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


$current_Data = date('Y-m-d');
$current_Data_time = strtotime ($current_Data);
$last_update_p7 = strtotime ("+7day", strtotime($last_update));
$last_update_p7 = strtotime ($last_update_p7);
function create_student($firstn,$llastn,$cin,$birth,$address,$natio,$phone,$email,$gender,$situation,$note,$cne,$password1,$cpassword,$target_file2,$target_file3,$target_file4,$target_file1,$target_file5,$target_file6,$current_Data) 
{
    include 'connexion.php';
    try{
    $insert = $database->prepare("insert into student(first_name,last_name,cin,birthday,adress,nationality,phone,email,gender,situation,bac_note,cne,password,confirm_password,bac_recto,bac_verso,releve_bac,personal_picture,Cin_Recto,Cin_Verso,last_update)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $insert->execute([$firstn,$llastn,$cin,$birth,$address,$natio,$phone,$email,$gender,$situation,$note,$cne,$password1,$cpassword
    ,$target_file2,$target_file3,$target_file4,$target_file1,$target_file5,$target_file6,$current_Data]);
    $student_id = $database->lastInsertId();
    $reg = $database->prepare("insert into registration(bac_type_id,bac_year,student_id,sector_id1,sector_id2,school_year) values(?,?,?,?,?,?)");
    $reg->execute([$_POST['bac_type'],$_POST['bac_year'],$student_id,$_POST['sector1'],$_POST['sector2'],$_POST['school_year']]);

}catch (PDOException   $exception ){
    var_dump($exception);
}
}
if (isset($_POST['submit'])){

$target_dir = "personal_images/";
$target_file1 = $target_dir . time() . basename($_FILES["personal_picture"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
move_uploaded_file($_FILES["personal_picture"]["tmp_name"], $target_file1);
$target_dir2 = "bac_images/";
$target_file2 = $target_dir2 . basename($_FILES["bac_recto"]["name"]);
$imageFileType = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
move_uploaded_file($_FILES["bac_recto"]["tmp_name"], $target_file2);
$uploadOk = 1;

$target_file3 = $target_dir2 . basename($_FILES["bac_verso"]["name"]);
$imageFileType = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
move_uploaded_file($_FILES["bac_verso"]["tmp_name"], $target_file3);
$uploadOk = 1;


$target_file4 = $target_dir2 . basename($_FILES["releve_bac"]["name"]);
$imageFileType = strtolower(pathinfo($target_file4, PATHINFO_EXTENSION));
move_uploaded_file($_FILES["releve_bac"]["tmp_name"], $target_file4);
$uploadOk = 1;


$target_dir4 = "cin_images/";

$target_file5 = $target_dir4 . basename($_FILES["Cin_Recto"]["name"]);
$imageFileType = strtolower(pathinfo($target_file5, PATHINFO_EXTENSION));
move_uploaded_file($_FILES["Cin_Recto"]["tmp_name"], $target_file5);
$uploadOk = 1;
$target_file6 = $target_dir4 . basename($_FILES["Cin_Verso"]["name"]);
$imageFileType = strtolower(pathinfo($target_file6, PATHINFO_EXTENSION));
move_uploaded_file($_FILES["Cin_Verso"]["tmp_name"], $target_file6);
$uploadOk = 1;
    // Reading form values
    $password1 = $_POST['password'];
    $cpassword = $_POST['confirm_password'];
    $email = $_POST['email'];
    $cin = $_POST['cin'];
    $cne = $_POST['cne'];
    $birth = $_POST['birthday'];
    $note = $_POST['bac_note'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $situation = $_POST['situation'];
    $address = $_POST['adress'];
    $natio = $_POST['nationality'];
    $firstn= $_POST['first_name'];
    $llastn= $_POST['last_name'];

    if ((is_valid_cin($cin)) && ( is_valid_cne($cne))    && (is_valid_phone($phone)) && (is_valid_email($email)) && (is_valid_passwords($password1,$cpassword)))
    {
        if (create_student($firstn,$llastn,$cin,$birth,$address,$natio,$phone,$email,$gender,$situation,$note,$cne,$password1, $cpassword,$target_file2,$target_file3,$target_file4,$target_file1,$target_file5,$target_file6,$current_Data)) { 
        }
           $_SESSION['index'] =" <p>Connectez vous si vous voulez <br/> Modifier <br/> Supprimer </br> Télécharger le recu de pré-inscription 
                                 </p> ";
        header("location:../Login/index.php?language=$language");
    }else{
        header("Location:PersonalInfo.php?language=$language");
    }  
}
?>