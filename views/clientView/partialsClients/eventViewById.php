<?php

$action = $helpers->url("session", "login");

if (isset($_SESSION['user_id'])) {
    $action = $helpers->url("events", "participar&id=");
    $action2 = $helpers->url("events", "interesado&id=");
}

?>

<section class="my-4 container">
        <div class="float-right col-xl-10">
            <div class="py-3 mx-4">
                <div class="justify-content-center">
                    <?php $i = 0; foreach ($resulteventos as $event) : ?>
                        <h2 class="my-3"><?php echo $resulteventos[0]['date_realized_event'] ?></h2>
                        <h4 class="mb-4"><?php echo $resulteventos[0]['title_event'] ?></h4>
                        <div class="ml-3">
                            <p class="mb-3"><?php echo $resulteventos[0]['info_event'] ?></p>
                            <div class="row">

                                <div class="col-4">

                                    <?php $is_participant = true;
                                    foreach ($idParticipant as $clave) : ?>
                                        <?php if ($resulteventos[0]['id_event'] === $clave['id_event']) : ?>

                                            <p class="mt-4 font-weight-bold mb-1">¡Asistencia confirmada!</p>
                                            <a href="index.php?controller=events&action=cancelar&id=<?php echo  $clave['ID'] ?>" class="col-8 btn btn-danger mt-1">Cancelar</a>
                                            
                                            <?php $is_participant = false; ?>

                                    <?php endif;
                                    endforeach; ?>

                                    <?php if ($is_participant) : ?>
                                        <div class="row">
                                            <p class="mt-4 font-weight-bold mb-1">Confirma tu asistencia</p>
                                            <a href="<?php echo $action . $resulteventos[0]['id_event']; ?>" class="col-8 btn btn-success mt-1">
                                                <h6>Participar</h6>
                                            </a>
                                            <p class="mt-4 font-weight-bold mb-1">¿No estás seguro?</p>
                                            <a href="<?php echo $action2 . $resulteventos[0]['id_event']; ?>" class="col-8 btn btn-primary mt-1">
                                                <h6>Me interesa</h6>
                                            </a>
                                        </div>
                                    <?php endif; $i = count($array) - 1;?>

                                </div>

                                <div class="col-2 mt-1 text-center">
                                    <p class="mb-1 mt-4 text-secondary font-weight-bold">Participantes:</p>
                                    <h3 class="mt-0 font-weight-bold"><?php echo count($totalParticipant[$event['id_event']]) ?></h3>
                                </div>
                            </div>
                        <?php endforeach ?>
                        </div>
                </div>
            </div>
    </section>