<?php
$username="root";
$password="";
$database = new pdo("mysql:host=localhost;dbname=inscription;charset=utf8;", $username, $password);
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>