<?php
$servername = "localhost";
$database = "proyecto_ava";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Fallo la conexión " . mysqli_connect_error());
}
?>