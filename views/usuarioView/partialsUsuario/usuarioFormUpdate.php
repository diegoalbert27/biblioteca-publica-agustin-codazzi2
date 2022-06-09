<section class="my-4 container">
    <div class="float-right col-xl-10">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Modificar datos</h2>
            <a class="btn color-acierto text-white float-right" href="<?php echo $helpers->url('question', 'form') . '&r=' . $_GET['id'] ?>" role="button">Preguntas de Seguridad </i></a>
        </div>
        <div class="card shadow m-3">



            <div class="card-header py-md-3">
                <h6 class="m-0 font-weight-bold text-primary">Usuario:</h6>
            </div>

            <?php foreach ($result as $clave) : ?>

                <div class="card-body">
                    <div class="p-2">
                        <form action="<?php echo $helpers->url('usuario', 'actualizar') ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $clave['id_user'] ?>">

                            <div class="row mb-1">
                                <div class="col">
                                    <h6>Nombre:</h6>
                                </div>
                                <div class="col">
                                    <h6>Usuario:</h6>
                                </div>
                                <div class="col">
                                    <h6>Contraseña:</h6>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <input type="text" class="form-control" name="name_user" value="<?php echo $clave['name_user'] ?>" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="email_user" value="<?php echo $clave['email_user'] ?>" required>
                                </div>
                                <div class="col">
                                    <input type="password" class="form-control" name="passwd_user" required>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col">
                                    <h6>Teléfono:</h6>
                                </div>
                                <div class="col">
                                    <h6>Correo electrónico:</h6>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <input type="text" class="form-control" name="tlf_user" value="<?php echo $clave['tlf_user'] ?>" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="correo_user" value="<?php echo $clave['correo_user'] ?>" required>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn color-acierto text-white">Modificar usuario</button>
                            </div>

                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>