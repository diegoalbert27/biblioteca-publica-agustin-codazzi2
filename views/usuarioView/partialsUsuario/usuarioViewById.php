<div class="container">
  <section class="mt-4 col-xl-10 cuerpo">

    <div class="d-sm-flex align-items-center mb-4">
        <a class="btn color-primario mb-1" href="index.php?controller=usuario" title="Ver todos los registros"><i class="fas fa-chevron-left text-white"></i></a>
        <h1 class="h3 text-gray-800 ml-5">Usuarios del sistema</h1>
    </div>

    <?php foreach ($result as $clave) : ?>

        <div class="card ml-5 mb-5 shadow"  style="width: 45rem;">
            <div class="card-header">
                <h5 class="m-0 text-primary font-weight-bold row">
                    <?php if ($clave['nivel_user'] == 5) : ?>Usuario
                        <?php elseif ($clave['nivel_user'] == 10): ?> Administrador
                    <?php endif ?>
                </h5>
            </div>

            <div class="card-body">
                <div class="row mt-2 mb-5">
                    <div class="col ml-4">
                        <h6>Nombre: </h6>
                        <?php echo $clave['name_user'] ?>
                    </div>
                    <div class="col">
                        <h6>Usuario: </h6>
                        <?php echo $clave['email_user'] ?> 
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col ml-4">
                        <h6>Teléfono:</h6>
                        <?php echo $clave['tlf_user'] ?>
                    </div>
                    <div class="col">
                        <h6>Correo electrónico:</h6>
                        <?php echo $clave['correo_user'] ?>
                    </div>
                </div>

            </div>
        </div>
      <?php endforeach ?>
   </section>
</div>