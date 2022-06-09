<?php

$msg = '';

if (isset($_REQUEST['r'])) {
    switch ($_REQUEST['r']) {
        case '1':
            $msg = '<b>Error</b> al Iniciar Sesión
            <br>Datos invalidos';
            $tipo_alerta = 'danger';
            break;
        case '2':
            $msg = '<b>Error</b> al Iniciar Sesión
            <br><b>La contraseña ingresada es incorrecta</b><br> Queda ' . $_REQUEST['intents'] . ' intentos <span title="Si se equivoca mas de tres veces su cuenta sera desactivada" class="fa fa-question-circle"></span>';
            $tipo_alerta = 'danger';
            break;
        case '3':
            $msg = '<b>Error</b> al Iniciar Sesión
            <br>Ups, Los intentos se acabaron su cuenta ha sido bloqueada por seguridad, por favor comunicar con el admin o para recuperar su cuenta cambie su contraseña con las preguntas de seguridad';
            $tipo_alerta = 'danger';
            break;
        case '4':
            $msg = 'Se ha registado. <br> Inicie sesión';
            $tipo_alerta = 'success';
        break;
    }
}

?>

<body class="bg-dark">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center mb-3">
                                        <img src='assets/img/biblioteca.jpg' alt="" width="120" height="80">
                                        <h1 class="h3 text-gray-900 mt-2 mb-4">¡Bienvenidos!</h1>
                                    </div>
                                    <?php if (!empty($msg)) : ?>
                                        <div class="alert alert-danger text-center">
                                            <span>
                                                <?php echo $msg ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <form class="user" action="<?php echo $helpers->url('session', 'iniciar'); ?>" method="post">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Usuario" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña" required>
                                        </div>

                                        <div class="form-group">
                                            <input class="btn btn-block color-primario text-white" type="submit" value="Ingresar">
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="<?php echo $helpers->url('session', 'cuenta'); ?>">¿Olvidaste tu contraseña?</a>
                                        </div>
                                        <div class="text-center mb-5">
                                            <a class="small" href="<?php echo $helpers->url('session', 'signup'); ?>">¡Crea una cuenta!</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>