<?php

$action = $helpers->url("session", "login");

if (isset($_SESSION['user_id'])) {
    $action = $helpers->url("events", "participar&id=");
}


?>
<div class="row justify-content-center my-5 py-5 vh-100">
            <div class="col-8 mt-3">
                <h2 class="my-3"><?php echo $resultEventos[0]['date_realized_event'] ?></h2>
                <h4 class="mb-4"><?php echo $resultEventos[0]['title_event'] ?></h4>
                <div class="ml-3">
                <p>
                    <?php echo $resultEventos[0]['info_event'] ?>
                </p>
                <a href="<?php echo $action . $resultEventos[0]['id_event']; ?>" class="btn btn-secondary">Participar</a>
            </div>
            </div>
        </div>