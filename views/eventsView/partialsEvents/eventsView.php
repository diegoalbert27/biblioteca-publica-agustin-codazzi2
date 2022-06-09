<?php

$msg = '';

if (isset($_REQUEST['r'])) {
  switch ($_REQUEST['r']) {
    case '3':
      $msg = 'Un nuevo evento ha sido <b>agregado</b>';
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

?>
<section class="my-4 container">
  <div class="float-right col-xl-10">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Eventos</h1>

      <?php if (!empty($msg)) : ?>
        <div class="alert alert-<?php echo $tipo_alerta ?>">
          <span>
            <?php echo $msg ?>
          </span>
        </div>
      <?php endif; ?>

    </div>
    <div class="p-3 mb-3">
      <table id="table-events" class="table lazy__table">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha</th>
            <th scope="col">Lugar</th>
            <th scope="col">Estado</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $clave) : ?>
            <tr>
              <td><?php echo $clave['title_event'] ?></td>
              <td><?php echo $clave['date_realized_event'] ?></td>
              <td><?php echo $clave['place_event'] ?></td>
              <td><?php echo $clave['state_event'] ?></td>
              <td>
                <div class="btn-group botones">
                  <a class="btn btn-sm color-primario mb-1" href="index.php?controller=events&action=viewbyid&id=<?php echo $clave['id_event'] ?>">
                    <i class="fas fa-eye text-white"></i>
                  </a>
                  <a class="btn btn-sm color-acierto mb-1" href="index.php?controller=events&action=formupdate&id=<?php echo $clave['id_event'] ?>">
                    <i class="fas fa-edit text-white"></i>
                  </a>
                  <a href="index.php?controller=events&action=delete&id=<?php echo $clave['id_event'] ?>" class="btn btn-sm color-peligro mb-1">
                    <i class="fas fa-trash-alt ico text-white"></i>
                  </a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div class="btn-group mt-3">
        <a href="<?php echo $helpers->url('events', 'form'); ?>" class="d-none d-inline-block btn color-primario text-white shadow-sm"> Añadir Nuevo Evento</a>
      </div>

    </div>
  </div>
</section>