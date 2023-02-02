<?php 
session_start();
function is_valid_phone($phone)

{
    require 'connexion.php';
     $phone = $_POST['phone'];
     $query = "SELECT phone FROM student WHERE phone=:phone LIMIT 1";
     $statement = $database->prepare($query);
     $data = [':phone' => $phone];
     $statement->execute($data);
     $result = $statement->fetch(PDO::FETCH_OBJ);

     if($result>0) {
       $_SESSION['phon']="ce numéro de téléphone existe déjà veuillez entrer un nouveau  "  ;  
      return false;
     }
     return true;
}

?>

