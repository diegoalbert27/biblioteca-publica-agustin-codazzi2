<?php

    $id = $_SESSION['user_id'];
    $nivel = $_SESSION['nivel_user'];

?>


<?php if ($nivel == 5) : ?>
    <header>
        <div class="bb d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="navbar-nav sidebar-container fixed-top bg-dark">
                <div class="sidebar">
                    <a class="logo text-light" href="index.php?controller=inicio">
                        <h4><i class="fas fa-book"></i> Biblioteca </h4>
                    </a>

                    <hr class="sidebar-divider my-0">

                    <div class="menu">

                        <a class="d-block p-3 text-light nav-link" data-toggle="collapse" href="#collapse" aria-expanded="false" aria-controls="collapse">
                            <h6><i class="fas fa-rotate"></i> Préstamo circulante <i class="fas fa-angle-right gray mt-1"></i></h6>
                        </a>


                        <div class="collapse" id="collapse">
                            <div class="ml-5">
                                <a href="index.php?controller=prestamo" class="d-block text-light mb-1">Préstamos</a>
                                <a href="index.php?controller=pendiente" class="d-block text-light mb-4">Devolución</a>
                            </div>
                        </div>

                        <a href="index.php?controller=solicitante" class="d-block p-3 text-light nav-link">
                            <h6> <i class="fas fa-book-reader"></i> Solicitantes </h6>
                        </a>
                        <a href="index.php?controller=libro" class="d-block p-3 text-light nav-link">
                            <h6> <i class="fas fa-book-open"></i> Libros </h6>
                        </a>
                        <a href="index.php?controller=events" class="d-block p-3 text-light nav-link">
                            <h6> <i class="fas fa-calendar"></i> Eventos </h6>
                        </a>
                        <a href="index.php?controller=usuario" class="d-block p-3 text-light nav-link">
                            <h6><i class="fas fa-users"></i> Usuarios </h6>
                        </a>
                        <a href="index.php?controller=usuario&action=perfil&id=<?php echo $id ?>" class="d-block p-3 text-light nav-link">
                            <h6><i class="fas fa-user"></i> Perfil </h6>
                        </a>
                        <a href="index.php?controller=ayuda" class="d-block p-3 text-light nav-link">
                            <h6><i class="fas fa-question-circle"></i> Ayuda </h6>
                        </a>
                        <a href="<?php echo $helpers->url('session', 'cerrar') ?>" class="d-block p-3 text-light nav-link">
                            <h6><i class="fas fa-sign-out-alt"></i> Cerrar sesión</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-light bg-white shadow-sm">
            <span class="navbar-brand mb-0 h1">"Agustín Codazzi"</span>
            <div class="header-date pull-left mt-1">
                <h5><?php date_default_timezone_set('America/Caracas');
                echo date("d/m/Y  g:i a"); ?></h5>
            </div>
        </nav>

    </header>
    <body class="bg-light">

<?php elseif ($nivel == 10): ?>
        
    <header>
        <div class="bb d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="navbar-nav sidebar-container fixed-top bg-dark">
                <div class="sidebar">
                    <a class="logo text-light" href="index.php?controller=inicio">                   
                        <h4><i class="fas fa-book"></i> Biblioteca </h4>
                    </a>
                    
                    <hr class="sidebar-divider my-0">
    
                    <div class="menu">

                        <a class="d-block p-3 text-light nav-link" data-toggle="collapse" href="#collapse1" aria-expanded="false" aria-controls="collapse">
                            <h6> Registros <i class="fas fa-angle-right gray mt-1"></i></h6>
                        </a>
                        

                        <div class="collapse" id="collapse1">
                            <div class="ml-5">
                                <a href="<?php echo $helpers->url('solicitante', 'form'); ?>" class="d-block text-light mb-1">Solicitante</a>
                                <a href="<?php echo $helpers->url('libro', 'form'); ?>" class="d-block text-light mb-1">Libro</a>
                                <a href="<?php echo $helpers->url('news', 'form'); ?>" class="d-block text-light mb-1">Noticia</a>
                                <a href="<?php echo $helpers->url('blog', 'form'); ?>" class="d-block text-light mb-4">Blog</a>
                            </div>
                        </div>


                        <a class="d-block p-3 text-light nav-link" data-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse">
                            <h6> Procesos <i class="fas fa-angle-right gray mt-1"></i></h6>
                        </a>
                        
                        <div class="collapse" id="collapse2">
                            <div class="ml-5">
                                <a href="<?php echo $helpers->url('prestamo', 'form'); ?>" class="d-block text-light mb-1">Préstamo de libros</a>
                                <a href="index.php?controller=pendiente" class="d-block text-light mb-1">Devolución de libros</a>
                                <a href="<?php echo $helpers->url('events', 'form'); ?>" class="d-block text-light mb-1">Organización de Eventos</a>
                                <a href="index.php?controller=client&action=events" class="d-block text-light mb-4">Participar en eventos</a>
                            </div>
                        </div>
                  

                        <a class="d-block p-3 text-light nav-link" data-toggle="collapse" href="#collapse3" aria-expanded="false" aria-controls="collapse">
                            <h6> Consultas y reportes <i class="fas fa-angle-right gray mt-1"></i></h6>
                        </a>
                        
                        <div class="collapse" id="collapse3">
                            <div class="ml-5">
                                <a href="index.php?controller=solicitante" class="d-block text-light mb-1">Solicitantes</a>
                                <a href="index.php?controller=libro" class="d-block text-light mb-1">Libros</a>
                                <a href="index.php?controller=prestamo" class="d-block text-light mb-1">Préstamos</a>
                                <a href="index.php?controller=events" class="d-block text-light mb-1">Eventos</a>
                                <a href="index.php?controller=news" class="d-block text-light mb-1">Noticias</a>
                                <a href="index.php?controller=blog" class="d-block text-light mb-4">Blog</a>
                            </div>
                        </div>

                        <a class="d-block p-3 text-light nav-link" data-toggle="collapse" href="#collapse4" aria-expanded="false" aria-controls="collapse">
                            <h6> Configuración <i class="fas fa-angle-right gray mt-1"></i></h6>
                        </a>
                        
                        <div class="collapse" id="collapse4">
                            <div class="ml-5">
                            <a href="index.php?controller=categoria" class="d-block text-light mb-1">Categorías libros</a>
                                <a href="index.php?controller=asunto" class="d-block text-light mb-1">Asuntos eventos</a>
                                <a href="index.php?controller=organizer" class="d-block text-light mb-1">Organizadores</a>
                                <a href="index.php?controller=usuario" class="d-block text-light mb-1">Usuarios</a>
                                <a href="index.php?controller=usuario&action=perfil&id=<?php echo $id ?>" class="d-block text-light mb-1">Perfil</a>
                                <a href="index.php?controller=auditoria" class="d-block text-light mb-4">Auditoría</a>
                            </div>
                        </div>

                        <a href="assets/doc/Manual-administrador.pdf" class="d-block p-3 text-light nav-link"><h6>Ayuda</h6></a>
                        <a href="<?php echo $helpers->url('session', 'cerrar') ?>" class="d-block p-3 text-light nav-link"><h6> Cerrar sesión</h6></a>

                    </div>
                </div>
            </div>
        </div>
    
        <nav class="navbar navbar-light bg-white shadow-sm">
            <span class="navbar-brand mb-0 h1">"Agustín Codazzi"</span>
            <div class="header-date pull-left mt-1">
                <h5><?php date_default_timezone_set('America/Caracas'); echo date("d/m/Y  g:i a");?></h5>
            </div>
        </nav>
    
    </header>
    <body class="bg-light">

<?php elseif ($nivel == 1 || $nivel == 2): ?>
        
    <header>
        <div class="bb d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="navbar-nav sidebar-container fixed-top bg-dark">
                <div class="sidebar">
                    <a class="logo text-light" href="index.php?controller=inicio">
                        <h4><i class="fas fa-book"></i> Biblioteca </h4>
                    </a>

                    <hr class="sidebar-divider my-0">

                    <div class="menu">

                        <!-- <a class="d-block p-3 text-light nav-link" data-toggle="collapse" href="#collapse" aria-expanded="false" aria-controls="collapse">
                            <h6><i class="fas fa-book-open"></i> Préstamo circulante <i class="fas fa-angle-right gray mt-1"></i></h6>
                        </a>

                        <div class="collapse" id="collapse">
                            <div class="ml-5">
                                <a href="index.php?controller=prestamo" class="d-block text-light mb-1">Préstamos</a>
                                <a href="index.php?controller=pendiente" class="d-block text-light mb-4">Devolución</a>
                            </div>
                        </div>

                        <a href="index.php?controller=solicitante" class="d-block p-3 text-light nav-link">
                            <h6> <i class="fas fa-book-reader"></i> Solicitantes </h6>
                        </a>-->

                        <a href="index.php?controller=libro" class="d-block p-3 text-light nav-link">
                            <h6> <i class="fas fa-book-open"></i> Libros </h6>
                        </a>
                        <a href="index.php?controller=client&action=events" class="d-block p-3 text-light nav-link">
                            <h6> <i class="fa-regular fa-calendar"></i> Eventos </h6>
                        </a>
                        <a href="index.php?controller=news" class="d-block p-3 text-light nav-link">
                            <h6><i class="fa-solid fa-newspaper"></i> Noticias </h6>
                        </a>
                        <a href="index.php?controller=blog" class="d-block p-3 text-light nav-link">
                            <h6><i class="fa-solid fa-pencil"></i></i> Blog </h6>
                        </a>
                        <a href="index.php?controller=usuario&action=perfil&id=<?php echo $id ?>" class="d-block p-3 text-light nav-link">
                            <h6><i class="fas fa-user"></i> Perfil </h6>
                        </a>
                       <a href="assets/doc/Manual-lector.pdf" class="d-block p-3 text-light nav-link">
                            <h6><i class="fas fa-question-circle"></i> Ayuda </h6>
                        </a>


                        <a href="<?php echo $helpers->url('session', 'cerrar') ?>" class="d-block p-3 text-light nav-link">
                            <h6><i class="fas fa-sign-out-alt"></i> Cerrar sesión</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-light bg-white shadow-sm">
            
            <div class="nav-item dropdown ml-auto">
                <a class="nav-link dropdown-toggle text-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- <span class="badge badge-danger badge-counter p-1">2+</span> -->
                    <i class="fas fa-bell fa-fw"></i> 
                </a>
                <div class="dropdown-menu" id="notificacions" aria-labelledby="navbarDropdown" style="min-width: 220px;">
                    <h6 class="dropdown-header">Notificaciones</h6>
                    <!-- <div class="item">
                        <div class="dropdown-divider"></div>
                        <a class="text-dark" href="#">
                            <div class="small pl-4">13/05/2022</div>
                            <p class="font-weight-bold px-4">El evento Expo Universitaria de Estudiantes de Artes Plásticas es mañana.</p>
                        </a>
                    </div>
                    <div class="item">
                        <div class="dropdown-divider"></div>
                        <a class="text-dark" href="#">
                            <div class="small pl-4">06/05/2022</div>
                            <p class="font-weight-bold px-4">Aun puedes participar en el evento Clases de dramaturgia.</p>
                        </a>
                    </div> -->
                </div>
            </div>

            <div class="header-date mt-1">               
                <h5><?php date_default_timezone_set('America/Caracas');
                echo date("d/m/Y  g:i a"); ?></h5>
            </div>
        </nav>

    </header>
    <body class="bg-light">

<?php endif ?>
  