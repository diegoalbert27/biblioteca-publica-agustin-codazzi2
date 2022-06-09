<section class="my-4 container">
    <div class="float-right col-xl-10">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Asignar existencia a <?php echo $resultLibro[0]['titulo'] ?></h2>
        </div>

        <form action="<?php echo $helpers->url('inventario', 'crear') ?>" method="post">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Datos de Inventario:</h6>
                </div>

                <div class="card-body">
                    <div class="p-2">
                        <div class="row mb-3">
                            <div class="col"><h3><?php echo $resultLibro[0]['cota'] ?></h3></div>
                            <div class="col"><h3><?php echo $resultLibro[0]['titulo'] ?></h3></div>
                            <div class="col"><h3><?php echo $resultLibro[0]['autor'] ?></h3></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="cantidad">Cantidad de Existencia</label>
                                <input type="number" class="form-control" name="cantidad" id="cantidad" required placeholder="Ingresar Cantidad de Libros">
                            </div>
                            <div class="col">
                                <label for="cantidad">Cantidad Minima</label>
                                <input type="number" class="form-control" name="minima" id="minima" required placeholder="Ingresar cantidad minima">
                                <input type="hidden" name="cota" value="<?php echo $resultLibro[0]['cota'] ?>" id="cota" placeholder="Cota">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn color-acierto text-white">
                    Asignar Cantidad
                </button>
            </div>

        </form>


    </div>
</section>