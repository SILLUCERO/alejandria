<?php

require_once("conect.php");

$isbn = $_GET['isbn'];

$sql = "DELETE FROM alejandria WHERE isbn = '$isbn'";
$query= mysqli_query($connect, $sql);

if($query){
header('location: ./index.php');
}

?>