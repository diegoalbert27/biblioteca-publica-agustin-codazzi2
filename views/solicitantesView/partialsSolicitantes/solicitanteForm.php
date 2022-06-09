<section class="my-4 container">
    <div class="float-right col-xl-10">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Registro de nuevos solicitantes</h2>
        </div>

        <div id="msg"></div>

        <form class="formulario" id="formulario" method="post">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Datos personales:</h6>
                </div>

                <div class="card-body">
                    <div class="p-2">
                        <div class="row mb-2">
                            <div class="col">
                                <h6>Nombres:</h6>
                            </div>
                            <div class="col">
                                <h6>Apellidos:</h6>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <input type="text" name="nombre" class="form-control" id="nombre" required>
                                <p class="formulario__input-error">El texto solo puede contener letras y espacios.</p>
                            </div>
                            <div class="col">
                                <input type="text" name="apellido" class="form-control" id="apellido" required>
                                <p class="formulario__input-error">El texto solo puede contener letras y espacios.</p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <h6>Cédula de identidad:</h6>
                            </div>
                            <div class="col-3">
                                <h6>Sexo:</h6>
                            </div>
                            <div class="col-3">
                                <h6>Edad:</h6>
                            </div>
                            <div class="col-3">
                                <h6>Estado:</h6>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-3">
                                <input type="text" name="cedula" class="form-control" id="cedula" required>
                                <p class="formulario__input-error">Debe ingresar valores numéricos.</p>
                                <input type="hidden" id="url" name="url" value="<?php echo $helpers->url('solicitante', 'crear') ?>">
                                <input type="hidden" id="entidad" name="entidad" value="solicitante">
                                <input type="hidden" id="form" name="form" value="form">
                            </div>
                            <div class="col-3">
                                <select name="sexo" class="form-control" id="sexo">
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <input type="text" name="edad" id="dia" class="form-control" min="2" max="150" required>
                                <p class="formulario__input-error">La edad debe ser correspondida entre 12 y 90 años.</p>
                            </div>
                            <div class="col-3">
                                <select name="estado_s" class="form-control" id="estado_s">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Contacto:</h6>
                </div>

                <div class="card-body">
                    <div class="p-2">
                        <div class="row mb-2">
                            <div class="col-4">
                                <h6>Teléfono:</h6>
                            </div>
                            <div class="col-8">
                                <h6>Correo electrónico:</h6>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">
                                <input type="text" name="telefono" class="form-control" id="tlf" required>
                                <p class="formulario__input-error">Debe ingresar valores numéricos.</p>
                            </div>
                            <div class="col-8">
                                <input type="email" name="email" class="form-control" id="email" required>
                                <p class="formulario__input-error">El correo sólo puede contener letras, números, puntos, guiones y guión bajo.</p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <h6>Dirección de habitación:</h6>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <input type="text" name="direccion" class="form-control" id="direccion" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lugar de estudio o trabajo:</h6>
                </div>

                <div class="card-body">
                    <div class="p-2">
                        <div class="row mb-2">
                            <div class="col-3">
                                <h6>Ocupación:</h6>
                            </div>
                            <div class="col">
                                <h6>Nombre del lugar de estudio o trabajo:</h6>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <select name="ocupacion" class="form-control" id="ocupacion">
                                    <?php foreach ($resultOcup as $clave) : ?>
                                        <option value="<?php echo $clave['id_ocup'] ?>"><?php echo $clave['nom_ocup'] ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="nom_inst" id="institucion-name">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <h6>Teléfono:</h6>
                            </div>
                            <div class="col-8">
                                <h6>Dirección:</h6>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">
                                <input type="text" class="form-control" name="tel_inst" id="institucion-tel-name">
                                <p class="formulario__input-error">Debe ingresar valores numéricos.</p>
                            </div>
                            <div class="col-8">
                                <input type="text" name="dir_inst" class="form-control" id="direccion-text">
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