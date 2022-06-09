<?php

$msg = '';

if (isset($_REQUEST['r'])) {
  switch ($_REQUEST['r']) {
    case '3':
        $msg = 'Un nuevo artículo ha sido <b>agregado</b>';
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
      <h1 class="h3 mb-0 text-gray-800">Blog</h1>

      <?php if (!empty($msg)) : ?>
        <div class="alert alert-<?php echo $tipo_alerta ?>">
          <span>
            <?php echo $msg ?>
          </span>
        </div>
      <?php endif; ?>

    </div>
    <div class="p-3 mb-3">
      <table id="table-blog" class="table lazy__table">
        <thead>
          <tr>
            <th scope="col">Título</th>
            <th scope="col">Autor</th>
            <th scope="col">Fecha</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $clave) : ?>
            <tr>
              <td><?php echo $clave['title_blog'] ?></td>
              <td><?php echo $clave['author_blog'] ?></td>
              <td><?php echo $clave['date_blog'] ?></td>
              <td>
                <div class="btn-group botones">
                  <a class="btn btn-sm color-primario mb-1" href="index.php?controller=blog&action=viewbyid&id=<?php echo $clave['id_blog'] ?>">
                    <i class="fas fa-eye text-white"></i>
                  </a>
                  <?php if ($nivel == 5 || $nivel == 10) : ?>
                  <a class="btn btn-sm color-acierto mb-1" href="index.php?controller=blog&action=formupdate&id=<?php echo $clave['id_blog'] ?>">
                    <i class="fas fa-edit text-white"></i>
                  </a>
                  <a href="index.php?controller=blog&action=delete&id=<?php echo $clave['id_blog'] ?>" class="btn btn-sm color-peligro mb-1">
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
        <a href="<?php echo $helpers->url('blog', 'form'); ?>" class="d-none d-inline-block btn color-primario text-white shadow-sm"> Añadir Nuevo Artículo</a>
      </div>

    </div>
    
    <!-- <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-end my-6">
        <?php
        if ($total_pages > 1) {
          if ($page != 1) {
        ?>
            <li class="page-item">
              <a class="page-link" href="index.php?controller=blog&page=<?php echo $page - 1 ?>">
                <span aria-hidden="true">Anterior</span>
              </a>
            </li>
          <?php
          }
          for ($i = 1; $i <= $total_pages; $i++) {
            if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">' . $page . '</a></li>';
            } else {
              echo '<li class="page-item"><a class="page-link" href="index.php?controller=blog&page=' . $i . '">' . $i . '</a></li>';
            }
          }
          if ($page != $total_pages) {
          ?>
            <li class="page-item">
              <a class="page-link" href="index.php?controller=blog&page=<?php echo $page + 1 ?>">
                <span aria-hidden="true">Siguiente</span>
              </a>
            </li>
        <?php
          }
        }

        ?>
    </div>
</section> -->
