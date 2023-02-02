<?php 
session_start();

function is_valid_cin($cin)

{
    require 'connexion.php';
     $cin = $_POST['cin'];
     $query = "SELECT cin FROM student WHERE cin=:cin LIMIT 1";
     $statement = $database->prepare($query);
     $data = [':cin' => $cin];
     $statement->execute($data);
     $result = $statement->fetch(PDO::FETCH_OBJ);

     if($result>0) {
        $_SESSION['ci']=" cin existe déjà veuillez entrer un nouveau";  
        return false;
     }
     return true;
}

?>

