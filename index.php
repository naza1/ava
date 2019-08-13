<!DOCTYPE html>

<html lang="es">  
 
    <script>
      window.onload = function() {
        getLocation ();
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
      .then(function(reg){
        console.log("Está!");
      }).catch(function(err) {
        console.log("No, hay un error ", err)
      });
  }

    </script>
<head>
  <meta charset="utf-8">
  <base href="/">
  <title>AVA | Animales Varados y Atropellados</title>

  <link href="style/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="style/animate.min.css" rel="stylesheet" type="text/css">
  <link href="style/addtohomescreen.css" rel="stylesheet" type="text/css">

  <link href="style/main.css" rel="stylesheet" type="text/css">
  <link rel="shortcut icon" href="favicon.ico">

  <meta name="apple-mobile-web-app-title" content="2048 PWA">

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
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#54E5AA">
<meta name="msapplication-TileImage" content="img/apple-icon-144x144.png">
<meta name="theme-color" content="#54E5AA">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="manifest" href="manifest.json">
</head>
</head>  
<body>
  <div id="container">
    <div class="select">
      <label for="videoSource">Video source: </label><select id="videoSource"></select>
    </div>
    <video id="video" autoplay muted></video>
    <button id="screenshot-button">Tomar captura</button>
    <canvas id="canvas" width="640" height="480" type="file"></canvas>
    <script async src="js/main.js"></script>
</div>

	<form id="form" action="subir.php" method="post" enctype="multipart/form-data">
		<label>E-mail</label><input type="email" size="30" name="email" id="email" required> <!--email--><br><br>
		<label>Comentarios</label><textarea rows="4" cols="50" name="comentarios" id="comentarios"></textarea><!--comentarios--><br><br>
		<input type="hidden" name="latitud" id="latitud" value="">
		<input type="hidden" name="longitud" id="longitud" value="">
    <input type="hidden" name="screenshot" id="screenshot" value="">
		<input type="submit" value="Enviar foto">
	</form>

  <script>
    const FORM = document.querySelector('#form');  
      FORM.addEventListener('submit', function () {    
        document.getElementById('screenshot').value = canvas.toDataURL("image/png");
      });

     </script>
  
</body> 
</html>
 