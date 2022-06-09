<section class="my-4 container">
    <div class="float-right col-xl-10">
            <div class="py-3 mx-4">
                <div class="justify-content-center">
                    <?php foreach ($result as $clave) : ?>
                    <h3 class="mt-3"><?php echo $clave['title_blog'] ?></h3>
                <h5 class="mb-5 text-secondary"><?php echo $clave['author_blog'] ?></h5>
                <div class="ml-3">
                <p class="mb-3 lead"><?php echo $clave['content_blog'] ?></p>
                    </div>
                    <a class="btn color-primario text-white float-right mt-3 mr-3 mb-5" href="index.php?controller=blog&action=blogpdf&id=<?php echo $clave['id_blog'] ?>" target="_blanck" role="button">Descargar <i class="fas fa-download"></i></a>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        </section>