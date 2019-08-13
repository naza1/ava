<?php
$servername = "localhost";
$database = "proyecto_ava";
$username = "proyecto_ava";
$password = "Lerner-10";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Fallo la conexión " . mysqli_connect_error());
}
echo "Conectó bien!";

?>