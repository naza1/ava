<!DOCTYPE html>
<html lang="es">  
<head>
  <script>
    window.onload = function() {
      getLocation ();
      const FORM = document.querySelector('#form');  
      FORM.addEventListener('submit', function () {    
        //document.getElementById('screenshot').value = canvas.toDataURL("image/png");
        //document.getElementById('screenshot').value = document.getElementById('file-preview').getAttribute('src');
      });
    };

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } 
    }

    function showPosition(position) {
      document.getElementById('latitud').value = position.coords.latitude;
      document.getElementById('longitud').value = position.coords.longitude;
    }

    //Registro del service worker
    if ('serviceWorker' in navigator) {
      console.log("Está el SW registrado?");
      navigator.serviceWorker.register('sw.js')
        .then(function(reg) {
          console.log("Está!");
        })
        .catch(function(err) {
          console.log("No, hay un error ", err)
        });
    }
  </script>

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
  <script async src="js/main.js"></script>
</head> 
<body>
<header>
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
 </header>
 <!--upload de la imagen-->
<div class="wrap">
	<div id="file-preview-zone">
			<p class="vistaprevia">VISTA PREVIA</p>
			</div>
		<div class="image-upload">
			<label for="file-upload">
				<img src="img/boton_pic.png"/>
			</label>
				<input type="file" accept="image/jpeg" capture="camera" id="file-upload">
		</div>
</div>
 <!--formulario-->
<div class="wrap1">
	<div class="formulario">
		<form id="form" action="subir.php" method="post" enctype="multipart/form-data">
				<label><img src="img/email.png" alt="logo AVA" id="form-img"></label><input type="email" size="30" name="email" id="email" placeholder="E-mail" class="campos" required> <!--email--><br><br>
				<label><img src="img/comentarios.png" alt="logo AVA" id="form-img"></label><input type="comentarios" size="30" name="comentarios" id="comentarios" placeholder="Comentarios" class="campos" required><!--comentarios--><br><br>
				<input type="hidden" name="latitud" id="latitud" value="">
				<input type="hidden" name="longitud" id="longitud" value="">
				<input type="hidden" name="screenshot" id="screenshot" value="">
	</div>
				  
 </div>		
 <!--botón enviar--> 
<div class="wrap">
				<input type="submit" value="ENVIAR FOTO" class="button"/>
		</form>
</div>
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
 