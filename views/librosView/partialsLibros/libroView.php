<?php

$msg = '';

if (isset($_REQUEST['r'])) {
  switch ($_REQUEST['r']) {
    case '3':
      $msg = 'Un nuevo libro ha sido <b>agregado</b>';
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

$result = $resultLibros;

// define('NUM_ITEMS_BY_PAGE', 10);

// $num_total_rows = count($resultLibros);

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

//     $result = array_slice($resultLibros, $start, NUM_ITEMS_BY_PAGE);

?>

<div class="container">
  <section class="mt-4 col-xl-10 cuerpo">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Libros de la biblioteca</h1>

      <?php if (!empty($msg)) : ?>
        <div class="alert alert-<?php echo $tipo_alerta ?>">
          <span>
            <?php echo $msg ?>
          </span>
        </div>
      <?php endif; ?>
    </div>

    <div class="p-3 mb-3">
      <table id="table-libro" class="table lazy__table">
        <thead>
          <tr>
            <th scope="col">Cota</th>
            <th scope="col">Título</th>
            <th scope="col">Autor</th>
            <th scope="col">Categoría</th>
            <th scope="col">Estado</th>
            <th scope="col">Cantidad</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $clave) : ?>
            <tr>
              <th scope="row"><?php echo $clave['cota']; ?></th>
              <td><?php echo $clave['titulo'] ?></td>
              <td><?php echo $clave['autor'] ?></td>
              <td><?php echo $clave['nombrec'] ?></td>
              <td><?php echo $clave['estado'] ?></td>
              <td><?php echo $clave['stock'] ?></td>
              <td>
                <div class="btn-group botones">
                  <a class="btn btn-sm color-primario mb-1" href="index.php?controller=libro&action=viewbyid&id=<?php echo $clave['id'] ?>">
                    <i class="fas fa-eye text-white"></i>
                  </a>
                  <?php if ($nivel == 10) : ?>
                  <a href="index.php?controller=libro&action=delete&id=<?php echo $clave['cota'] ?>" class="btn btn-sm color-peligro mb-1">
                    <i class="fas fa-trash-alt ico text-white"></i>
                  </a>
                  <?php endif ?>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <?php if ($nivel == 5 || $nivel == 10) : ?>

      <div class="btn-group mt-3">
        <a href="<?php echo $helpers->url('libro', 'form'); ?>" class="d-none d-inline-block btn color-primario text-white shadow-sm"> Añadir Nuevo Libro</a>
      </div>

      <?php endif ?>

    </div>

    <!-- <br>

    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-end my-6">
        <?php
        if ($total_pages > 1) {
          if ($page != 1) {
        ?>
            <li class="page-item">
              <a class="page-link" href="index.php?controller=libro&page=<?php echo $page - 1 ?>">
                <span aria-hidden="true">Anterior</span>
              </a>
            </li>
          <?php
          }
          for ($i = 1; $i <= $total_pages; $i++) {
            if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">' . $page . '</a></li>';
            } else {
              echo '<li class="page-item"><a class="page-link" href="index.php?controller=libro&page=' . $i . '">' . $i . '</a></li>';
            }
          }
          if ($page != $total_pages) {
          ?>
            <li class="page-item">
              <a class="page-link" href="index.php?controller=libro&page=<?php echo $page + 1 ?>">
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