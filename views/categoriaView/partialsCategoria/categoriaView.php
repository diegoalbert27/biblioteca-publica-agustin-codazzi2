<?php

$msg = '';

if (isset($_REQUEST['r'])) {
  switch ($_REQUEST['r']) {
    case '3':
        $msg = 'Una nueva categoría ha sido <b>agregado</b>';
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
            <h2 class="h3 mb-0 text-gray-800">Categorías de los libros</h2>
            <a class="btn color-primario text-white float-right" target="_blanck" href="index.php?controller=categoria&action=categoriapdf" role="button">Generar reporte PDF <i class="fas fa-download"></i></a>
        </div>
        <div class="row">

            <div class="col-7 mb-5">
            <div class="card shadow p-3">
                <table class="table lazy__table p-3">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Piso</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($result as $clave) : ?>
                        <tr>
                            <th scope="row"><?php echo $clave['id_c']; ?></th>
                            <td><?php echo $clave['nombre_c'] ?></td>
                            <td><?php echo $clave['piso'] ?></td>
                            <td>
                                <div class="btn-group botones">
                                <!--    <a class="btn btn-sm color-acierto mb-1" href="index.php?controller=categoria&action=formupdate&id=<?php echo $clave['id_c'] ?>">
                                        <i class="fas fa-edit text-white"></i>
                                    </a>-->
                                    <a href="index.php?controller=categoria&action=delete&id=<?php echo $clave['id_c'] ?>" class="btn btn-sm color-peligro mb-1">
                                        <i class="fas fa-trash-alt ico text-white"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            </div>
            
            <div class="col-5">
            <div class="sticky-top">
            <div class="card shadow">
            

                <div class="card-header py-md-3">
                    <h6 class="m-0 font-weight-bold">Nueva categoría</h6>
                </div>

                <div class="card-body">
                    <div class="p-2">
                        <form action="<?php echo $helpers->url('categoria', 'crear') ?>" method="post">
                            <input type="hidden" name="id" value="<?php if (isset($clave['id'])) echo $clave['id']?>">

                            <div class="row mb-3">         
                                <input type="text" class="form-control" name="nombre_c" placeholder="Nombre de la categoría" required>
                            </div>

                            <div class="row mb-3">
                                <select name="piso" class="form-control" id="piso">
                                    <option value="1">Ubicada en el piso 1</option>
                                    <option value="2">Ubicada en el piso 2</option>
                                </select>
                            </div>
               
                            <div class="text-center">
                                <button type="submit"  class="btn color-acierto text-white">Agregar categoría</button>
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