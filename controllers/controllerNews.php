<?php

    class controllerNews extends controllerBase {
        private static $tabla;

        public function __construct () {
            parent::__construct();
            self::$tabla = 'news';
        }

        public function index () {
            $news = new newsModel;
            $allNews = $news->get();
            $this->view('newsView/news', array(
                '$allNews' => $allNews,
                'title' => 'Noticias'
            ));
        }

        public function viewbyid () {
            if (isset($_GET['id'])) {
                $news = new newsModel;
                $allnews = $news->getById();
                $this->view('newsView/news', array(
                    '$allnews' => $allnews,
                    'title' => 'Informacion'
                ));
            }
        }

        public function form () {
            $news = new depFunc('news');
            $allNews = $news->get();
            
            $this->view('newsView/news', array(
                '$allNews' => $allNews,
                'title' => 'Registrar'
            ));
        }

        public function formupdate () {
            $news = new newsModel;
            $allNews = $news->getById();

            $this->view('newsView/news', array(
                '$allNews' => $allNews,
                'title' => 'Cambiar Datos'
            ));
        }

        public function crear () {
            if (isset($_POST['id'])) {
                $news = new newsModel;
                $idNew = $news->post();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Creación de Nueva Noticia';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $auditoria->postIndie(self::$tabla, $accion, $idNew, $user, $datatime);
            }
            $this->redirect('news', '3');
        }

        public function actualizar () {
            if (isset($_POST['id'])) {
                $news = new newsModel;
                $news->update();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Actualización de noticia';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idNew = $_POST['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idNew, $user, $datatime);
            }
            $this->redirect('news', '4');
        }

        public function delete () {
            if (isset($_GET['id'])) {
                $news = new newsModel;
                $news->delete();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Eliminación de noticia';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idNew = $_GET['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idNew, $user, $datatime);
            }
            $this->redirect('news', '5');
        }

        public function newpdf () {
            if (isset($_GET['id'])) {
                $news = new newsModel;
                $allnews = $news->getById();
                $this->view('newsView/news', array(
                    '$allnews' => $allnews,
                    'title' => 'Noticia'
                ));
            }
        }
    }