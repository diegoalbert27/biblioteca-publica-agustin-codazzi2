<section class="my-4 container">
    <div class="float-right col-xl-10">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Modificar cantidad </h2>
        </div>

        <form action="<?php echo $helpers->url('inventario', 'actualizar') ?>" method="post">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $resultLibro[0]['titulo'] ?></h6>
                </div>

                <div class="card-body">
                    <div class="p-2">
                        <div class="row mb-3">
                            <div class="col">
                                <h6>Cantidad de Existencia</h6>
                                <input type="number" class="form-control" name="cantidad" id="cantidad" required placeholder="Ingresar Cantidad de Libros" value="<?php echo $resultLibro[0]['stock'] ?>">
                            </div>
                            <div class="col">
                                <h6>Cantidad Minima</h6>
                                <input type="number" class="form-control" name="minima" id="minima" required placeholder="Ingresar cantidad minima" value="<?php echo $resultLibro[0]['min'] ?>">
                                <input type="hidden" name="cota" value="<?php echo $resultLibro[0]['cota'] ?>" id="cota">
                                <input type="hidden" name="id" value="<?php echo $resultLibro[0]['cantidad'] ?>" id="id">
                            </div>
                        </div>
                        <div class="row mb-3 mt-2">
                            <div class="col">
                                <h6>Cantidad Total</h6>
                                <input type="number" class="form-control" name="total" id="total" required value="<?php echo $resultLibro[0]['total'] ?>">
                            </div>
                            <div class="col">
                                <h6>Cantidad Resto</h6>
                                <input type="number" class="form-control" name="resto" id="resto" required value="<?php echo $resultLibro[0]['resto'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn color-acierto text-white">
                    Cambiar Inventario
                </button>
            </div>

        </form>


    </div>
</section>