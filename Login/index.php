<?php
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
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Style -->
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php  
          if(isset($_SESSION['err']))  
                {  
                  ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['err']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
                     unset($_SESSION['err']);
                }elseif(isset($_SESSION['index'])){
                  ?>
    <div class="alert alert-success" role="alert">
        <?= $_SESSION['index']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
                unset($_SESSION['index']);
                }
                ?>
    <form method="post" action="Login.php" id="login-form" class="login-form" autocomplete="off" role="main">

        <div>
            <label class="label-email">
                <input type="email" class="text" name="email" placeholder="Email" tabindex="1" required />
                <span class="required"><?php  echo $login[$language]['0'] ?></span>
            </label>
        </div>
        <input type="checkbox" name="show-password" class="show-password a11y-hidden" id="show-password" tabindex="3" />
        <label class="label-show-password" for="show-password">
            <span><?php  echo $login[$language]['2'] ?></span>
        </label>
        <div>
            <label class="label-password">
                <input type="text" class="text" name="password" placeholder="Password" tabindex="2" required />
                <span class="required"><?php  echo $login[$language]['1'] ?></span>
            </label>
        </div>
        <input type="submit" value="<?php  echo $login[$language]['3'] ?>" name="Login" />

        <div class="email"> </div>
        <figure aria-hidden="true">
            <div class="person-body"></div>
            <div class="neck skin"></div>
            <div class="head skin">
                <div class="eyes"></div>
                <div class="mouth"></div>
            </div>
            <div class="hair"></div>
            <div class="ears"></div>
            <div class="shirt-1"></div>
            <div class="shirt-2"></div>
        </figure>
    </form>
</body>

</html>