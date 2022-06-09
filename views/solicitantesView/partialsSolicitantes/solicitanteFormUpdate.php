<div class="container">
    <section class="mt-4 col-xl-10 cuerpo">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Modificar datos</h2>
        </div>

        <div id="msg"></div>

        <?php foreach ($result as $clave) : ?>

            <form class="formulario" id="formulario" method="post">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Datos:</h6>
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
                                    <input type="hidden" name="id" value="<?php echo $clave['idSol'] ?>">
                                    <input type="text" name="nombre" value="<?php echo $clave['nomSol'] ?>" class="form-control" id="nombre" placeholder="Ingresar Nombre:" required>
                                    <p class="formulario__input-error">El texto solo puede contener letras y espacios.</p>
                                </div>
                                <div class="col">
                                    <input type="text" name="apellido" value="<?php echo $clave['apeSol'] ?>" class="form-control" id="apellido" placeholder="Ingresar Apellido:" required>
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
                                    <input type="text" name="cedula" value="<?php echo $clave['cedSol'] ?>" class="form-control" id="cedula" placeholder="Ingresar Cedula:" required>
                                    <p class="formulario__input-error">Debe ingresar valores numéricos o el valor debe ser numéricos.</p>
                                    <input type="hidden" id="url" name="url" value="<?php echo $helpers->url('solicitante', 'actualizar') ?>">
                                    <input type="hidden" id="entidad" name="entidad" value="solicitante">
                                    <input type="hidden" id="form" name="entidad" value="formupdate">
                                </div>
                                <div class="col-3">
                                    <select name="sexo" class="form-control" id="sexo">
                                        <?php if ($clave['sexSol'] === 'Masculino') : ?>
                                            <option value="<?php echo $clave['sexSol'] ?>"><?php echo $clave['sexSol'] ?></option>
                                            <option value="Femenino">Femenino</option>
                                            <option value="Otros">Otros</option>
                                        <?php endif; ?>
                                        <?php if ($clave['sexSol'] === 'Femenino') : ?>
                                            <option value="<?php echo $clave['sexSol'] ?>"><?php echo $clave['sexSol'] ?></option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Otros">Otros</option>
                                        <?php endif; ?>
                                        <?php if ($clave['sexSol'] === 'Otros') : ?>
                                            <option value="<?php echo $clave['sexSol'] ?>"><?php echo $clave['sexSol'] ?></option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <input type="text" name="edad" value="<?php echo $clave['edadSol'] ?>" id="dia" class="form-control" min="2" max="150" placeholder="Edad:" required>
                                    <p class="formulario__input-error">La edad debe ser correspondida entre 10 y 90 años.</p>
                                </div>
                                <div class="col-3">
                                    <select name="estado_s" class="form-control" id="estado_s">
                                        <?php if ($clave['estado_s'] === '1') : ?>
                                            <option value="<?php echo $clave['estado_s'] ?>">Activo</option>
                                            <option value="0">Inactivo</option>
                                        <?php endif; ?>
                                        <?php if ($clave['estado_s'] === '0') : ?>
                                            <option value="<?php echo $clave['estado_s'] ?>">Inactivo</option>
                                            <option value="1">Activo</option>
                                        <?php endif; ?>
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
                                    <input type="text" name="telefono" value="<?php echo $clave['teleSol'] ?>" class="form-control" id="tlf" placeholder="Teléfono" required>
                                    <p class="formulario__input-error">Debe ingresar valores numéricos o el valor debe ser numéricos.</p>
                                </div>
                                <div class="col-8">
                                    <input type="email" name="email" value="<?php echo $clave['corrSol'] ?>" class="form-control" id="email" placeholder="Correo Electrónico" required>
                                    <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <h6>Dirección de habitación:</h6>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <input type="text" name="direccion" value="<?php echo $clave['dirSol'] ?>" class="form-control" id="direccion" placeholder="Dirección" required>
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
                                        <option value="<?php echo $clave['idOcup'] ?>"><?php echo $clave['nomOcup'] ?></option>
                                        <?php foreach ($resultOcup as $claveOcup) : ?>
                                            <?php if ($claveOcup['nom_ocup'] === $clave['nomOcup']) unset($claveOcup) ?>
                                            <?php if (isset($claveOcup)) : ?>
                                                <option value="<?php echo $claveOcup['id_ocup'] ?>"><?php echo $claveOcup['nom_ocup'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="nom_inst" value="<?php echo $clave['nomInst'] ?>" id="institucion-name" placeholder="Nombre de la Institución:">
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
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="tel_inst" value="<?php echo $clave['telInst'] ?>" id="institucion-tel-name" placeholder="Teléfono de la Institución:">
                                    <p class="formulario__input-error">Debe ingresar valores numéricos o el valor debe ser numéricos.</p>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="dir_inst" value="<?php echo $clave['dirInst'] ?>" class="form-control" id="direccion-text" placeholder="Dirección de la Institución:">
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