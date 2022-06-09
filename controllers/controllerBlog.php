<?php

    class controllerBlog extends controllerBase {
        private static $tabla;

        public function __construct () {
            parent::__construct();
            self::$tabla = 'blog';
        }

        public function index () {
            $blog = new blogModel;
            $allBlog = $blog->get();
            $this->view('blogView/blog', array(
                '$allBlog' => $allBlog, 
                'title' => 'Blog'
            ));
        }

        public function viewbyid () {
            if (isset($_GET['id'])) {
                $blog = new blogModel;
                $allblog = $blog->getById();
                $this->view('blogView/blog', array(
                    '$allblog' => $allblog,
                    'title' => 'Informacion'
                ));
            }
        }

        public function form () {
            $blog = new depFunc('blog');
            $allBlog = $blog->get();
            
            $this->view('blogView/blog', array(
                '$allBlog' => $allBlog,
                'title' => 'Registrar'
            ));
        }

        public function formupdate () {
            $blog = new blogModel;
            $allBlog = $blog->getById();

            $this->view('blogView/blog', array(
                '$allBlog' => $allBlog,
                'title' => 'Cambiar Datos'
            ));
        }

        public function crear () {
            if (isset($_POST['id'])) {
                $blog = new blogModel;
                $idBlog = $blog->post();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Creación de Nuevo articulo del blog';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $auditoria->postIndie(self::$tabla, $accion, $idBlog, $user, $datatime);
            }
            $this->redirect('blog', '3');
        }

        public function actualizar () {
            if (isset($_POST['id'])) {
                $blog = new blogModel;
                $blog->update();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Actualización de articulo del blog';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idBlog = $_POST['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idBlog, $user, $datatime);
            }
            $this->redirect('blog', '4');
        }

        public function delete () {
            if (isset($_GET['id'])) {
                $blog = new blogModel;
                $blog->delete();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Eliminación de articulo del blog';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idBlog = $_GET['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idBlog, $user, $datatime);
            }
            $this->redirect('blog', '5');
        }

        public function blogpdf () {
            if (isset($_GET['id'])) {
                $blog = new blogModel;
                $allblog = $blog->getById();
                $this->view('blogView/blog', array(
                    '$allblog' => $allblog,
                    'title' => 'Articulo'
                ));
            }
        }
    }