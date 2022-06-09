<div class=" bg-dark vh-100">
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
                                        <div class="p-5">
                                            <div class="text-center mb-3">
                                                <!-- <img src='../../assets/biblioteca.jpg' alt="" width="120" height="80">  -->
                                                <h1 class="h3 text-gray-900 mt-2 mb-4">¡Bienvenidos!</h1>
                                            </div>
                                            <form class="user" method="POST" action="<?php echo $helpers->url('client', 'iniciar') ?>">
                                                <div class="form-group">
                                                    <input type="text" name="email" class="form-control form-control-user"
                                                        id="exampleInputEmail" name=" aria-describedby="emailHelp"
                                                        placeholder="Usuario">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control form-control-user"
                                                        id="exampleInputPassword" placeholder="Contraseña">
                                                </div>
                                                <button type="submit"  class="btn btn-primary btn-user btn-block">
                                                    Ingresar
                                                </button>
                                                <hr>
                                            <div class="text-center">
                                                <!-- <a class="small" href="<?php echo $helpers->url('client', 'iniciar') ?>">¿Olvidaste tu contraseña?</a> -->
                                            </div>
                                            <div class="text-center mb-5">
                                                <small>Si aun no tienes una cuenta, aqui podes crear una nueva</small>
                                                <a class="small" href="<?php echo $helpers->url('client', 'signup') ?>">¡Crea una cuenta!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                    </div>
        
                </div>
        
            </div>
</div>