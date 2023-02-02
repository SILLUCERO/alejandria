<?php

    $host = 'localhost';
    $user = 'root';
    $pass = 'root' ;

    $db = 'alejandria';
    $connect = new mysqli($host, $user, $pass, $db);

    if (!$connect) {
      throw new Exception('Could not connect to database');
    }

?>