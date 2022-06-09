<section class="my-2 container">
    <div class="float-right col-xl-10">
        <div class="py-3 ml-4">
            <div class="justify-content-center">

                <h2 class="my-3"><?php echo $resultEventos[0]['date_realized_event'] ?></h2>
                <h4><?php echo $resultEventos[0]['title_event'] ?></h4>
                <p class="mb-2 ml-2 text-secondary"><?php echo $resultEventos[0]['organizer_event'] ?></p>
                <hr>
                <div class="mx-5 mt-4">
                    <p class="mb-3"><?php echo $resultEventos[0]['info_event'] ?></p>
                    <div class="row">
                        <div class="col-4">
                            <p class="font-weight-bold mt-3 mb-1">Tipo de evento:</p>
                            <p><?php echo $resultEventos[0]['type_event'] ?></p>
                        </div>
                        <div class="col-3">
                            <p class="font-weight-bold mt-3 mb-1">Aforo:</p>
                            <p><?php echo $resultEventos[0]['participants_event'] ?></p>
                        </div>
                        <div class="col-5">
                            <p class="font-weight-bold mt-3 mb-1">Lugar:</p>
                            <p><?php echo $resultEventos[0]['place_event'] ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <p class="font-weight-bold mt-3 mb-1">Estado:</p>
                            <p><?php echo $resultEventos[0]['state_event'] ?></p>
                        </div>
                        <div class="col-3">
                            <?php if (isset($totalParticipant[$resultEventos[0]['id_event']])) : ?>
                                <p class="font-weight-bold mt-3 mb-1">Interesados:</p>
                                <p>
                                    <?php echo count($totalParticipant[$resultEventos[0]['id_event']]) ?>

                                    <?php if (count($totalParticipant[$resultEventos[0]['id_event']]) >= 1) : ?>
                                        <?php foreach ($resultEventos as $event) : ?>
                                            <a href="index.php?controller=events&action=participants&id=<?php echo $event['id_event']; ?>" class="link"> Ver info</a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </p>
                            <?php endif; ?>
                        </div>

                    </div>

        </div>
    </div>
</section>