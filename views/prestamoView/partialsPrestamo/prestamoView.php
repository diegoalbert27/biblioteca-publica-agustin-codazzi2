<?php

$msg = '';

if (isset($_REQUEST['r'])) {
  switch ($_REQUEST['r']) {
    case '3':
      $msg = 'Un nuevo prestamo ha sido <b>agregado</b>';
      $tipo_alerta = 'success';
      break;
    case '4':
      $msg = 'El registro ha sido <b>Actualizado</b> exitosamente';
      $tipo_alerta = 'success';
      break;
    case '5':
      $msg = 'El registro ha sido <b>Eliminado</b> exitosamente';
      $tipo_alerta = 'danger';
      break;
  }
}

$result = $resultPres;

?>

<div class="container">
  <section class="mt-4 col-xl-10 cuerpo">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h2 mb-0 text-gray-800">Préstamo circulante</h1>

      <?php if (!empty($msg)) : ?>
        <div class="alert alert-<?php echo $tipo_alerta ?>">
          <span>
            <?php echo $msg ?>
          </span>
        </div>
      <?php endif; ?>
    </div>

    <div class="p-3 mb-3">
      <table id="table-prestamo" class="table lazy__table">
        <thead>
          <tr>
            <th scope="col">Número de carnet</th>
            <th scope="col">Fecha de entrega</th>
            <th scope="col">Fecha de devolución</th>
            <th scope="col">Estado</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $clave) : ?>
            <tr>
              <th><?php echo $clave['idSol']; ?></th>
              <td><?php echo $clave['fe'] ?></td>
              <td><?php echo $clave['fd'] ?></td>
              <?php if ($clave['estado'] == 1) { ?>
                <td><i class="far fa-square"></i> Pendiente</td>
              <?php }
              if ($clave['estado'] == 0) { ?>
                <td><i class="far fa-check-square"></i> Devuelto</td>
              <?php } ?>
              <td>
                <div class="btn-group botones">
                  <a class="btn btn-sm color-primario mb-1" href="index.php?controller=prestamo&action=viewbyid&id=<?php echo $clave['idp'] ?>">
                    <i class="fas fa-eye text-white"></i>
                  </a>
                  <a class="btn btn-sm color-acierto mb-1" href="index.php?controller=prestamo&action=formupdate&id=<?php echo $clave['idp'] ?>">
                    <i class="fas fa-edit text-white"></i>
                  </a>
                  <a href="index.php?controller=prestamo&action=delete&id=<?php echo $clave['idp'] ?>" class="btn btn-sm color-peligro mb-1">
                    <i class="fas fa-trash-alt ico text-white"></i>
                  </a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div class="btn-group mt-3">
        <a href="<?php echo $helpers->url('prestamo', 'form'); ?>" class="d-none d-inline-block btn color-primario text-white shadow-sm">Nuevo préstamo</a>
      </div>

    </div>

  </section>
</div>