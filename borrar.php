<?php
    require 'database.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
      
        $id = $_POST['id'];
         
        // borrar
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM juegos  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
         
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
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Borrar juego</h3>
                    </div>
                     
                    <form class="form-horizontal" action="borrar.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">¿Seguro de eliminar?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Si</button>
                          <a class="btn btn-info" href="index.php">No</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
      <br><footer>
    &copy; 2018, GameStart and EpicNetwork
    <br>
    All trademarks and registered trademarks appearing on this site are the property of their respective owners.
</footer>
  </body>
</html>