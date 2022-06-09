<?php

$date = date('Y-m-d');

$msg = '';

if (isset($_REQUEST['r'])) {
  switch ($_REQUEST['r']) {
    case '3':
        $msg = 'Un nuevo artículo ha sido <b>agregado</b>';
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
            <h2 class="h3 mb-0 text-gray-800">Registro de nuevos artículos</h2>
        </div>

            <div class="card shadow">
            

                <div class="card-header py-md-3">
                    <h6 class="m-0 font-weight-bold">Datos:</h6>
                </div>

                <div class="card-body">
                    <div class="p-2">
                        <form action="<?php echo $helpers->url('blog', 'crear') ?>" method="post">
                            <input type="hidden" name="id" value="<?php if (isset($clave['id'])) echo $clave['id']?>">

                                <div class="row mb-2">
                                    <div class="col-12">
                                        <h6>Título:</h6>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12">
                                        <input type="text" name="title_blog" id="title_blog" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-9">
                                        <h6>Autor:</h6>
                                    </div>
                                    <div class="col-3">
                                        <h6>Fecha:</h6>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-9">
                                        <input type="text" name="author_blog" id="author_blog" class="form-control" required>
                                    </div>
                                    <div class="col-3">
                                <input name="date_blog" id="date_blog" class="form-control" type="date" value="<?php echo $date ?>" min="<?php echo $date ?>" max="<?php echo $date ?>" required> </input>
                            </div>
                                </div>

                                
                        
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <h6>Contenido:</h6>
                                    </div>
                                </div>


                        <div class="row mb-4">
                        <div class="col-12">
                        <textarea class="form-control" name="content_blog" id="content_blog" rows="6"></textarea>
                            </div>
                        </div>
               
                            <div class="text-center">
                                <button type="submit"  class="btn color-acierto text-white">Agregar artículo</button>
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