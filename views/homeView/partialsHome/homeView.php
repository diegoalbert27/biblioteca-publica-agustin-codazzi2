<?php

define('NUM_ITEMS_BY_PAGE', 6);

$num_total_rows = count($resultLibros);
$num_total_rows = count($resultEvents);
$num_total_rows = count($resultNews);

if ($num_total_rows > 0) {
    $page = false;

    //examino la pagina a mostrar y el inicio del registro a mostrar
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

    if (!$page) {
        $start = 0;
        $page = 1;
    } else {
        $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
    }

    $resultl = array_slice($resultLibros, $start, NUM_ITEMS_BY_PAGE);
    $resulte = array_slice($resultEvents, $start, NUM_ITEMS_BY_PAGE);
    $resultn = array_slice($resultNews, $start, NUM_ITEMS_BY_PAGE);
}

?>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="<?php echo $helpers->url("home", "index") ?>">Biblioteca</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $helpers->url("home", "about") ?>">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $helpers->url("home", "book") ?>">Libros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $helpers->url("home", "event") ?>">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $helpers->url("home", "new") ?>">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $helpers->url("home", "blog") ?>">Blog</a>
                </li>
            </ul>
        </div>

    </div>
</nav>
<!-- Header-->
<header class="masthead py-5">
    <div class="container px-5">
        <div class="row py-5 justify-content-center">
            <div class="col-lg-6 my-5">
                <div class="text-center my-5">
                    <h1 class="display-5 fw-bolder text-white font-weight-bold mb-2">Biblioteca Agustín Codazzi</h1>
                    <p class="lead text-white mb-4">En busca de un espacio seguro donde sea posible para todos el libre acceso a la lectura, el aprendizaje y el conocimiento.</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center my-5">
                        <a class="btn btn-secondary btn-lg px-4 me-sm-3 mr-3" href="<?php echo $helpers->url("session", "login") ?>" target="_blank">Iniciar sesión</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="<?php echo $helpers->url("session", "signup") ?>" target="_blank">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ¿Quienes somos?-->
<section class="bg-light py-5 border-bottom">
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder mb-4">¿Quienes somos?</h2>
            <p class="lead mb-5">Somos un centro que rescata, preserva, organiza y difunde el acervo documental estatal y facilita el acceso a una variedad de materiales bibliográficos con el proposito de satisfacer las necesidades de información personal, educacional, profesional y recreacional de los ciudadanos.</p>
            <img class="img img-thumbnail m-2" src="./assets/img/IMG1.jpg" alt="..." />
            <img class="img img-thumbnail m-2" src="./assets/img/IMG2.jpg" alt="..." />
        </div>
    </div>
</section>
<!-- Books section-->
<?php if (isset($resultl)) : ?>
    <section class="py-5 border-bottom">
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">Nuevas lecturas</h2>
                <a href="<?php echo $helpers->url("home", "book") ?>" class="link">Ver más</a>
            </div>

            <div class="row">
                <?php if (isset($resultl)) foreach ($resultl as $clave) : ?>
                    <div class="col m-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <div class="d-flex flex-column text-center">
                                    <h5 class="card-title"><?php echo $clave['titulo'] ?></h5>
                                    <h6 class="text-secondary mb-3"><?php echo $clave['autor'] ?></h6>
                                    <div class="border border-success rounded-pill d-inline">
                                        <p class="m-auto"><?php echo $clave['nombrec'] ?></p>
                                    </div>
                                </div>
                                <p class="card-text">
                                    <ul>
                                        <li>
                                            <h6>Estado: </h6><?php echo $clave['estado'] ?>
                                        </li>
                                    </ul>
                                </p>
                                <div class="text-center d-flex flex-column">
                                    <a href="<?php echo $helpers->url("session", "login") ?>" class="stretched-link">Seguir Leyendo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <br>

        </div>
    </section>
<?php endif; ?>
<!-- Eventos-->
<section class="bg-light py-5 border-bottom">
    <div class="container  text-center px-5 my-5">
        <div class="mb-5">
            <h2 class="fw-bolder">Últimos eventos</h2>
            <a href="<?php echo $helpers->url("home", "event") ?>" class="link">Ver más</a>
        </div>
        <div class="row mb-4 justify-content-center">
            <?php foreach ($resulte as $claveEvents) : ?>
                <div class="col-lg-3 col-sm-11 m-4">
                    <i class="fa-regular fa-calendar fa-2xl"></i>
                    <p class="h3 mt-3"><?php echo $claveEvents['date_realized_event'] ?></p>
                    <h4 class="text-secondary"><?php echo $claveEvents['title_event'] ?></h4>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Noticias-->
<section class="py-5 border-bottom">
    <div class="container px-5 my-5">
        <div class="mb-5 text-center">
            <h2 class="fw-bolder">Últimas noticias</h2>
            <a href="<?php echo $helpers->url("home", "news") ?>" class="link">Ver más</a>
        </div>
        <div class="row mb-4 justify-content-center">
            <?php foreach ($resultn as $claveNews) : ?>
                <div class="col-lg-3 col-sm-11 m-4 text-center">
                    <i class="fa-regular fa-newspaper fa-2xl"></i>
                    <p class="h4 mt-3"><?php echo $claveNews['title_new'] ?></p>
                    <hp class="text-secondary"><?php echo $claveNews['date_new'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>