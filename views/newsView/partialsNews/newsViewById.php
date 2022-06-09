<section class="my-4 container">
    <div class="float-right col-xl-10">
        <div class="py-3 mx-4">
            <div class="justify-content-center">
                <?php foreach ($result as $clave) : ?>
                    <h3 class="mt-3"><?php echo $clave['title_new'] ?></h3>
                    <h5 class="mb-5 text-secondary"><?php echo $clave['author_new'] ?></h5>
                    <div class="ml-3 mb-3">
                        <p class="mb-3 lead"><?php echo $clave['content_new'] ?></p>
                    </div>
                    <a class="btn color-primario text-white float-right mt-3 mr-3 mb-5" target="_blanck" href="index.php?controller=news&action=newpdf&id=<?php echo $clave['id_new'] ?>" role="button">Descargar <i class="fas fa-download"></i></a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>