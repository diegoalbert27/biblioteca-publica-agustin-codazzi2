<section class="my-4 container">
    <div class="float-right col-xl-10">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Registro de nuevos libros</h2>
        </div>

        <div id="msg"></div>

        <form class="formulario" id="formulario" method="post">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Datos:</h6>
                </div>

                <div class="card-body">
                    <div class="p-2">

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
                                <input type="text" name="cota" class="form-control" id="cota" required>
                                <p class="formulario__input-error">El texto debe cumplir el formato cota</p>
                                <input type="hidden" id="url" name="url" value="<?php echo $helpers->url('libro', 'crear') ?>">
                                <input type="hidden" id="entidad" name="entidad" value="libro">
                                <input type="hidden" id="form" name="form" value="form">
                            </div>
                            <div class="col-7">
                                <input type="text" name="titulo" class="form-control" id="titulo" required>
                                <p class="formulario__input-error">El texto solo puede contener letras y espacios.</p>
                            </div>
                            <div class="col-3">
                                <select name="categoria" class="form-control" id="categoria">
                                    <?php foreach ($resultCate as $clave) : ?>
                                        <option value="<?php echo $clave['id_c'] ?>"><?php echo $clave['nombre_c'] ?> </option>
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
                                <input type="text" name="autor" class="form-control" required>
                                <p class="formulario__input-error">El texto solo puede contener letras y espacios.</p>
                            </div>
                            <div class="col-5">
                                <select name="estado" class="form-control" id="estado">
                                    <option value="Lectura">Disponible para su lectura</option>
                                    <option value="Lectura y prestamo">Disponible para su lectura y prestamo</option>
                                    <option value="No disponible">No disponible</option>
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
                            <textarea name="sinopsis" id="sinopsis" class="form-control"> </textarea>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cantidad:</h6>
                </div>

                <div class="card-body">
                    <div class="p-2">

                        <div class="row mb-2">
                            <div class="col-4">
                                <h6>Cantidad total del libro:</h6>
                            </div>
                            <div class="col-4">
                                <h6>Cantidad mínima del libro:</h6>
                            </div>
                        </div>

                        <div class="row mb-34">
                            <div class="col-4">
                                <input type="number" class="form-control" name="cantidad" id="cantidad" min="0" required>
                            </div>
                            <div class="col-4">
                                <input type="number" class="form-control" name="minima" id="minima" min="0" required>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="form-group text-center">
                <button id="btnEnviar" type="submit" class="btn color-acierto text-white">
                    Agregar Registro
                </button>
                <button type="reset" class="btn btn-outline-secondary">
                    Restablecer Campos
                </button>
                <a id="link-msg" href="#msg"></a>
            </div>

        </form>

    </div>
</section>