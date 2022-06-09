<div class="container">
    <section class="mt-4 col-xl-10 cuerpo">

        <?php foreach ($result as $clave) : ?>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a class="btn color-primario mb-1" href="index.php?controller=solicitante" title="Ver todos los registros"><i class="fas fa-chevron-left text-white"></i></a>
                <h1 class="h3 mb-0 text-gray-800">Solicitantes de la biblioteca</h1>
                <a class="btn color-primario text-white float-right" href="index.php?controller=solicitante&action=carnet&id=<?php echo $clave['idSol'] ?>" role="button">Generar carnet <i class="fas fa-download"></i></a>
                <a class="btn color-primario text-white float-right" href="index.php?controller=solicitante&action=pdf&id=<?php echo $clave['idSol'] ?>" role="button">Historial de préstamos <i class="fas fa-download"></i></a>
            </div>

            <div class="card ml-5 mb-5 shadow">
                <div class="card-header">
                    <h5 class="m-0 font-weight-bold">
                        <?php echo $clave['nomSol'] ?> <?php echo $clave['apeSol'] ?>
                        <span class="float-right">
                            <a class="btn-sm color-acierto mb-1" href="index.php?controller=solicitante&action=formupdate&id=<?php echo $clave['idSol'] ?>" title="Editar Registro">
                                <i class="fas fa-edit text-white"></i>
                            </a>
                        </span>
                    </h5>
                </div>

                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col">
                            <h6>Cédula: </h6>
                            <?php echo $clave['cedSol'] ?>
                        </div>
                        <div class="col">
                            <h6>Edad: </h6>
                            <?php echo $clave['edadSol'] ?>
                        </div>
                        <div class="col">
                            <h6>Sexo: </h6>
                            <?php echo $clave['sexSol'] ?>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col">
                            <h6>Dirección: </h6>
                            <?php echo $clave['dirSol'] ?>
                        </div>
                        <div class="col">
                            <h6>Telefono: </h6>
                            <?php echo $clave['teleSol'] ?>
                        </div>
                        <div class="col">
                            <h6>Correo:</h6>
                            <?php echo $clave['corrSol'] ?>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col">
                            <h6>Ocupación:</h6>
                            <?php echo $clave['nomOcup'] ?>
                        </div>
                        <div class="col">
                            <h6>Institución:</h6>
                            <?php echo $clave['nomInst'] ?>
                        </div>
                        <div class="col">
                            <p> </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <h6>Teléfono de la institución:</h6>
                            <?php echo $clave['telInst'] ?>
                        </div>
                        <div class="col">
                            <h6>Dirección de la institución:</h6>
                            <?php echo $clave['dirInst'] ?>
                        </div>
                        <div class="col">
                            <p> </p>
                        </div>
                    </div>

                <?php endforeach ?>

                </div>
            </div>
    </section>
</div>