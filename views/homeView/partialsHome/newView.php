<!-- Header-->
<header class="masthead py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6 my-5">
                        <div class="text-center my-5">
                            <h1 class="display-5 text-white mb-2">Noticias</h1>
                            <p class="lead text-white mb-4">El libre acceso a la lectura, el aprendizaje y el conocimiento.</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ¿Quienes somos?--> 
        <section class="py-5 border-bottom">
            <div class="container px-5 mb-5">
                <div class="px-5 mb-5">
                    <h4>Últimas noticias</h4>
                    <hr>
                    <div class="mt-4 row justify-content-center">
                    <div class="col-lg-10">
                    <?php foreach ($resultNews as $clave) : ?>
                <div class="py-3">
                    <h4 class="mb-1"><?php echo $clave['title_new'] ?></h4>
                    <p class="mb-3"><?php echo $clave['date_new'] ?> | <?php echo $clave['author_new'] ?></p>
                    <a href="<?php echo $helpers->url("session", "login") ?>" class="link">Ver más...</a>
                </div>
                <hr>
                <?php endforeach; ?>
            </div>
        </section>