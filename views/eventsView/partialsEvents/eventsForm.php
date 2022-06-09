<?php
$date = date('Y-m-d');
$msg = '';

if (isset($_REQUEST['r'])) {
    switch ($_REQUEST['r']) {
        case '3':
            $msg = 'Un nuevo evento ha sido <b>agregado</b>';
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
        <div class="d-sm-flex align-items-center justify-info-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Registro de nuevos eventos</h2>
        </div>

        <div class="card shadow">

            <div class="card-header py-md-3">
                <h6 class="m-0 font-weight-bold">Datos:</h6>
            </div>

            <div class="card-body">
                <div class="p-2">
                    <form action="<?php echo $helpers->url('events', 'crear') ?>" method="post">
                        <input type="hidden" name="id" value="<?php if (isset($clave['id'])) echo $clave['id'] ?>">
                        <input name="date_created_event" id="date_created_event" type="hidden" value="<?php echo $date ?>"> </input>
                        <div class="row mb-2">
                            <div class="col-12">
                                <h6>Nombre del evento:</h6>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12">
                                <input type="text" name="title_event" id="title_event" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-6">
                                <h6>Organizador:</h6>
                            </div>
                            <div class="col-3">
                                <h6>Tipo:</h6>
                            </div>
                            <div class="col-3">
                                <h6>Aforo:</h6>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-6">
                                <!-- <input type="text" name="organizer_event" id="organizer_event" class="form-control" required> -->
                                <?php if (!empty($resultOrganizadores)) : ?>
                                    <select name="organizer_event" class="form-control" id="organizer_event">
                                        <?php foreach ($resultOrganizadores as $organizador) : ?>
                                            <option value="<?php echo $organizador['id'] ?>"><?php echo $organizador['name_user'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                <?php else : ?>
                                    <select name="organizer_event" class="form-control" id="organizer_event">
                                        <option>No se encuentran organizadores validados</option>
                                    </select>
                                    <p class="text-center"><a class="link" href="?controller=organizer">Ver Organizadores</a></p>
                                <?php endif; ?>
                            </div>
                            <div class="col-3">
                                <select name="type_event" class="form-control" id="type_event">
                                    <option value="Limitado">Limitado</option>
                                    <option value="No limitado">No limitado</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <input type="number" name="participants_event" class="form-control" id="participants_event" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-3">
                                <h6>Fecha:</h6>
                            </div>
                            <div class="col-9">
                                <h6>Lugar:</h6>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-3">
                                <input type="date" name="date_realized_event" class="form-control" id="date_realized_event" required>
                            </div>
                            <div class="col-9">
                                <input type="text" name="place_event" class="form-control" id="place_event" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <h6>Estado:</h6>
                            </div>
                            <div class="col-8">
                                <h6>Asunto:</h6>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">
                                <select name="state_event" class="form-control" id="state_event">
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Realizado">Realizado</option>
                                    <option value="Cancelado">Cancelado</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <select name="asunto" class="form-control" id="asunto">
                                    <?php foreach ($resultAsunto as $clave) : ?>
                                        <option value="<?php echo $clave['id_a'] ?>"><?php echo $clave['asunto'] ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-3 mt-2">
                                <a href="index.php?controller=asunto" class="link">Añadir nuevo asunto</a>
                            </div>

                        </div>

                        <div class="row mb-2">
                            <div class="col-9">
                                <h6>Detalles del evento:</h6>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <div class="col-9">
                                <textarea class="form-control" name="info_event" id="info_event" rows="6"></textarea>
                            </div>
                        </div>

                        <div class="col-9 text-center">
                            <?php if (!empty($resultOrganizadores)) : ?>
                                <button type="submit" class="btn color-acierto text-white">Agregar evento</button>
                            <?php else : ?>
                                <button class="btn color-acierto text-white disabled" disabled="disabled">Valide a un organizador para la creacion del evento</button>
                            <?php endif; ?>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>