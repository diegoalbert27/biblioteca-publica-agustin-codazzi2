<section class="my-4 container">
    <div class="float-right col-xl-10">
        <div class="row">

            <div class="card shadow m-3 col-5">

                <div class="card-header py-md-3">
                    <h6 class="m-0 font-weight-bold">Modificar categoría:</h6>
                </div>
                <?php foreach ($result as $clave) : ?>

                <div class="card-body">
                    <div class="p-2">
                        <form action="<?php echo $helpers->url('categoria', 'actualizar') ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $clave['id_c'] ?>">

                            <div class="row mb-3">         
                                <input type="text" class="form-control" name="nombre_c" value="<?php echo $clave['nombre_c'] ?>" placeholder="Nombre de la categoría" required>
                            </div>

                            <div class="row mb-3">
                                <select name="piso" class="form-control" id="piso">
                                <?php if ($clave['piso'] === '1') : ?>
                                        <option value="1">Ubicada en el piso 1</option>
                                        <option value="2">Ubicada en el piso 2</option>
                                    <?php endif; ?>
                                    <?php if ($clave['piso'] === '2') : ?>
                                        <option value="2">Ubicada en el piso 2</option>
                                        <option value="1">Ubicada en el piso 1</option>
                                    <?php endif; ?>
                                </select>
                            </div>
               
                            <div class="text-center">
                                <button type="submit" class="btn color-primario text-white">Agregar categoría</button>
                            </div>
            
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            
        </div>
    </div>
</section>