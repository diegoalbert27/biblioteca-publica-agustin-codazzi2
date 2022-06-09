<div class="container">

  <section class="mt-4 col-xl-10 cuerpo">

    <?php foreach ($result as $clave) : ?>

      <span class="float-right mt-5">
        <a class="btn-lg color-acierto mb-1 mr-5" href="index.php?controller=usuario&action=formupdate&id=<?php echo $id ?>" title="Editar perfil">
          <i class="fas fa-edit text-white"></i>
        </a>
      </span>

      <div class="d-sm-flex align-items-center justify-content-between mb-1 mt-4 ml-4">
        <h2 class="mb-0 text-gray-800"> <?php echo $clave['name_user'] ?></h2>
      </div>



      <?php if ($nivel == 1) : ?>
        <h4 class="text-primary mb-4 ml-4"> Lector </h4>
      <?php elseif ($nivel == 2) : ?>
        <h4 class="text-primary mb-4 ml-4"> Organizador y lector </h4>
      <?php elseif ($nivel == 5) : ?>
        <h4 class="text-primary mb-4 ml-4"> Usuario </h4>
      <?php elseif ($nivel == 10) : ?>
        <h4 class="text-primary mb-4 ml-4"> Administrador </h4>
      <?php endif ?>

      <hr class="divider mb-5">

      <div class="row">
        <div class="ml-5 col-5">
          <h5 class="mb-4">Nombre de usuario</h5>
          <h5 class="mb-4">Número de teléfono</h5>
          <h5>Correo electrónico</h5>
        </div>
        <div class="col">
          <h5 class="text-primary mb-4"> <?php echo $clave['email_user'] ?></h5>
          <h5 class="text-primary mb-4"> <?php echo $clave['tlf_user'] ?></h5>
          <h5 class="text-primary"> <?php echo $clave['correo_user'] ?></h5>
          <?php if (!empty($organizer)): ?>
            <?php if ($organizer[0]['is_actived']): ?>
              <h5 class="text-primary">Organizador</h5>
            <?php else: ?>
              <h5 class="text-warning">Su solicitud como organizador a sido enviada para su aprobación</h5>
            <?php endif; ?>
          <?php else: ?>
            <a href="<?php echo $helpers->url('client', 'subir&id=' . $clave['id_user']) ?>" class="link">Solicitar ser organizador</a>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach ?>

  </section>

</div>