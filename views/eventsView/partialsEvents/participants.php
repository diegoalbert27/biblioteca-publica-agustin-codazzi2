<section class="my-2 container">
    <div class="float-right col-xl-10 mt-4">
        <div class="py-3 ml-4">
            <div class="justify-content-center">
            <a class="btn color-primario text-white float-right mt-3 mr-3" href="index.php?controller=events&action=participantsPDF&id=<?php echo $result[0]['id_event'] ?>" role="button" target="_blanck">Generar reporte PDF <i class="fas fa-download"></i></a>
                <h3>Participantes:</h3>
                <h5 class="mx-3"><?php echo $result[0]['title_event'] ?></h5>
                <div class="mx-5 mt-5">
                    <table id="table-participants" class="table lazy__table">
                        <thead>
                            <tr>
                                <th scope="col"><p class="mb-0 text-secondary">Nombre</p></th>
                                <th scope="col"><p class="mb-0 text-secondary">Teléfono</p></th>
                                <th scope="col"><p class="mb-0 text-secondary">Correo electrónico</p></th>
                                <th scope="col"><p class="mb-0 text-secondary">Estado</p></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $clave) : ?>
                                <tr>
                                    <td><p class="mb-0 text-secondary">   
                                    <?php 
                                    echo $clave['name_user']; ?></p></td>
                                    <td><p class="mb-0 text-secondary"><?php echo $clave['tlf_user'] ?></p></td>
                                    <td><p class="mb-0 text-secondary"><?php echo $clave['correo_user'] ?></p></td>
                                    <?php if ($clave['state'] == 1) { ?>
                                        <td><p class="mb-0 text-secondary"><i class="fas fa-circle fa-xs text-success"></i> Participante</p></td>
                                    <?php }
                                    if ($clave['state'] == 0) { ?>
                                        <td><p class="mb-0 text-secondary"><i class="fas fa-circle fa-xs text-primary"></i> Interesado</p></td>
                                    <?php } ?>                 
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>