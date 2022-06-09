<div class="container">
  <section class="mt-4 col-xl-10 cuerpo">
      
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Modificar datos de los libros</h2>
    </div>

    <div id="msg"></div>
        
    <?php foreach($result as $clave): ?>
        
        <form class="formulario" id="formulario" method="post">
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Datos:</h6>
                </div>
    
                <div class="card-body">
                    <div class="p-2">
                    <input type="hidden" name="id" value="<?php echo $clave['id'] ?>">
                    <div class="row mb-2">
                            <div class="col-2">
                                <h6>Cota:</h6>
                            </div>
                            <div class="col-7">
                                <h6>Título:</h6>
                            </div>
                            <div class="col-3">
                                <h6>Categoría:</h6>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-2">
                                <input type="text" name="cota" value="<?php echo $clave['cota'] ?>" class="form-control" id="cota" placeholder="Cota:" required>      
                                <p class="formulario__input-error">El texto debe cumplir el formato cota</p>
                                <input type="hidden" id="url" name="url" value="<?php echo $helpers->url('libro', 'actualizar') ?>">
                                <input type="hidden" id="entidad" name="entidad" value="libro">
                                <input type="hidden" id="form" name="form" value="formupdate">                 
                            </div>
                            <div class="col-7">
                                <input type="text" name="titulo" value="<?php echo $clave['titulo'] ?>" class="form-control" id="titulo" placeholder="Título:" required>
                                <p class="formulario__input-error">El texto solo puede contener letras y espacios.</p>
                            </div>
                            <div class="col-3">
                                <select name="categoria" class="form-control" id="categoria">
                                    <option value="<?php echo $clave['categoria'] ?>"><?php echo $clave['nombrec'] ?></option>
                                    <?php foreach ($resultCate as $claveCate): ?>
                                        <?php if ($claveCate['nombre_c'] === $clave['nombrec']) unset($claveCate) ?>
                                        <?php if (isset($claveCate)) : ?>
                                            <option value="<?php echo $claveCate['id_c'] ?>"><?php echo $claveCate['nombre_c'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-7">
                                <h6>Autor:</h6>
                            </div>
                            <div class="col-5">
                                <h6>Estado:</h6>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-7">
                                <input type="text" name="autor" value="<?php echo $clave['autor'] ?>" class="form-control" id="autor" placeholder="Autor:" required>
                                <p class="formulario__input-error">El texto solo puede contener letras y espacios.</p>
                            </div>
                            <div class="col-5">
                                <select name="estado" class="form-control" id="estado">
                                    <?php if ($clave['estado'] === 'Lectura') : ?>
                                        <option value="Lectura">Disponible para su lectura</option>
                                        <option value="Lectura y prestamo">Disponible para su lectura y préstamo</option>
                                        <option value="No disponible">No disponible</option>
                                    <?php endif; ?>
                                    <?php if ($clave['estado'] === 'Lectura y prestamo') : ?>
                                        <option value="Lectura y prestamo">Disponible para su lectura y préstamo</option>
                                        <option value="Lectura">Disponible para su lectura</option>
                                        <option value="No disponible">No disponible</option>
                                    <?php endif; ?>
                                    <?php if ($clave['estado'] === 'No disponible') : ?>
                                        <option value="No disponible"><?php echo $clave['estado'] ?></option>
                                        <option value="Lectura">Disponible para su lectura</option>
                                        <option value="Lectura y prestamo">Disponible para su lectura y préstamo</option>
                                        <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-10">
                                <h6>Sinopsis:</h6>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-10">
                                <textarea name="sinopsis" id="sinopsis" class="form-control"><?php echo $clave['sinopsis'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
             <div class="text-center">
                <button id="btnEnviar" type="submit" class="btn color-acierto text-white">
                    Modificar Registro
                </button>
                <a id="link-msg" href="#msg"></a>
            </div>
        
        </form>
    <?php endforeach; ?>
   </section>
</div