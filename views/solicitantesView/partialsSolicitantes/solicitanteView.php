<?php

$msg = '';

if (isset($_REQUEST['r'])) {
  switch ($_REQUEST['r']) {
    case '3':
      $msg = 'Un nuevo solicitante ha sido <b>agregado</b>';
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

$result = $resultSol;

// define('NUM_ITEMS_BY_PAGE', 10);

// $num_total_rows = count($resultSol);

// if ($num_total_rows > 0) {
//     $page = false;

//     //examino la pagina a mostrar y el inicio del registro a mostrar
//     if (isset($_GET["page"])) {
//         $page = $_GET["page"];
//     }

//     if (!$page) {
//         $start = 0;
//         $page = 1;
//     } else {
//         $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
//     }
//     //calculo el total de paginas
//     $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);

//     $result = array_slice($resultSol, $start, NUM_ITEMS_BY_PAGE);

// 
?>

<div class="container">

  <section class="mt-4 col-xl-10 cuerpo">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Solicitantes de la biblioteca</h1>

      <?php if (!empty($msg)) : ?>
        <div class="alert alert-<?php echo $tipo_alerta ?>">
          <span>
            <?php echo $msg ?>
          </span>
        </div>
      <?php endif; ?>

    </div>

    <div class="p-3 mb-3">
      <table id="table-solicitante" class="table lazy__table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Cédula</th>
            <th scope="col">Estado</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $clave) : ?>
            <tr>
              <th scope="row"><?php echo $clave['idSol']; ?></th>
              <td><?php echo $clave['nomSol'] ?></td>
              <td><?php echo $clave['apeSol'] ?></td>
              <td><?php echo $clave['cedSol'] ?></td>
              <?php if ($clave['estado_s'] == 1) { ?>
                <td><i class="fas fa-circle fa-xs text-success"></i> Activo</td>
              <?php }
              if ($clave['estado_s'] == 0) { ?>
                <td><i class="fas fa-circle  fa-xs text-danger"></i> Inactivo</td>
              <?php } ?>
              <td>
                <div class="btn-group botones">
                  <a class="btn btn-sm color-primario mb-1" href="index.php?controller=solicitante&action=viewbyid&id=<?php echo $clave['idSol'] ?>">
                    <i class="fas fa-eye text-white"></i>
                  </a>
                  <a class="btn btn-sm color-acierto mb-1" href="index.php?controller=solicitante&action=formupdate&id=<?php echo $clave['idSol'] ?>">
                    <i class="fas fa-edit text-white"></i>
                  </a>
                  <?php if ($nivel == 5) : ?>
                    <a href="index.php?controller=solicitante&action=inhabilitar&id=<?php echo $clave['idSol'] ?>" class="btn btn-sm color-peligro mb-1">
                      <i class="fas fa-user-alt-slash ico text-white"></i>
                    </a>
                  <?php elseif ($nivel == 10) : ?>
                    <a href="index.php?controller=solicitante&action=delete&id=<?php echo $clave['idSol'] ?>" class="btn btn-sm color-peligro mb-1">
                      <i class="fas fa-trash-alt ico text-white"></i>
                    </a>
                  <?php endif ?>


                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div class="btn-group mt-3">
        <a href="<?php echo $helpers->url('solicitante', 'form'); ?>" class="d-none d-inline-block btn color-primario text-white shadow-sm"> Añadir Nuevo Solicitante</a>
      </div>

    </div>
    
    <!-- <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-end my-6">
        <?php
        if ($total_pages > 1) {
          if ($page != 1) {
        ?>
            <li class="page-item">
              <a class="page-link" href="index.php?controller=solicitante&page=<?php echo $page - 1 ?>">
                <span aria-hidden="true">Anterior</span>
              </a>
            </li>
          <?php
          }
          for ($i = 1; $i <= $total_pages; $i++) {
            if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">' . $page . '</a></li>';
            } else {
              echo '<li class="page-item"><a class="page-link" href="index.php?controller=solicitante&page=' . $i . '">' . $i . '</a></li>';
            }
          }
          if ($page != $total_pages) {
          ?>
            <li class="page-item">
              <a class="page-link" href="index.php?controller=solicitante&page=<?php echo $page + 1 ?>">
                <span aria-hidden="true">Siguiente</span>
              </a>
            </li>
        <?php
          }
        }

        ?>
      </ul>

    </nav> -->

  </section>
</div>