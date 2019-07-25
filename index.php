<!DOCTYPE html>

<html lang="es">  
 <head>    
	<title>AVA</title>    
    <meta charset="UTF-8">
    <meta name="title" content="AVA - Animales varados">
    <meta name="description" content="App para fotografiar animales varados">    
    <!--<link href="style.css" rel="stylesheet" type="text/css"/>-->
    <script>
      window.onload = function() {
        getLocation ();
      };
        function getLocation() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
          } else { 
          }
        }

        function showPosition(position) {
          document.getElementById('latitud').value = position.coords.longitude;
          document.getElementById('longitud').value = position.coords.longitude;
        }
    </script>
</head>  
 <body>
	<form action="subir.php" method="post">
		<!--espacio para foto!-->
		<label>E-mail</label><input type="email" size="30" name="email" id="email" required> <!--email--><br><br>
		<label>Comentarios</label><textarea rows="4" cols="50" name="comentarios" id="comentarios"></textarea><!--comentarios--><br><br>
		<input type="hidden" name="latitud" id="latitud" value="">
		<input type="hidden" name="longitud" id="longitud" value="">
		<input type="hidden" name="fecha" value="<?php echo date('Y-m-d'); ?>" readonly="readonly"><!--fecha-->
		<input type="submit" value="Enviar foto">
	</form>
</body> 
</html>
 