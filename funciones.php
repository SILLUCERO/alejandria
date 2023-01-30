<?php
require_once("conect.php");

if(isset($_REQUEST["btn"])){
    $nombre_imagen = $_FILES["img"]["name"];
    $temporal = $_FILES["img"]["tmp_name"];
    $carpeta = "../img";
    $ruta = $carpeta."/".$nombre_imagen;
    move_uploaded_file($temporal, $carpeta."/".$nombre_imagen);

    $query = "INSERT INTO img";
};





?>