<?php 

require 'conectar.php';
$email = $_POST['email'];
$comentarios = $_POST['comentarios'];
$fecha = $_POST['fecha'];
$sql = "INSERT INTO datos (email,comentarios,fecha) VALUES ('$email','$comentarios','$fecha')";
if (mysqli_query($conn, $sql)) {
      echo "Su fotografía ha sido enviada";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>

