<?php
require '../Inscription/connexion.php';
session_start();  
  
      if(isset($_POST["Login"]))
      {
        try
      {   
                $query = "SELECT * FROM admn WHERE email = :email AND password = :password";  
                $statement = $database->prepare($query);  
                $statement->execute(  
                     array(  
                          'email'     =>     $_POST["email"],  
                          'password'     =>     $_POST["password"] , 
                     )  
                );  
                $count = $statement->rowCount();
                if($count > 0)  
                {  
                     $_SESSION["email"] = $_POST["email"];  
                     $_SESSION['seccess']= "Bonjour";
                     header("location:./displayPage.php");  
                }  
                  else{
                $_SESSION['err']= "Email ou le mot de passe est incorrect";
                  }
           } catch(PDOException $error)  
           {  
                $message = $error->getMessage();  
           } 
      }  
 ?>
<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Style -->
    <title>Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="wrapper">
        <div class="logo">
            <img src="data:image/jpeg;base64,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"
                alt="">

            </p>
        </div>
        <div class="text-center mt-4 name">
            Connexion

        </div>
        <?php  
                if(isset($_SESSION['err']))  
                {  
                  ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['err']; ?>
            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
        </div>
        <?php 
                     unset($_SESSION['err']);
                }  
                ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="email" id="userName" placeholder="Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Mot de Passe">

            </div>
            <input type="checkbox" name="show-password" class="show-password a11y-hidden" id="show-password"
                onclick="myFunction()" tabindex="3" />
            <label class="label-show-password" for="show-password">
                <span>Montrer le mot de passe</span>
            </label>
            <button class="btn mt-3" name="Login">Connexion</button>
        </form>
        <div class="text-center fs-6">
            <a href="#"></a> <a href="Registre.php">Sign up</a>
        </div>
    </div>


</body>
<script>
function myFunction() {
    var x = document.getElementById("pwd");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>

</html>