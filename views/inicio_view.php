<?php

include_once 'views/partials/head.php';
include_once 'views/partials/header.php';

$result = $response['$allusuario'];
$results = $response['$allpendientes'];
$resultLibros = isset($response['$alllibros']) ? $response['$alllibros'] : [];

$day = date('d');
$mes = date('m');
$year = date('Y');

define('NUM_ITEMS_BY_PAGE', 3);

$num_total_rows = count($results);

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

  $resultpre = array_slice($results, $start, NUM_ITEMS_BY_PAGE);
}

if ($nivel == 5 || $nivel == 10) :

?>

<div class="container-fluid">
  <section class="mt-5 ml-5 col-xl-10 cuerpo">
    <div class="row ml-4">
      <?php foreach ($result as $clave) : ?>
        <div class="col-5">
          <div class="jumbotron">
            <div class="container">
              <h2>Hola, <?php echo $clave['name_user'] ?>.</h2>
              <?php if ($nivel == 5) : ?>
                <h5>Has ingresado como usuario.</h5>
              <?php elseif ($nivel == 10) : ?>
                <h5>Has ingresado como administrador. </h5>
              <?php endif ?>
            </div>
          </div>
        <?php endforeach ?>

        <?php foreach ($resultLibros as $clave) : ?>

          <div class="col-10 mb-4">
            <div class="card border-left-primary shadow-sm h-100 py-2">
              <div class="card-body">
                <div class="h6 font-weight-bold text-primary text-uppercase mb-1">Cantidad total de libros</div>
                <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $clave['total']; ?></div>
              </div>
            </div>
          </div>

          <div class="col-10 mb-4">
            <div class="card border-left-primary shadow-sm h-100 py-2">
              <div class="card-body">
                <div class="font-weight-bold text-primary text-uppercase mb-1">Cantidad actual de libros</div>
                <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $clave['actual']; ?></div>
              </div>
            </div>
          </div>

          <div class="col-10 mb-4">
            <div class="card border-left-primary shadow-sm h-100 py-2">
              <div class="card-body">
                <div class="font-weight-bold text-primary text-uppercase mb-1">Libros préstados</div>
                <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $clave['prestados']; ?></div>
              </div>
            </div>
          </div>

          <div class="col">
            <div id="estadisticas"></div>
          </div>

        </div>
      <?php endforeach ?>

      <?php if (isset($resultpre)): ?>
      <div class="ml-5 col">
        <div class="row">
          <div class="col-8">
            <h2 class="mb-4 text-gray-800">Préstamos pendientes por devolución</h2>
          </div>
          <div class="mt-4 col-4">
            <a href="index.php?controller=pendiente" class="my-2 btn color-primario text-white shadow-sm"> Ver más</a>
          </div>
        </div>
        <?php endif; ?>

        <?php if (isset($resultpre)) foreach ($resultpre as $clave) : ?>
          <div class="row">

            <div class="card shadow-sm col mb-4 mr-5 prestamos">
              <div class="my-3 ml-2">
                <h5 title="<?php echo $clave['fd'] ?>">Fecha de devolución: <?php echo $clave['fd'] ?></h5>
                <hr class="divider mb-3">
                <div class="row mb-3">
                  <div class="col-6">
                    <h6>Solicitante: </h6><?php echo $clave['nomSol'] . ' ' . $clave['apeSol'] ?>
                  </div>
                  <div class="col-6">
                    <h6>Libro: </h6><?php echo $clave['titulo'] ?>
                  </div>
                </div>
              </div>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="row ml-4 mr-4">
      <div class="col">
        <div id="estadisticas"></div>
      </div>
    </div>


  </section>
</div>
<?php endif; 
if ($nivel == 1) :
  ?>

<div class="container-fluid">
            <div class="py-5 mx-4">
                <div class="row justify-content-center">
                <?php foreach ($result as $clave) : ?>
                    <div class="col-lg-7 col-md-11 col-sm-12">
                        <div class="jumbotron">
                            <div class="container">
                                <h2>¡Hola, <?php echo $clave['name_user'] ?>!</h2>
                                <p class="lead ml-1">Has ingresado como lector.</p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
<?php
endif;
include_once 'views/partials/footer.php';
