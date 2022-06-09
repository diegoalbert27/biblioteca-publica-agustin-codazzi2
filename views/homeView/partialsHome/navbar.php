<?php

$account = 'Iniciar sesión';
$action = $helpers->url("client", "login");

if (isset($_SESSION['client'])) {
    $account = 'Cerrar Sesión';
    $action = $helpers->url("client", "cerrar");
}

?>


<!-- NAVBAR 
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand my-0 py-0" href="<?php echo $helpers->url("home", "index") ?>">Biblioteca</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item mt-3"><a class="nav-link" href="<?php echo $helpers->url("home", "about") ?>">Nosotros</a></li>
                <li class="nav-item mt-3"><a class="nav-link" href="<?php echo $helpers->url("home", "book") ?>">Libros</a></li>
                <li class="nav-item mt-3"><a class="nav-link" href="<?php echo $helpers->url("home", "event") ?>">Eventos</a></li>
                <li class="nav-item mt-3"><a class="nav-link" href="<?php echo $helpers->url("home", "new") ?>">Noticias</a></li>
                <li class="nav-item mt-3"><a class="nav-link" href="<?php echo $helpers->url("home", "blog") ?>">Blog</a></li>
                <li class="nav-item m-0 p-0"><a class="nav-link" href="<?php echo $action ?>"><?php echo $account; ?></a></li>
            </ul>
        </div>
    </div>
</nav>

         NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">Biblioteca</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?php echo $helpers->url("home", "about") ?>">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo $helpers->url("home", "book") ?>">Libros</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo $helpers->url("home", "event") ?>">Eventos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo $helpers->url("home", "new") ?>">Noticias</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo $helpers->url("home", "blog") ?>">Blog</a></li>
                    </ul>
                </div>
            </div>
        </nav>