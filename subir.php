<?php 

  require 'conectar.php';

  $email = $_POST['email'];
  $comentarios = $_POST['comentarios'];
  $longitud = $_POST['longitud'];
  $latitud = $_POST['latitud'];
  $fecha = date("Y-m-d H:i:s");

  // // image
  $target_path = "images/";
  $target_path2 = $target_path . basename($_FILES['screenshot']['name']);
  move_uploaded_file($_FILES['screenshot']['tmp_name'], $target_path2);
  $fileName = 'ava_'.date('m-d-Y_hia') . $_FILES['screenshot']['name'];

  $sql = "INSERT INTO datos (longitud, latitud, email, comentarios, fecha, nombre_foto) 
        VALUES ('$longitud','$latitud','$email','$comentarios','$fecha', '$fileName')";
  if (mysqli_query($conn, $sql)) 
  {
    //echo "Su fotograf&iacute;a ha sido almacenada en nuestros registros.<br> Recibir&aacute; actualizaciones en el correo electr&oacute;nico registrado";
    header('Location: subir.html');
  } 
  else 
  {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
?>