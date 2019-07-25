<!DOCTYPE html>

<html lang="es">  
 <head>    
	<title>AVA</title>    
    <meta charset="UTF-8">
    <meta name="title" content="AVA - Animales varados">
    <meta name="description" content="App para fotografiar animales varados">    
    <link href="style.css" rel="stylesheet" type="text/css"/>  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
		var x = document.getElementById("demo");
        
        function getLocation() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
          } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
          }
        }
        
        function showPosition(position) {
          $.ajax({
            type: "POST",
            url: "test.php",
            data: {
              longitud: position.coords.longitude,
              latitud: position.coords.latitude
            },
            success: function(result) {
              alert(result);
            },
            error: function(result) {
              alert('error');
            }
          });
        }
    </script>
</head>  
 <body>
	<form action="subir.php" method="post">
		<!--espacio para foto!-->
		<label>E-mail</label><input type="email" size="30" name="email" id="email" required> <!--email--><br><br>
		<label>Comentarios</label><textarea rows="4" cols="50" name="comentarios" id="comentarios"></textarea><!--comentarios--><br><br>
		<!--latitud-->
		<!--<input type="hidden" name="latitud" id="latitud" value="<?//print $latitud;?>">-->
		<!--<input type="hidden" name="latitud" id="latitud" value="<?//print($_POST['latitud']);?>">-->
		
		<!--longitud-->
		<!--<input type="hidden" name="longitud" id="longitud" value="<?//print $longitud; ?>">-->
		<!--<input type="hidden" name="longitud" id="longitud" value="<?//print($_POST['longitud']);?>">-->
		<input type="hidden" name="fecha" value="<?php echo date('Y-m-d'); ?>" readonly="readonly"><!--fecha-->
		<input type="submit" value="Enviar foto">
	</form>
</body> 
</html>
 