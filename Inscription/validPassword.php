<?php 
session_start();
function is_valid_passwords($password1,$cpassword) 
{
     if ($password1 != $cpassword) {
        $_SESSION['pass']="le  mot de passe ne correspondent pas. Veuillez saisir attentivement";
         return false;
     }
     return true;
}