<!-- Header-->
<header class="masthead py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6 py-5 mt-3">
                        <div class="text-center mt-5">
                        <h1 class="display-5 text-white mb-2">Eventos</h1>
                            <p class="lead text-white mb-4">El libre acceso a la lectura, el aprendizaje y el conocimiento.</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ¿Quienes somos?-->
        <section class="py-5 border-bottom">
            <div class="container px-5 my-3">
                <h2 class="pb-4">Próximos eventos</h2>
                
                <?php foreach($resultEventos as $event): ?>
                    <div class="px-5 row">
                    <div class="col-lg-1 font-weight-bold"><h1 class="mb-0"><?php echo substr($event['date_realized_event'], 8) ?></h1></div>
                    <div class="col-lg-1">
                        <p class="mb-0 text-secondary font-weight-bold">Fecha:</p>
                        <h6 class="mt-0 mb-4 font-weight-bold"><?php echo substr($event['date_realized_event'], 0, 7) ?></h6>
                    </div>
                    <div class="col"><h4 class="mt-0 font-weight-bold"><?php echo $event['title_event'] ?></h4>  
                        <p>Biblioteca Agustín Codazzi</p> 
                    </div>
                    <div class="col-lg-2 font-weight-bold mb-3">
                        <a href="<?php $id = $event['id_event']; echo $helpers->url("home", "viewevent&id=$id"); ?>" class="btn btn-secondary">Ver más</a>
                    </div>
                </div>
                <hr>
                <?php endforeach; ?>
            </div>
        </section>
        