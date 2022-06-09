<div class="background-login">
    <div class="row">
        <div class="mx-auto card w-25 text-center login-box">
            <div class="card-body container">
                <img src='assets/img/biblioteca.jpg' alt="" width="175" height="115">
                <h3 class="card-title">Preguntas de seguridad</h3>
                
                <form action="<?php echo $helpers->url('session', 'confirmar'); ?>" method="post">
                    <div class="form-group">
                        <p name="pregunta1"><?php echo $question[0]['pregunta'] ?></p>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="respuesta1" placeholder="Respuesta" required>
                        <input type="hidden" name="user" value="<?php echo $question[0]['user_que'] ?>">
                        <input type="hidden" name="id1" value="<?php echo $question[0]['id_que'] ?>">
                    </div>

                    <div class="form-group">
                        <p name="pregunta2"><?php $nRandom = rand(1, 2); echo $question[$nRandom]['pregunta'] ?></p>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="respuesta2" placeholder="Respuesta" required>
                        <input type="hidden" name="id2" value="<?php echo $question[$nRandom]['id_que'] ?>">
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