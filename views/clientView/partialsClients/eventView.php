<?php
$msg = '';

if (isset($_REQUEST['r'])) {
  switch ($_REQUEST['r']) {
    case '3':
      $msg = '<b>Agregado</b> con exito';
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

$array = [];

foreach ($resultParticipant as $participant) {
  $array[] = $participant['id_event'];
}

?>

<?php if (!empty($msg)) : ?>
  <div class="ml-5 pl-5 text-center alert alert-<?php echo $tipo_alerta ?>">
    <span>
      <?php echo $msg ?>
    </span>
  </div>
<?php endif; ?>

<section class="container">
  <div class="float-right col-xl-11 pl-5 mt-3">
    <div class="py-3 pl-5 border-bottom mx-auto">
      <div class="my-3 ml-3">
        <h3 class="pb-4">Próximos eventos</h3>

        <div class="d-none" id="containerEventCurrent">
          
        </div>

        <div id="calendar">
        </div>

        <?php foreach ($resultEventos as $event) : ?>
          <div class="mt-4 px-5 row">
            <div class="col-lg-1 font-weight-bold">
              <h1 class="mb-0"><?php echo substr($event['date_realized_event'], 8) ?></h1>
            </div>
            <div class="col-lg-2">
              <p class="mb-0 text-secondary font-weight-bold">Fecha:</p>
              <h6 class="mt-0 font-weight-bold"><?php echo substr($event['date_realized_event'], 0, 7) ?></h6>
            </div>
            <div class="col">
              <h5 class="mt-0 font-weight-bold"><?php echo $event['title_event'] ?></h5>
              <p><?php echo $event['place_event'] ?></p>
            </div>

            <div class="col-lg-2 font-weight-bold text-center">

              <?php

              if (isset($event['id_event'])) :
                foreach ($idParticipant as $clave) :
                  if ($event['id_event'] === $clave['id_event']) :
                    if ($clave['state'] == 1) : ?>
                      ¡Asistencia confirmada!
                    <?php endif;
                    if ($clave['state'] == 0) : ?>
                      ¡Estás interesado!
                <?php endif;
                  endif;
                endforeach;
                $id = $event['id_event']; ?>
                <a href="index.php?controller=client&action=viewbyid&id=<?php echo $id; ?>" class="btn btn-outline-primary">Ver más</a>
              <?php else :
                $id = $event['id_event']; ?>
                <a href="index.php?controller=client&action=viewbyid&id=<?php echo $id; ?>" class="btn btn-outline-primary">Ver más</a>
              <?php endif; ?>

            </div>
          </div>
          <hr>
        <?php endforeach; ?>
        <div class="text-center">
          <a href="index.php?controller=usuario&action=perfil&id=<?php echo $id ?>" class="btn color-primario text-white mt-3">Organizar evento</a>
        </div>
      </div>
    </div>
  </div>
</section>