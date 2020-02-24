<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {
        // validando errores
        $nombreError = null;
        $generoError = null;
        $yearError = null;
        $clasificacionError = null;
        $plataformasError = null;
         
        // valores post
        $nombre = $_POST['nombre'];
        $genero = $_POST['genero'];
        $year = $_POST['year'];
        $clasificacion = $_POST['clasificacion'];
        $plataformas = $_POST['plataformas'];
         
        // validar captura
        $valid = true;
        if (empty($nombre)) {
            $nombreError = 'Introduce el nombre del juego:';
            $valid = false;
        }
        if (empty($genero)) {
            $generoError = 'Introduce el genero:';
            $valid = false;
        }
        if (empty($year)) {
            $yearError = 'Introduce el año:';
            $valid = false;
        }
        if (empty($clasificacion)) {
            $clasificacionError = 'Introduce la clasificacion:';
            $valid = false;
        }
        if (empty($plataformas)) {
            $plataformasError = 'Introduce las plataformas disponibles:';
            $valid = false;
        }
        // modifica datos
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE juegos  set nombre = ?, genero = ?, year = ?,
            clasificacion = ?, plataformas= ? where id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nombre,$genero,$year,
              $clasificacion,$plataformas,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM juegos where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nombre = $data['nombre'];
        $genero = $data['genero'];
        $year = $data['year'];
        $clasificacion = $data['clasificacion'];
        $plataformas = $data['plataformas'];
        Database::disconnect();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.min.js"></script>
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
        <h3>Modificar un juego</h3>
                <div class="span10 offset1">
                    <div class="row">
                        <section main>
                            
                        </section>
                        
                    </div>
             
                    <form class="form-horizontal" action="modificar.php?id=<?php echo $id?>" method="post">
                      <br>
                      <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
                        <label class="control-label">Nombre:</label>
                        <div class="controls">
                            <input name="nombre" type="text"  placeholder="Nombre" 
                            value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif; ?>
                        </div>
                      </div> <!--autor-->
                      <br>
                      <div class="control-group <?php echo !empty($genero)?'error':'';?>">
                        <label class="control-label">Genero:</label>
                        <div class="controls">
                            <input name="genero" type="text" placeholder="Genero" 
                            value="<?php echo !empty($genero)?$genero:'';?>">
                            <?php if (!empty($generoError)): ?>
                                <span class="help-inline"><?php echo $generoError;?></span>
                            <?php endif;?>
                        </div>
                      </div> <!--aNacimiento-->
                      <br>
                      <div class="control-group <?php echo !empty($yearError)?'error':'';?>">
                        <label class="control-label">Año de lanzamiento:</label>
                        <div class="controls">
                            <input name="year" type="text" placeholder="Año de lanzamiento" 
                            value="<?php echo !empty($year)?$year:'';?>">
                            <?php if (!empty($yearError)): ?>
                                <span class="help-inline"><?php echo $yearError;?></span>
                            <?php endif;?>
                        </div>
                      </div> <!--aFallecimiento-->
                      <br>
                      <div class="control-group <?php echo !empty($clasificacionError)?'error':'';?>">
                        <label class="control-label">Clasificación:</label>
                        <div class="controls">
                            <input name="clasificacion" type="text"  placeholder="Clasificacion" 
                            value="<?php echo !empty($clasificacion)?$clasificacion:'';?>">
                            <?php if (!empty($clasificacionError)): ?>
                                <span class="help-inline"><?php echo $clasificacionError;?></span>
                            <?php endif;?>
                        </div>
                      </div> <!--lugarNac-->
                      <br>
                        <div class="control-group <?php echo !empty($plataformasError)?'error':'';?>">
                        <label class="control-label">Plataformas:</label>
                        <div class="controls">
                            <input name="plataformas" type="text"  placeholder="Plataformas" 
                            value="<?php echo !empty($plataformas)?$plataformas:'';?>">
                            <?php if (!empty($plataformasError)): ?>
                                <span class="help-inline"><?php echo $plataformasError;?></span>
                            <?php endif;?>
                        </div>
                      </div> <!--vida-->
                      <br><br>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Modificar</button>
                          <a class="btn btn-info" href="index.php">Regresar</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
    </section>
  <br><br><br><br><br><footer>
    &copy; 2018, GameStart and EpicNetwork
    <br>
    All trademarks and registered trademarks appearing on this site are the property of their respective owners.
</footer>
</body>
</html>