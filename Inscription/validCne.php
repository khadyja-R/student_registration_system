<?php 

session_start();

function is_valid_cne($cne)

{
    require 'connexion.php';
     $cne = $_POST['cne'];
     $query = "SELECT cne FROM student WHERE cne=:cne LIMIT 1";
     $statement = $database->prepare($query);
     $data = [':cne' => $cne];
     $statement->execute($data);
     $result = $statement->fetch(PDO::FETCH_OBJ);

     if($result>0) {
        $_SESSION['cn']="cne existe déjà veuillez entrer un nouveau"  ;  
        return false;
     }
     return true;
}

?>
