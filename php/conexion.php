<?php
include 'credenciales.php';
include_once 'islogin.php';

$database = "tp_edi";
$user     = 'root';
$password = '';

try {
    $con = new PDO('mysql:host=localhost;dbname=' . $database, $user, $password);
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}

include_once 'class.DBImagen.php';
$DBImagen = new DBImagen($con);
