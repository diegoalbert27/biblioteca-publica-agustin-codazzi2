<div class="container">
  <section class="mt-4 col-xl-10 cuerpo">

  <?php foreach ($result as $clave) : ?>

        <div class="d-sm-flex align-items-center mb-4">
    <a class="btn color-primario mb-1" href="index.php?controller=libro" title="Ver todos los registros"><i class="fas fa-chevron-left text-white"></i></a>
        <h1 class="h3 mb-0 text-gray-800 ml-4">Libros de la biblioteca</h1>
       
    </div>
  

        <div class="card ml-5 mb-5 shadow">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold"><?php echo $clave['titulo'] ?></h5>
            </div>

            <div class="card-body">
            <div class="row mb-4">
                    <div class="col m-1">
                        <h6>Sinopsis: </h6>
                        <?php echo $clave['sinopsis'] ?>
                    </div>
                    </div>
                <div class="row mb-4 m-1">
                    <div class="col">
                        <h6>Autor: </h6>
                        <?php echo $clave['autor'] ?>
                    </div>
                    <div class="col">
                        <h6>Categoría: </h6>
                        <?php echo $clave['nombrec'] ?>
                    </div>
                    <div class="col">
                        <h6>Estado: </h6>
                        <?php echo $clave['estado'] ?>
                    </div>
                </div>

                <div class="row mb-3 m-1">
                    <div class="col">
                        <h6>Cantidad total: </h6>
                        <?php echo $clave['total'] ?>
                    </div>
                    <div class="col">
                        <h6>Cantidad actual: </h6>
                        <?php echo $clave['stock'] ?>
                    </div>
                    <div class="col">
                        <h6>Prestados:</h6>
                        <?php echo $clave['resto'] ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($nivel == 5 || $nivel == 10) : ?>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a class="btn color-acierto mb-1 text-white" href="index.php?controller=libro&action=formupdate&id=<?php echo $clave['id'] ?>"><i class="fas fa-edit text-white"></i> Modificar datos</a>
        <a class="btn color-acierto mb-1 text-white" href="index.php?controller=inventario&action=formupdate&id=<?php echo $clave['id'] ?>"><i class="fas fa-edit text-white"></i> Modificar cantidad</a>
        <a class="btn color-primario text-white mb-1" href="index.php?controller=libro&action=libropdf&id=<?php echo $clave['id'] ?>" target="_blanck" role="button">Generar reporte PDF <i class="fas fa-download"></i></a>
        </div>
        <?php endif ?>
            <?php endforeach ?>
    </div>
    </section>
</div>