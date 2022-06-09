<?php

$msg = '';

if (isset($_REQUEST['r'])) {
    switch ($_REQUEST['r']) {
        case '1':
            $msg = 'Datos invalidos';
        break;
    }
}

?>
<div class="background-login">
    <div class="row">
        <div class="mx-auto card w-25 text-center login-box">
            <div class="card-body container">
                <?php if (!empty($msg)): ?>
                    <div class="alert alert-danger">
                        <?php echo $msg ?></span>
                    </div>
                <?php endif; ?>
                <img src='assets/img/biblioteca.jpg' alt="" width="175" height="115">
                <h3 class="card-title">Recuperar Cuenta</h3>
                <p><i class="fas fa-exclamation-circle"></i> Para recuperar una cuenta tiene ingresar el nombre de usuario, nombre completo o correo electrónico asociada a ella</p>
                <form class="mt-3" action="<?php echo $helpers->url('session', 'question'); ?>" method="post">
                    <div class="form-group">
                        <input class="form-control" type="text" name="user" placeholder="Nombre de Usuario" required>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block color-primario text-white" type="submit" value="Confirmar">
                    </div>
                    <a href="<?php echo $helpers->url('session', 'index'); ?>">Volver</a>
                </form>
            </div>
        </div>
    </div>
</div>