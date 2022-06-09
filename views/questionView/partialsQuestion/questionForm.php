<section class="my-4 container">
    <div class="float-right col-xl-10">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Pregunta de Seguridad para Recuperación de Cuenta</h2>
        </div>

        <div class="inputs-question">

            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="p-2">

                        <div class="row mb-2">
                            <div class="col-7">
                                <h6>Pregunta:</h6>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <input type="text" name="pregunta" class="form-control" id="pregunta" value="<?php echo !empty($question) ? $question[0]['pregunta'] : '' ?>" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-7">
                                <h6>Respuesta:</h6>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <input type="text" name="respuesta" id="respuesta" class="form-control" value="<?php echo !empty($question) ? $question[0]['respuesta'] : '' ?>" required>
                                <input type="hidden" name="user" id="user" value="<?php echo $user ?>">
                                <input type="hidden" id="0" value="<?php echo !empty($question) ? $question[0]['id_que'] : '' ?>">
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="p-2">

                        <div class="row mb-2">
                            <div class="col-7">
                                <h6>Pregunta:</h6>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <input type="text" name="pregunta" class="form-control" value="<?php echo !empty($question) ? $question[1]['pregunta'] : '' ?>" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-7">
                                <h6>Respuesta:</h6>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <input type="text" name="respuesta" class="form-control" value="<?php echo !empty($question) ? $question[1]['respuesta'] : '' ?>" required>
                                <input type="hidden" id="2" value="<?php echo !empty($question) ? $question[1]['id_que'] : '' ?>">
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="p-2">

                        <div class="row mb-2">
                            <div class="col-7">
                                <h6>Pregunta:</h6>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <input type="text" name="pregunta" class="form-control" value="<?php echo !empty($question) ? $question[2]['pregunta'] : '' ?>" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-7">
                                <h6>Respuesta:</h6>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <input type="text" name="respuesta" class="form-control" value="<?php echo !empty($question) ? $question[2]['respuesta'] : '' ?>" required>
                                <input type="hidden" id="4" value="<?php echo !empty($question) ? $question[2]['id_que'] : '' ?>">
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="form-group text-center">
                <?php // echo empty($question) ? $helpers->url('question', 'crear') : $helpers->url('question', 'update'); 
                if (empty($question)): ?>
                    <button id="btnAdd" class="btn color-acierto text-white">
                        Agregar Registro
                    </button>
                <?php endif; ?>
                
                <?php if (!empty($question)): ?>
                    <button id="btnEdit" class="btn color-acierto text-white">
                        Modificar Registro
                    </button>
                <?php endif; ?>
            </div>

        </div>

    </div>
</section>
