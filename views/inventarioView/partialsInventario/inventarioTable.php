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
    //calculo el total de paginas
    $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);

    $result = array_slice($resultLibros, $start, NUM_ITEMS_BY_PAGE);
?>

<div class="container">
  <section class="mt-4 col-xl-10 cuerpo">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Inventario de Libros</h1>

      <?php if (!empty($msg)): ?>
          <div class="alert alert-<?php echo $tipo_alerta ?>">
            <span> 
              <?php echo $msg ?>
            </span>
          </div>
      <?php endif; ?>
    </div>

    <div class="card">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Cota</th>
            <th scope="col">Título</th>
            <th scope="col">Categoría</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Total</th>
            <th scope="col">Minimo</th>
            <th scope="col">Faltantes</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $clave) : ?>
            <tr>
              <th scope="row"><?php echo $clave['cota']; ?></th>
              <td><?php echo $clave['titulo'] ?></td>
              <td><?php echo $clave['nombrec'] ?></td>
              <td><?php echo $clave['stock'] ?></td>
              <td><?php echo $clave['total'] ?></td>
              <td><?php echo $clave['min'] ?></td>
              <td><?php echo $clave['resto'] ?></td>
              <td>
                <div class="btn-group botones">
                    <a class="btn btn-sm color-acierto mb-1" href="index.php?controller=inventario&action=formupdate&id=<?php echo $clave['cota'] ?>">
                    <i class="fas fa-edit text-white"></i>
                  </a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      
    </div>
    <?PHP
    }
 ?>
 <br>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-end my-6">
      <?php
      if ($total_pages > 1) {
        if ($page != 1) {
          ?>
          <li class="page-item">
            <a class="page-link" href="index.php?controller=inventario&page=<?php echo $page-1 ?>" >
              <span aria-hidden="true">Anterior</span>
            </a>
          </li>
          <?php
            }
            for ($i=1;$i<=$total_pages;$i++) {
              if ($page == $i) {
                  echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
              } else {
                  echo '<li class="page-item"><a class="page-link" href="index.php?controller=inventario&page='.$i.'">'.$i.'</a></li>';
              }
          }
          if ($page != $total_pages) {
          ?>
        <li class="page-item">
          <a class="page-link" href="index.php?controller=inventario&page=<?php echo $page+1 ?>">
          <span aria-hidden="true">Siguiente</span>
          </a>
        </li>
        <?php
  }
    }

?>
    </ul>

  </nav>
  </section>
</div>