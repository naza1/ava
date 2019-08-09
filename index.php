<!DOCTYPE html>

<html lang="es">  
 <head>    
	<title>AVA</title>    
    <meta charset="UTF-8">
    <meta name="title" content="AVA - Animales varados">
    <meta name="description" content="App para fotografiar animales varados">    
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
    </script>
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
 