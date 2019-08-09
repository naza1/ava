<?php 

require 'conectar.php';
$email = $_POST['email'];
$comentarios = $_POST['comentarios'];
$longitud = $_POST['longitud'];
$latitud = $_POST['latitud'];
$fecha = date("Y-m-d H:i:s");

// image
$target_path = "images/";
$img = $_POST['screenshot'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$fileName = 'ava_'.date('m-d-Y_hia').".png";
$file = $target_path.$fileName;
$success = file_put_contents($file, $data);

$sql = "INSERT INTO datos (longitud, latitud, email, comentarios, fecha, nombre_foto) 
      VALUES ('$longitud','$latitud','$email','$comentarios','$fecha', '$fileName')";
if (mysqli_query($conn, $sql)) {
      echo "Su fotografía ha sido enviada";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>

