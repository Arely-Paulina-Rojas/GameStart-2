<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // Errores de validacion
        $nombreError = null;
        $generoError = null;
        $yearError = null;
        $clasificacion = null;
        $plataformas= null;
        // valores post
        $nombre = $_POST['nombre'];
        $genero = $_POST['genero'];
        $year = $_POST['year'];
        $clasificacion = $_POST['clasificacion'];
        $plataformas = $_POST['plataformas'];
         
        // validate input
        $valid = true;
        if (empty($nombre)) {
            $nombreError = 'Introduce nombre del juego:';
            $valid = false;
        }
        if (empty($genero)) {
            $generoError = 'Introduce genero:';
            $valid = false;
        }
        if (empty($year)) {
            $yearError = 'Introduce año:';
            $valid = false;
        }
        if (empty($clasificacion)) {
            $clasificacionError = 'Introduce la clasificacion';
            $valid = false;
        }
        if (empty($plataformas)) {
            $plataformasError = 'Introduce las plataformas para las que esta disponible:';
            $valid = false;
        }
       
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO juegos
            (nombre,genero,year,clasificacion,plataformas) 
            values(?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nombre,$genero,$year,$clasificacion,$plataformas));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
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
        <li><a href="index.php"><span class="icon-juegos"></span>Juegos</a></li>
      </ul>
    </nav>
  </header>
  <section id="main">
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Crear un registro de juego</h3>
                        <br>
                    </div>
             
                    <form class="form-horizontal" action="crear.php" method="post">
                      <div class="control-group 
                      <?php echo !empty($nombreError)?'error':'';?>">
                        <label class="control-label">Nombre</label>
                        <div class="controls">
                            <input name="nombre" type="text"  placeholder="Nombre" value="
                            <?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif; ?>
                        </div>
                      </div> <!--Nombre-->
                      <div class="control-group <?php echo !empty($generoError)?'error':'';?>">
                        <label class="control-label">Genero</label>
                        <div class="controls">
                            <input name="genero" type="text" placeholder="Genero" 
                            value="<?php echo !empty($genero)?$genero:'';?>">
                            <?php if (!empty($generoError)): ?>
                                <span class="help-inline"><?php echo $generoError;?></span>
                            <?php endif;?>
                        </div>
                      </div> <!--a-->
                       <div class="control-group <?php echo !empty($yearError)?'error':'';?>">
                        <label class="control-label">Año de lanzamiento</label>
                        <div class="controls">
                            <input name="year" type="text" placeholder="Año de lanzamiento" 
                            value="<?php echo !empty($year)?$year:'';?>">
                            <?php if (!empty($yearError)): ?>
                                <span class="help-inline"><?php echo $yearError;?></span>
                            <?php endif;?>
                        </div>
                      </div> <!--aFallecimiento-->
                      <div class="control-group <?php echo !empty($clasificacionError)?'error':'';?>">
                        <label class="control-label">Clasificacion</label>
                        <div class="controls">
                            <input name="clasificacion" type="text" placeholder="Clasificacion" 
                            value="<?php echo !empty($clasificacion)?$clasificacion:'';?>">
                            <?php if (!empty($clasificacionError)): ?>
                                <span class="help-inline"><?php echo $clasificacion;?></span>
                            <?php endif;?>
                        </div>
                      </div> <!--lugarNac-->
                       <div class="control-group <?php echo !empty($plataformasError)?'error':'';?>">
                        <label class="control-label">Plataformas</label>
                        <div class="controls">
                            <input name="plataformas" type="text" placeholder="Plataformas" 
                            value="<?php echo !empty($plataformas)?$plataformas:'';?>">
                            <?php if (!empty($plataformasError)): ?>
                                <span class="help-inline"><?php echo $plataformasError;?></span>
                            <?php endif;?>
                        </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Guardar</button>
                          <a class="btn btn-info" href="index.php">Regresar</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
</section>
  <br><footer>
    &copy; 2018, GameStart and EpicNetwork
    <br>
    All trademarks and registered trademarks appearing on this site are the property of their respective owners.
</footer>
</body>
</html>