<!DOCTYPE html>
<html lang="es">  
<head>
<meta charset="utf-8">
  <title>AVA | Animales Varados y Atropellados</title>
  
  <link href="style.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="shortcut icon" href="favicon.ico">	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="style.js"></script>
 </head>
 <body>
<header>
	<div class="header_bg">
			
		<!--------logo------>
			<img src="../img/Logo-ava-01.png" alt="" class="logo"/>
		<!--------finde-logo--------->
	</div>
 </header>
<section>
<h1>Recolección de datos de AVA</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Email</th>
          <th>Comentarios</th>
          <th>Fecha</th>
          <th>Latitud</th>
		  <th>Longitud</th>
		  <th>Imágenes</th>		  
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
<?php
  require '../conectar.php';

  $sql = "SELECT * FROM datos ORDER BY fecha DESC";
  $result = mysqli_query($conn, $sql);
  if ($result) 
  {
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>".
          "<td>".$row["email"]."</td>".
		  "<td>".$row["comentarios"]."</td>".
		  "<td>".$row["fecha"]."</td>".
		  "<td>".$row["longitud"]."</td>".
		  "<td>".$row["latitud"]."</td>".
		  "<td><a href=https://proyectoava.online/images/".$row["nombre_foto"]." target=_blank>Ver foto</a></td>".
        "</tr>";
    }
  } 
  else 
  {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
?>
      </tbody>
    </table>
  </div>
</section>
</body> 
</html>