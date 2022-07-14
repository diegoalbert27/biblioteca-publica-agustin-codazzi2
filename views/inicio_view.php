<?php

include_once 'views/partials/head.php';
include_once 'views/partials/header.php';

$result = $response['$allusuario'];
$results = $response['$allpendientes'];
$resultLibros = isset($response['$alllibros']) ? $response['$alllibros'] : [];

$day = date('d');
$mes = date('m');
$year = date('Y');

?>

<?php if ($nivel == 5 || $nivel == 10) : ?>

  <div class="container-fluid">
    <section class="mt-5 ml-5 col-xl-10 cuerpo">

      <div class="row ml-4">
        <?php foreach ($result as $clave) : ?>

          <div class="col mr-3">
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
          </div>

        <?php endforeach ?>

      </div>

      <div class="row ml-4">

        <?php if (isset($results)) : ?>
          <div class="ml-2 col">
            <?php foreach ($resultLibros as $clave) : ?>

              <div class="row">
                <div class="col mb-4">
                  <div class="card border-left-primary shadow-sm h-100 py-2">
                    <div class="card-body">
                      <div class="h6 font-weight-bold text-primary text-uppercase mb-1">Cantidad total de libros</div>
                      <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $clave['total']; ?></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col mb-4">
                  <div class="card border-left-primary shadow-sm h-100 py-2">
                    <div class="card-body">
                      <div class="font-weight-bold text-primary text-uppercase mb-1">Cantidad actual de libros</div>
                      <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $clave['actual']; ?></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col mb-4">
                  <div class="card border-left-primary shadow-sm h-100 py-2">
                    <div class="card-body">
                      <div class="font-weight-bold text-primary text-uppercase mb-1">Libros préstados</div>
                      <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $clave['prestados']; ?></div>
                    </div>
                  </div>
                </div>
              </div>

            <?php endforeach ?>
          </div>
          <div class="ml-5 col-6">
            <div class="row">
              <div class="col-8">
                <h2 class="mb-4 text-gray-800">Préstamos pendientes por devolución</h2>
              </div>
              <div class="mt-4 col-4">
                <a href="index.php?controller=pendiente" class="my-2 btn color-primario text-white shadow-sm"> Ver más</a>
              </div>
            </div>
            <?php foreach ($results as $clave) : ?>
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
        <?php endif; ?>

      </div>

      <div class="row ml-4">
        <div class="col ml-2 mb-4">
          <div class="card card-success">
            <div class="card-body">
              <div class="chart">
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col ml-2 mb-4">
          <div class="card card-success">
            <div class="card-body">
              <div class="chart">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>

      <div class="row ml-4">
        <div class="col-8 ml-2 mb-4">
          <div class="card card-success">
              <div class="card-body">
                <div id="calendar">
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>
<?php endif; ?>

<?php if ($nivel == 1) : ?>

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

<?php endif; ?>
<?php include_once 'views/partials/footer.php'; ?>