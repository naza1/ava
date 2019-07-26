<?php 

require 'conectar.php';
$email = $_POST['email'];
$comentarios = $_POST['comentarios'];
$fecha = $_POST['fecha'];
$longitud = $_POST['longitud'];
$latitud = $_POST['latitud'];

$sql = "INSERT INTO datos (longitud,latitud,email,comentarios,fecha) VALUES ('$longitud','$latitud','$email','$comentarios','$fecha')";
if (mysqli_query($conn, $sql)) {
      echo "Su fotografía ha sido enviada";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>

