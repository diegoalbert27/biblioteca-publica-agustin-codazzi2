<?php
$msg = '';

if (isset($_REQUEST['r'])) {
  switch ($_REQUEST['r']) {
    case '5':
      $msg = 'El préstamo ha sido devuelto exitosamente';
      $tipo_alerta = 'success';
      break;
  }
}

?>
<div class="container">
  <section class="mt-4 col-xl-10 cuerpo">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h3 class="mb-0 text-gray-800">Préstamos pendientes por devolución</h3>

      <?php if (!empty($msg)) : ?>
        <div class="alert alert-<?php echo $tipo_alerta ?>">
          <span>
            <?php echo $msg ?>
          </span>
        </div>
      <?php endif; ?>

    </div>

    <?php foreach ($result as $clave) : ?>
      <div class="row ml-3">

        <div class="card shadow col mb-4 mr-5 prestamos">
          <div class="my-3 ml-2">
            <h5 title="<?php echo $clave['fd'] ?>">Fecha de devolución: <?php echo $clave['fd'] ?></h5>
            <hr class="divider mb-3">
            <div class="row mb-3">
              <div class="col-6">
                <h6>Solicitante: </h6><?php echo $clave['nomSol'] . ' ' . $clave['apeSol'] ?>
              </div>
              <div class="col-6">
                <h6>Teléfono: </h6><?php echo $clave['teleSol'] ?>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <h6>Libro: </h6><?php echo $clave['titulo'] ?>
              </div>
              <div class="col-6">
                <h6>Email: </h6><?php echo $clave['corrSol'] ?>
              </div>
            </div>
            <a href="index.php?controller=pendiente&action=update&id=<?php echo $clave['idp'] ?>&libro=<?php echo $clave['idLibro'] ?>" class="my-2 btn color-primario text-white shadow-sm"> Préstamo devuelto <i class="fas fa-check text-white"></i></a>
          </div>

        </div>
      </div>
    <?php endforeach; ?>

  </section>
</div>