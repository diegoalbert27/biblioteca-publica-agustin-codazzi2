<?php

$msg = '';

if (isset($_REQUEST['r'])) {
  switch ($_REQUEST['r']) {
    case '3':
        $msg = 'Un nuevo usuario ha sido <b>agregado</b>';
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
<section class="my-5 container">
    <div class="float-right col-xl-10">
        

        

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Usuarios del sistema</h2>
        </div>

            <div class="m-4">
            
                <table class="table lazy__table">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Usuarios</th>
                            <th scope="col">Estado</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($result as $clave) : ?>
                        <tr>
                            <th scope="row"><?php echo $clave['id_user']; ?></th>
                            <td><?php echo $clave['name_user'] ?></td>
                            <?php if ($clave['enabled'] == 1) { ?>
                                <td><i class="fas fa-circle fa-xs text-success"></i> Activo</td>
                            <?php }
                            if ($clave['enabled'] == 0) { ?>
                                <td><i class="fas fa-circle  fa-xs text-danger"></i> Inactivo</td>
                            <?php } ?>
                            <td>
                                <div class="btn-group botones">
                                    <a class="btn btn-sm color-primario mb-1" href="index.php?controller=usuario&action=viewbyid&id=<?php echo $clave['id_user'] ?>">
                                        <i class="fas fa-eye text-white"></i>
                                    </a>
                                    <?php if ($nivel == 10) : ?>
                                    <a class="btn btn-sm color-acierto mb-1" href="index.php?controller=usuario&action=formupdate&id=<?php echo $clave['id_user'] ?>">
                                        <i class="fas fa-edit text-white"></i>
                                    </a>
                                    <a href="index.php?controller=usuario&action=delete&id=<?php echo $clave['id_user'] ?>" class="btn btn-sm color-peligro mb-1">
                                        <i class="fas fa-trash-alt ico text-white"></i>
                                    </a>
                                    <?php endif ?>
                                    <?php if ($nivel == 5) : ?>
                                    <a href="index.php?controller=usuario&action=habilitar&id=<?php echo $clave['id_user'] ?>" class="btn btn-sm color-acierto mb-1">
                      <i class="fas fa-user-check ico text-white"></i>
                    </a>
                    <?php endif ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="card my-5">
 
 <div class="card-header py-md-3">
     <h6 class="m-0 font-weight-bold">Nuevo usuario</h6>
 </div>

 <div class="card-body mb-3">
     <div class="p-2">
         <form action="<?php echo $helpers->url('usuario', 'crear') ?>" method="post">
             <input type="hidden" name="id" value="<?php if (isset($clave['id'])) echo $clave['id']?>">
             <input type="hidden" name="enabled" value="1">

             <div class="row">
                 <div class="col-6"> 
                     <h6>Nombre completo:</h6>
                 </div>

                 <div class="col-3"> 
                     <h6>Usuario:</h6>
                 </div>

                 <div class="col-3">
                     <h6>Contraseña:</h6>
                 </div>
             </div>

             <div class="row mb-4">
                 <div class="col-6">         
                     <input type="text" class="form-control" name="name_user" required>
                 </div>

                 <div class="col-3">
                     <input type="text" class="form-control" name="email_user" required>
                 </div>

                 <div class="col-3">
                     <input type="password" class="form-control" name="passwd_user"required>
                 </div>
             </div>

             <div class="row">
                 <div class="col-3">
                     <h6>Nivel de usuario:</h6>
                 </div>
                 <div class="col-3">
                         <h6>Teléfono:</h6>
                     </div>
                 
                 <div class="col-6"> 
                             <h6>Correo electrónico:</h6>
                         </div>
                 </div>

                 <div class="row mb-4">
                     <div class="col-3">
                         <select name="nivel_user" class="form-control">
                             <option value="1">Lector</option>
                             <option value="2">Organizador</option>
                             <option value="5">Bibliotecario</option>
                             <option value="10">Administrador</option>
                         </select>
                                 
                         </div>

                         <div class="col-3">
                             <input type="number" class="form-control" name="tlf_user" onkeypress="solonumeros(event);">        
                         </div>

                         <div class="col-6">
                             <input type="email" class="form-control" name="correo_user">
                             </div>
                     </div>

                         

                             

                         <div class="text-center">
                             <button type="submit"  class="btn color-acierto text-white">Agregar usuario</button>
                         </div>
 
                     </form>
                 </div>
             </div>
         </div>

        </div>
    </div>
</section>