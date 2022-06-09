<section class="my-4 container">
    <div class="float-right col-xl-10">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Modificar datos</h2>
        </div>

        <?php foreach($result as $clave): ?>

        <form action="<?php echo $helpers->url('prestamo', 'actualizar') ?>" method="post">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Datos:</h6>
                </div>

                <div class="card-body">  
                    <div class="p-2">
                        <div class="row mb-2">
                            <div class="col-3">
                                <h6>Solicitante:</h6>
                            </div>
                            <div class="col-6">
                                <h6>Libro:</h6>
                            </div>
                            <div class="col-3">
                                <h6>Estado:</h6>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <input type="hidden" name="id" value="<?php echo $clave['idp'] ?>">
                                <select name="sol" class="form-control" id="sol">
                                    <option value="<?php echo $clave['idSol'] ?>"><?php echo $clave['idSol'] ?></option>
                                    <?php foreach ($resultSol as $claveSol) : ?>
                                        <?php if ($claveSol['id_sol'] === $clave['idSol']) unset($claveSol) ?>
                                            <?php if (isset($claveSol)) : ?>
                                            <option value="<?php echo $claveSol['id_sol'] ?>"><?php echo $claveSol['id_sol'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-6">
                                <select name="libro" class="form-control" id="libro">
                                    <option value="<?php echo $clave['id'] ?>"><?php echo $clave['titulo'] ?></option>
                                    <?php foreach ($resultLib as $claveLibros) : ?>
                                        <?php if ($claveLibros['titulo'] === $clave['titulo']) unset($claveLibros) ?>
                                            <?php if (isset($claveLibros)) : ?>
                                            <option value="<?php echo $claveLibros['id'] ?>"><?php echo $claveLibros['titulo'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-3">
                                <select name="estado" class="form-control" id="estado">
                                <?php if ($clave['estado'] == 1) : ?>
                                        <option value="1">Pendiente</option>
                                        <option value="0">Devuelto</option>
                                    <?php endif; ?>
                                    <?php if ($clave['estado'] == 0) : ?>
                                        <option value="0">Devuelto</option>
                                        <option value="1">Pendiente</option>
                                    <?php endif; ?>
                                </select>
                            </div>

                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <h6>Fecha de entrega:</h6>
                            </div>
                            <div class="col">                          
                                <h6>Fecha de devolución:</h6>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <input name="fe" id="fe" class="form-control" type="date" value="<?php echo $clave['fe'] ?>" required> </input>
                            </div>
                            <div class="col">
                                <input name="fd" id="fd" class="form-control" type="date" value="<?php echo $clave['fd'] ?>" required> </input>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <h6>Observaciones:</h6>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12">
                                <textarea  name="obs" id="obs" class="form-control"><?php echo $clave['obs'] ?></textarea>
                            </div>
                        </div>

                        <input type="hidden" name="estado" id="estado" value="<?php echo $clave['estado'] ?>">
                               
                        <div class="form-group text-center">
                            <button type="submit" class="btn color-acierto text-white">
                                Modificar Registro
                            </button>
                            <button type="reset" class="btn btn-outline-secondary">
                                Restablecer Campos
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </form>
        <?php endforeach; ?>
    </div>
</section>