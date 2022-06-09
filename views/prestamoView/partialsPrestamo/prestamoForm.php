<?php $date = date('Y-m-d'); ?>
<section class="my-4 container">
    <div class="float-right col-xl-10">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Servicio de préstamo circulante</h2>
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
                            <div class="col">
                                <h6>Solicitante:</h6>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-4">
                                <input type="text" class="form-control" name="cedula-usuario" id="cedula-usuario" placeholder="Ej: 282494811">
                                <input type="hidden" name="url" id="url" value="<?php echo $helpers->url('prestamo', 'crear') ?>">
                                <input type="hidden" name="sol" id="sol">
                                <input type="hidden" id="entidad" name="entidad" value="prestamo">
                                <input type="hidden" id="form" name="form" value="form">
                                <p class="formulario__input-error">Debe ingresar valores numérico</p>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control d-none" name="nombre-usuario" id="nombre-usuario" placeholder="Nombre y Apellido" readonly>
                                <p class="formulario__input-error">El texto solo puede contener letras y espacios.</p>
                            </div>
                            <!-- <div class="col-6">
                                <select name="sol" class="form-control" id="sol">
                                    <?php foreach ($resultSol as $clave) : ?>
                                        <option value="<?php echo $clave['id_sol'] ?>"><?php echo $clave['id_sol'] ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div> -->
                            <div class="col-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <h6>Libro:</h6>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-4">
                                <input type="text" class="form-control" name="cota" id="cota" placeholder="Ej: A102">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control d-none" name="nombre-libro" id="nombre-libro" placeholder="Titulo y Categoria" readonly>
                                <input type="hidden" name="libro" id="libro">
                            </div>
                            <!-- <div class="col">
                                <select name="libro" class="form-control" id="libro">
                                    <?php foreach ($resultLib as $clave) : ?>
                                        <option value="<?php echo $clave['id_libro'] ?>"><?php echo $clave['titulo'] ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div> -->
                            <div class="col-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
                                    <!-- <i class="fas fa-plus"></i> -->
                                    <i class="fas fa-book" aria-hidden="true"></i>
                                </button>
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
                                <input name="fe" id="fe" class="form-control" type="date" value="<?php echo $date ?>" min="<?php echo $date ?>" max="<?php echo $date ?>" required> </input>
                            </div>
                            <div class="col">
                                <input name="fd" id="fd" class="form-control" type="date" value="<?php echo $date ?>" min="<?php echo $date ?>" required> </input>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <h6>Observaciones:</h6>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12">
                                <textarea name="obs" id="obs" class="form-control"> </textarea>
                            </div>
                        </div>

                        <input type="hidden" name="estado" id="estado" value="1">

                        <div class="form-group text-center">
                            <button id="btnEnviar" type="submit" class="btn color-acierto text-white">
                                Agregar Registro
                            </button>
                            <button type="reset" class="btn btn-outline-secondary">
                                Restablecer Campos
                            </button>
                            <a id="link-msg" href="#msg"></a>
                        </div>

                    </div>
                </div>
            </div>

        </form>

    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Solicitantes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table-sol" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Libros</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table-book" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cota</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Categoria</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>