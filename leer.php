<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM juegos where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
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
     
                <div class="row-fluid">
                    <div class="span4 offset2">
                        <h3>Leer un juego</h3>
                        <br>
                    </div>
                     
                    <div class="form-group" >
                      <div class="control-group">
                        <label class="control-label"> <strong>Nombre:</strong></label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['nombre'];?>
                            </label>
                        </div>
                      </div> <!--autor-->
                      <br>
                      <div class="control-group">
                        <label class="control-label"><strong>Genero:</strong></label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['genero'];?>
                            </label>
                        </div>
                      </div> <!--aNacimiento-->
                      <br>
                      <div class="control-group">
                        <label class="control-label"><strong>Año de lanzamiento:</strong></label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['year'];?>
                            </label>
                        </div>
                      </div> <!--aFallecimiento-->
                      <br>
                       <div class="control-group">
                        <label class="control-label"><strong>Clasificacion:</strong></label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['clasificacion'];?>
                            </label>
                        </div>
                        <br>
                      </div> <!--lugarNacimiento-->
                      <div class="control-group">
                        <label class="control-label"><strong>Plataformas:</strong></label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['plataformas'];?>
                            </label>
                        </div>
                      </div> <!--refEpoca-->
                      <br>
                        <div class="form-actions">
                          <a class="btn btn-info" href="index.php">Regresar</a>
                       </div>
                     
                      
                    </div>
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