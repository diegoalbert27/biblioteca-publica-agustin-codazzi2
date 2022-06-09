<?php

    include_once 'views/partials/head.php';
    include_once 'views/partials/header.php';
    $result = $response['$allAuditoria'];
?>

<div class="container">
  
  <section class="mt-4 col-xl-10 cuerpo">
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Auditoría</h1>
    </div>

    <div class="card p-3">
      <table class="table lazy__table">
        <thead>
          <tr>
            <th scope="col">Usuario</th>
            <th scope="col">Acción</th>
            <th scope="col">Módulo</th>
            <th scope="col">Fecha</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $clave) : ?>
            <tr>
              <td><?php echo $clave['name_user']; ?></td>
              <td><?php echo $clave['acc_aud'] ?></td>
              <td><?php echo $clave['ent_aud'] ?></td>
              <td><?php echo $clave['fec_aud'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>
    
 <br>
    
  </section>
</div>

<?php

    include_once 'views/partials/footer.php';