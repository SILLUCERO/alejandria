<?php

    $host = 'localhost';
    $user = 'root';
    $pass = '' ;

    $db = 'alejandria';
    $connect = mysqli_connect($host,$user,$pass,$db);

    if ($connect){
      echo 'conexion ok';
    }

?>