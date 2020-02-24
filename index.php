<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" 
	href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet"  href="css/font.css">
  <script src="js/jquery-1.11.1.js"></script>
  <script src="js/main.js"></script>
<title>GameStart</title> 

</head>
<body>
  <header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-menu"></span>Menu</a>
    </div>
    <nav>
      <ul>
        <li><a href="index.html"><span class="icon-home"></span>Inicio</a></li>
        <li class="submenu">
          <a href="#"><span class="icon-categorias"></span>Categorías<span class="caret icon-flecha"></span></a>
          <ul class="children">
            <li><a href="html/noticias.html">Noticias<span class="icon-dot"></span></a></li>
            <li><a href="html/resenas.html">Reseñas<span class="icon-dot"></span></a></li>
            <li><a href="html/articulos.html">Artículos<span class="icon-dot"></span></a></li>
          </ul>
        </li>
        <li><a href="Slicebox/galeria.html"><span class="icon-images"></span>Imágenes</a></li>
        <li><a href="videos/videos.html"><span class="icon-videos"></span>Videos</a></li>
        <li><a href="index.php"><span class="icon-juegos"></span>Juegos</a></li>
      </ul>
    </nav>
  </header>
	<div class="container">
		<div class="row">
		      <h3>Base de datos de videojuegos</h3>
            </div>
            <div class="row">
              <br>
            	<p>
                    <a href="crear.php" class="btn btn-dark">Crear nuevo juego</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Año</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php 
                  	include 'database.php';
                  	$pdo = Database::connect();
                  	$sql= 'SELECT * FROM juegos ORDER BY id ASC';
                  	foreach ($pdo->query($sql) as $row) {
                  	echo '<tr>';
					echo '<td>'.$row['nombre'].'</td>';
					echo '<td>'.$row['year'].'</td>';
          echo '<td width=300>';
					echo '<a class="btn btn-primary" href="leer.php?id='.$row['id'].'">Leer</a>';
          echo ' ';
          echo '<a class="btn btn-success" href="modificar.php?id='.$row['id'].'">Modificar</a>';
          echo ' ';
          echo '<a class="btn btn-danger" href="borrar.php?id='.$row['id'].'">Borrar</a>';
          echo '</td>';
					echo '</tr>';	
                  	}
                  	Database::disconnect();
                  	?>
                  </tbody>
              </table>
          </div>
      </div> <!--container-->
  <br><footer>
    &copy; 2018, GameStart and EpicNetwork
    <br>
    All trademarks and registered trademarks appearing on this site are the property of their respective owners.
</footer>
</body>
</html>