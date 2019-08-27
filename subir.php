<!DOCTYPE html>

<html lang="es">  
<head>
<meta charset="utf-8">
  <title>AVA | Animales Varados y Atropellados</title>


<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/imgeffect.css" />
<link rel="shortcut icon" href="favicon.ico">	

  <meta name="apple-mobile-web-app-title" content="AVA | Animales Varados y Atropellados">

  <link rel="apple-touch-startup-image" href="img/apple-touch-startup-image-640x1096.png"
    media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)">
  <!-- iPhone 5+ -->
  <link rel="apple-touch-startup-image" href="img/apple-touch-startup-image-640x920.png"
    media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)">
  <!-- iPhone, retina -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="msapplication-TileColor" content="#54E5AA" />
  <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
  <meta name="msapplication-TileColor" content="#54E5AA">
  <meta name="msapplication-TileImage" content="img/apple-icon-144x144.png">
  <meta name="theme-color" content="#54E5AA">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <link rel="manifest" href="manifest.json">
  
</head> 
<body>

	<div class="header_bg">
					<div class="wrap">
						<div class="header">
							<!--------logo------>
							<div class="logo">
								<a href="index.php"><img src="img/Logo-ava-01.png" alt="" /></a>
							</div>	
							<!--------finde-logo--------->
							<!----start-nav-------->	
							<div class="nav">
								<div id="leyenda">
									Animales Varados <br/>y Atropellados
								</div>
							</div>
							<!-----end-nav-------->
							<div class="clear"> </div>
						</div>
					</div>
	</div>

 <div class="mensaje">
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
    echo "Su fotograf&iacute;a ha sido almacenada en nuestros registros.<br> Recibir&aacute; actualizaciones en el correo electr&oacute;nico registrado";
  } 
  else 
  {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
?>

</div>
<a href="index.php" class="button2"> Subir otra fotograf&iacute;a</a>
 <!--footer--> 			  
<div class="footer-bottom">
     	<div class="wrap">
        <div class="copy">
		    <p class="copy">AVA: Animales Varados y Atropellados. <br/>Copyright 2019</p>
		</div>
	</div>
</div>
</body> 
</html>