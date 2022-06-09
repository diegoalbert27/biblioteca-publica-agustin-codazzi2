<?php
$resultLibros = $response['$allLibros'];

define('NUM_ITEMS_BY_PAGE', 10);

$num_total_rows = count($resultLibros);

if ($num_total_rows > 0) {
  $page = false;

  //examino la pagina a mostrar y el inicio del registro a mostrar
  if (isset($_GET["page"])) {
    $page = $_GET["page"];
  }

  if (!$page) {
    $start = 0;
    $page = 1;
  } else {
    $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
  }

  $resultl = array_slice($resultLibros, $start, NUM_ITEMS_BY_PAGE);
}

?>

<!-- Header-->
<header class="masthead py-5">
    <div class="container px-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6 my-5">
                <div class="text-center my-5">
                    <h1 class="display-5 text-white mb-2">Libros</h1>
                    <p class="lead text-white mb-4">El libre acceso a la lectura, el aprendizaje y el conocimiento.</p>
                    <!--<form class="row form-inline">
                        <input class="col-9 form-control mr-3" type="search" placeholder="Encontrar un libro" aria-label="Search">
                        <button class="col-2 btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
                    </form>-->
                </div>
            </div>
        </div>
    </div>
</header>
<div class="row justify-content-center">
                        <div class="col-lg-8 col-md-11 col-sm-12">
<!--<div class="row my-4">  
            <div class="col ml-5">
                <h4 class="mt-5 mb-3">Categorías</h4>
                <ul class="m-1">
                    <li class="nav-item mb-3"><a href="#">Obras generales</a></li>
                    <li class="nav-item mb-3"><a href="#">Filosofía y psicología</a></li>
                    <li class="nav-item mb-3"><a href="#">Religión</a></li>
                    <li class="nav-item mb-3"><a href="#">Ciencias sociales</a></li>
                    <li class="nav-item mb-3"><a href="#">Lingüística</a></li>
                    <li class="nav-item mb-3"><a href="#">Ciencias puras</a></li>
                    <li class="nav-item mb-3"><a href="#">Ciencias aplicadas</a></li>
                    <li class="nav-item mb-3"><a href="#">Arte y recreación</a></li>
                    <li class="nav-item mb-3"><a href="#">Literatura</a></li>
                  <li class="nav-item mb-3"><a href="#">Geografía e historia</a></li>
                </ul>
            </div>
            <div class="col-9 mt-2 mr-3">-->
            <?php if (isset($resultl)) foreach ($resultl as $clave) : ?>
                <div class="my-5 mx-5">
                    <h5><?php echo $clave['titulo'] ?></h5>
                    <h6 class="text-secondary mb-3"><?php echo $clave['autor'] ?></h6>
                    <p class="mb-3"><?php echo $clave['sinopsis'] ?></p>
                </div>
                <hr class="mx-5">
                <?php endforeach; ?>
                <div class="text-center my-5">
                <p class="text-center lead">Para ver más <a href="<?php echo $helpers->url("session", "login") ?>" class="link">inicia sesión</a></p>
</div>
            </div>
            </div>
        </div>
        </div>
        </div>