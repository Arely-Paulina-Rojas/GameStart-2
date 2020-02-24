<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>GameStart</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet"  href="css/font.css">
	<script src="js/jquery-1.11.1.js"></script>
	<script src="js/main.js"></script>
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
				<li><a href="#"><span class="icon-juegos"></span>Juegos</a></li>
			</ul>
		</nav>
	</header>
<section id="main">
	<h1>Comprobación de los datos</h1>
	<?php
	echo "Nombre: ";echo $_POST['nombre']; echo "<br/><br/>";
	echo "Apellidos: ";echo $_POST['apellidos']; echo "<br/><br/>";
	echo "Correo electronico: ";echo $_POST['e-mail']; echo "<br/><br/>";
	echo "Sexo: "; echo $_POST['sexo']; echo "<br/><br/>";
	echo "¿Le gusta el nuevo diseño?: "; echo $_POST['p1']; echo "<br/><br/>";
	echo "¿Son de su agrado los videos? "; echo $_POST['r2']; echo "<br/><br/>";
	echo "¿Le gusta la galería de imágenes? "; echo $_POST['p3']; echo "<br/><br/>";
	echo "¿Cree que las reseñas, noticias y artículos tienen un buen contenido: "; echo $_POST['p4']; echo "<br/><br/>";
	echo "Tu opinion: "; echo $_POST['opinion']; echo "<br/><br/>";
	?>
	<p>Si los datos son correctos envie el formulario si no regrese.</p><br/>
	<p><a href="conf.html" style="color:crimson" title="Enviar">Enviar</a></p>
	<p><a href="index.html" style="color:crimson" title="Regreso">Regresar</a></p>




</section>
		<footer>
		&copy; 2018, GameStart and EpicNetwork
		<br>
		All trademarks and registered trademarks appearing on this site are the property of their respective owners.
</footer>
</body>
</html>