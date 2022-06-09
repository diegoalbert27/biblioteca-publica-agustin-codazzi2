<?php

$msg = '';

if (isset($_REQUEST['r'])) {
  switch ($_REQUEST['r']) {
    case '3':
        $msg = 'Un nuevo asunto ha sido <b>agregado</b>';
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
            <h2 class="h3 mb-0 text-gray-800">Asuntos de los eventos</h2>
        </div>
        <div class="row">

            <div class="col-7 mb-5">
                <table class="table lazy__table p-3">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Asunto</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($result as $clave) : ?>
                        <tr>
                            <th scope="row"><?php echo $clave['id_a']; ?></th>
                            <td><?php echo $clave['asunto'] ?></td>
                            <td>
                                <div class="btn-group botones">
                                <!--    <a class="btn btn-sm color-acierto mb-1" href="index.php?controller=categoria&action=formupdate&id=<?php echo $clave['id_c'] ?>">
                                        <i class="fas fa-edit text-white"></i>
                                    </a>-->
                                    <a href="index.php?controller=asunto&action=delete&id=<?php echo $clave['id_a'] ?>" class="btn btn-sm color-peligro mb-1">
                                        <i class="fas fa-trash-alt ico text-white"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            
            <div class="col-5">
            <div class="sticky-top">
            <div class="card shadow">
            

                <div class="card-header py-md-3">
                    <h6 class="m-0 font-weight-bold">Nuevo asunto de evento</h6>
                </div>

                <div class="card-body">
                    <div class="p-2">
                        <form action="<?php echo $helpers->url('asunto', 'crear') ?>" method="post">
                            <input type="hidden" name="id" value="<?php if (isset($clave['id'])) echo $clave['id']?>">

                            <div class="row mb-3">         
                                <input type="text" class="form-control" name="asunto" placeholder="Asunto del evento" required>
                            </div>
               
                            <div class="text-center">
                                <button type="submit"  class="btn color-acierto text-white">Agregar asunto</button>
                            </div>
            
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>
</section>