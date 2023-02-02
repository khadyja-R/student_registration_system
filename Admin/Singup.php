<?php 

include '../Inscription/connexion.php';


function is_valid_email($email)
{
    require '../Inscription/connexion.php';
     $email = $_POST['email'];
     $query = "SELECT email FROM admn WHERE email=:email LIMIT 1";
     $statement = $database->prepare($query);
     $data = [':email' => $email];
     $statement->execute($data);
     $result = $statement->fetch(PDO::FETCH_OBJ);
     if($result>0) {
      echo '<font color="red">email exist deja</font><br>';
      return false;
     }
     return true;
}
if(isset($_POST['submit'])){
      $email= $_POST['email'];
      if ((is_valid_email($email)))
{
    try{
            $insert = $database->prepare("insert into admn(email,password,confirm_pass)values(?,?,?)");
            $insert->execute([$_POST['email'],$_POST['password'],$_POST['confirm_pass']]);
            header("Location:Login.php");
        }catch (PDOException   $exception ){
            var_dump($exception);
        
        }
    }else{

        header("Location:Registre.php");

    }
}









?>