<?php 
session_start();

function is_valid_email($email)

{
    require 'connexion.php';
     $email = $_POST['email'];
     $query = "SELECT email FROM student WHERE email=:email LIMIT 1";
     $statement = $database->prepare($query);
     $data = [':email' => $email];
     $statement->execute($data);
     $result = $statement->fetch(PDO::FETCH_OBJ);

     if($result>0) {
        $_SESSION['em']="ce email  existe déjà veuillez entrer un nouveau"  ;  
        return false;
     }
     return true;
}

?>

