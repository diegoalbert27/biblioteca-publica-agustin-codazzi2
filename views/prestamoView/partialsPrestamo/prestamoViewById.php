<div class="container">
  <section class="mt-4 col-xl-10 cuerpo">

    <div class="d-sm-flex align-items-center mb-4">
        <a class="btn color-primario mb-1" href="index.php?controller=prestamo" title="Ver todos los registros"><i class="fas fa-chevron-left text-white"></i></a>
        <h1 class="h3 text-gray-800 ml-5">Préstamo circulante</h1>
    </div>

    <?php foreach ($result as $clave) : ?>

        <div class="card ml-5 mb-5 shadow"  style="width: 45rem;">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold row">
                <?php if ($clave['estado']==1) { ?>
                <div class="m-0 col">Préstamo #<?php echo $clave['idp'] ?></div>
                <div class="ml-3 col">
                <a>Pendiente</a> <i class="far fa-square"></i> 
                </div>
              <?php } 
              if ($clave['estado']==0) {?>
              <div class="m-0 col">
               Préstamo #<?php echo $clave['idp'] ?>
              </div>
              <div class="ml-3 col">
              <a>Devuelto</a> <i class="far fa-check-square"></i>
              </div>
              <?php } ?>
                </h5>
            </div>

            <div class="card-body">
                <div class="row mt-2 mb-5">
                    <div class="col ml-4">
                        <h6>Carnet: </h6>
                        <?php echo $clave['idSol'] ?>
                    </div>
                    <div class="col">
                        <h6>Nombre del solicitante: </h6>
                        <?php echo $clave['nomSol'] ?> <?php echo $clave['apeSol'] ?>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col ml-4">
                        <h6>Cota: </h6>
                        <?php echo $clave['cota'] ?>
                    </div>
                    <div class="col">
                        <h6>Título del libro: </h6>
                        <?php echo $clave['titulo'] ?>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col ml-4">
                        <h6>Fecha de entrega:</h6>
                        <?php echo $clave['fe'] ?>
                    </div>
                    <div class="col">
                        <h6>Fecha de devolución:</h6>
                        <?php echo $clave['fd'] ?>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="ml-4 col">
                        <h6>Observaciones:</h6>
                        <?php echo $clave['obs'] ?>
                    </div>
                </div>
            </div>
        </div>
      <?php endforeach ?>
   </section>
</div>