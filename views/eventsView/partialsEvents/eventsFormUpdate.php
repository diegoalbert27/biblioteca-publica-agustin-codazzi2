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
            <h2 class="h3 mb-0 text-gray-800">Modificar evento</h2>
        </div>
        <?php foreach ($result as $clave) : ?>
            <div class="card shadow">
            

                <div class="card-header py-md-3">
                    <h6 class="m-0 font-weight-bold">Datos:</h6>
                </div>

                <div class="card-body">
                    <div class="p-2">
                        <form action="<?php echo $helpers->url('events', 'actualizar') ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $clave['id_event'] ?>">

                                <div class="row mb-2">
                                    <div class="col-12">
                                        <h6>Nombre del evento:</h6>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12">
                                        <input type="text" name="title_event" id="title_event" class="form-control" value="<?php echo $clave['title_event'] ?>" required>
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
                                        <input type="text" name="organizer_event" id="organizer_event" class="form-control" value="<?php echo $clave['organizer_event'] ?>" required>
                                    </div>
                                    
                            <div class="col-3">
                            <select name="type_event" class="form-control" id="type_event">
                                        <?php if ($clave['type_event'] === 'Limitado') : ?>
                                            <option value="<?php echo $clave['type_event'] ?>"><?php echo $clave['type_event'] ?></option>
                                            <option value="No limitado">No limitado</option>
                                            
                                        <?php endif; ?>
                                        <?php if ($clave['type_event'] === 'No limitado') : ?>
                                            <option value="<?php echo $clave['type_event'] ?>"><?php echo $clave['type_event'] ?></option>
                                            <option value="Limitado">Limitado</option>
                                            
                                        <?php endif; ?>
                                        
                                    </select>

                                
                            </div>
                            <div class="col-3">
                                <input type="number" name="participants_event" class="form-control" id="participants_event" value="<?php echo $clave['participants_event'] ?>" required>
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
                                <input type="date" name="date_realized_event" class="form-control" id="date_realized_event" value="<?php echo $clave['date_realized_event'] ?>" required>
                            </div>
                            <div class="col-9">
                                <input type="text" name="place_event" class="form-control" id="place_event" value="<?php echo $clave['place_event'] ?>" required>     
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
                                        <?php if ($clave['state_event'] === 'Pendiente') : ?>
                                            <option value="<?php echo $clave['state_event'] ?>"><?php echo $clave['state_event'] ?></option>
                                            <option value="Realizado">Realizado</option>
                                            <option value="Cancelado">Cancelado</option>
                                        <?php endif; ?>
                                        <?php if ($clave['state_event'] === 'Realizado') : ?>
                                            <option value="<?php echo $clave['state_event'] ?>"><?php echo $clave['state_event'] ?></option>
                                            <option value="Pendiente">Pendiente</option>
                                            <option value="Cancelado">Cancelado</option>
                                        <?php endif; ?>
                                        <?php if ($clave['state_event'] === 'Cancelado') : ?>
                                            <option value="<?php echo $clave['state_event'] ?>"><?php echo $clave['state_event'] ?></option>
                                            <option value="Pendiente">Pendiente</option>
                                            <option value="Realizado">Realizado</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col-5">
                                <select name="asunto" class="form-control" id="asunto">
                                    <option value="<?php echo $clave['asunto'] ?>"><?php echo $clave['asunto'] ?></option>
                                    <?php foreach ($resultAsunto as $claveAsunto): ?>
                                        <?php if ($claveAsunto['id_a'] === $clave['asunto']) unset($claveAsunto) ?>
                                        <?php if (isset($claveAsunto)) : ?>
                                            <option value="<?php echo $claveAsunto['id_a'] ?>"><?php echo $claveAsunto['asunto'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                            <div class="col-3 mt-2">
                                <a href="index.php?controller=asunto" class="link">Añadir nuevo asunto</a>
                            </div>
                            </div> 
                        
                                <div class="row mb-2">
                                    <div class="col-11">
                                        <h6>Detalles del evento:</h6>
                                    </div>
                                </div>


                        <div class="row mb-4">
                        <div class="col-11">
                        <textarea class="form-control" name="info_event" id="info_event" rows="6"><?php echo $clave['info_event'] ?></textarea>
                            </div>
                        </div>
               
                            <div class="text-center">
                                <button type="submit"  class="btn color-acierto text-white">Modificar evento</button>
                            </div>
            
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>