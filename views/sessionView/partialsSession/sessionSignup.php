<body class="bg-dark">
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">
    
                <div class="col-xl-10 col-lg-12 col-md-9">
    
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-4">
                                        <div class="text-center mb-3">
                                            <img src='assets/img/biblioteca.jpg' alt="" width="120" height="80"> 
                                            <h1 class="h3 text-gray-900 mt-2 mb-4">¡Crear cuenta!</h1>
                                        </div>
                                        <form class="user" action="<?php echo $helpers->url('session', 'crear'); ?>" method="post">
                                        <input type="hidden" name="nivel_user" value="1">
                                        <input type="hidden" name="enabled" value="1">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                    placeholder="Nombre completo">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                    placeholder="Usuario">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="Contraseña">
                                            </div>
                                            <div class="form-group">
                        <input class="btn btn-block color-primario text-white" type="submit" value="Registrarme">
                    </div>
                                            <hr>
                                        <div class="text-center">
                                            <a class="small" href="<?php echo $helpers->url('session', 'cuenta'); ?>">¿Olvidaste tu contraseña?</a>
                                        </div>
                                        <div class="text-center mb-4">
                                            <a class="small" href="<?php echo $helpers->url('session', 'index'); ?>">¿Ya tienes una cuenta? ¡Inicia sesión!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
    
        </div>