<?php
require_once("conect.php");

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!empty($_POST['current-isbn'])) {
        update($_POST, $connect);
    } else {
        create($_POST, $connect);
    }
}

function create($data, $database) {
    $isbn = $data['isbn'];
    $editorial = $data['editorial'];
    $titulo = $data['titulo'];
    $autor = $data['autor'];
    $descripcion = $data['descripcion'];

    $imageName = uploadImage($isbn);

    $sql = "INSERT INTO alejandria (isbn, editorial, titulo, autor, descripcion, img)";
    $sql .= " VALUES ('$isbn', '$editorial', '$titulo', '$autor', '$descripcion', '$imageName')";
    print_r($data);
    echo $sql;
    $database->query($sql);
}

function update($data, $database) {
    $isbn = $data['isbn'];
    $editorial = $data['editorial'];
    $titulo = $data['titulo'];
    $autor = $data['autor'];
    $descripcion = $data['descripcion'];
    $currentIsbn = $data['current-isbn'];
    $imageName = uploadImage($isbn);

    $sql = "UPDATE alejandria
            SET isbn = '$isbn', editorial = '$editorial', titulo = '$titulo', autor = '$autor', descripcion = '$descripcion', img = '$imageName'
            WHERE isbn = '$currentIsbn'";

    $database->query($sql);
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
