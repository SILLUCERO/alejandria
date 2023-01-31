<?php
require_once("conect.php");

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['edit'])) {
        update($_POST['isbn']);
    } else {
        create($_POST['isbn']);
    }
}

function create($isbn) {
    $imageName = uploadImage($isbn);
}

function update($isbn) {
    
}

function uploadImage($isbn) {
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['foto']['tmp_name'];
        $filename =  $_FILES['foto']['name'];
        $filenameParts = explode('.', $filename);
        $extension = strtolower(end($filenameParts));
        $newFilename = $isbn . '.' . $extension;        
$destinationPath = './assets/images/' . $newFilename;
        move_uploaded_file($fileTmpPath, $destinationPath);
        return $newFilename;
    }
}
/* if(isset($_REQUEST[""])){
    $nombre_imagen = $_FILES["imagen"]["titulo"];
    $temporal = $_FILES["imagen"]["tmp_name"];
    $carpeta = "../img";
    $ruta = $carpeta."/".$nombre_imagen;
    move_uploaded_file($temporal, $carpeta."/".$nombre_imagen);

    $query = "INSERT INTO ";
}; */
