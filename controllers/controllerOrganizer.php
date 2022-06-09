<?php

    class controllerOrganizer extends controllerBase {
        private static $tabla;

        public function __construct () {
            parent::__construct();
            self::$tabla = 'organizer';
        }

        public function index () {
            $organizer = new Organizer;
            $allOrganizer = $organizer->get();
            $this->view('organizerView/organizer', array(
                '$allOrganizer' => $allOrganizer,
                'title' => 'Organizadores'
            ));
        }

        public function viewbyid () {
            if (isset($_GET['id'])) {
                $categoria = new categoriaModel;
                $allcategoria = $categoria->getById();
                $this->view('categoriaView/categoria', array(
                    '$allcategoria' => $allcategoria,
                    'title' => 'Informacion'
                ));
            }
        }

        public function getById() {
            if (isset($_GET['id'])) {

                $organizer = new Organizer;
                $organizerResponse = $organizer->getById();

                $json = $this->JSONResponse('Success', $organizerResponse);

                $jsonstring = json_encode($json);

                echo $jsonstring;

                return;
            }
            
            $json = $this->JSONResponse('Error', 'Id is missed');

            $jsonstring = json_encode($json);

            echo $jsonstring;
        }

        public function updateState() {
            if (isset($_POST['id']) && isset($_POST['state'])) {
                $state = $_POST['state'];
                $id = $_POST['id'];

                $organizer = new Organizer;
                $organizerResponse = $organizer->updateStateById($id, $state);

                $json = $this->JSONResponse('Success', $organizerResponse);

                $jsonstring = json_encode($json);

                echo $jsonstring;

                return;
            }
            
            $json = $this->JSONResponse('Error', 'Id or state is missed');

            $jsonstring = json_encode($json);

            echo $jsonstring;
        }

        public function form () {
            $categoria = new depFunc('categoria');
            $allCategoria = $categoria->get();
            
            $this->view('categoriaView/categoria', array(
                '$allCategoria' => $allCategoria,
                'title' => 'Registrar'
            ));
        }

        public function formupdate () {
            $categoria = new categoriaModel;
            $allCategoria = $categoria->getById();

            $this->view('categoriaView/categoria', array(
                '$allCategoria' => $allCategoria,
                'title' => 'Cambiar Datos'
            ));
        }

        public function crear () {
            if (isset($_POST['id'])) {
                $categoria = new categoriaModel;
                $idCat = $categoria->post();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Creación de Nuevo Categoria';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $auditoria->postIndie(self::$tabla, $accion, $idCat, $user, $datatime);
            }
            $this->redirect('categoria', '3');
        }

        public function actualizar () {
            if (isset($_POST['id'])) {
                $categoria = new categoriaModel;
                $categoria->update();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Actualización de Categoria';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idCat = $_POST['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idCat, $user, $datatime);
            }
            $this->redirect('categoria', '4');
        }

        public function delete () {
            if (isset($_GET['id'])) {
                $categoria = new categoriaModel;
                $categoria->delete();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Eliminación de Categoria';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idCat = $_GET['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idCat, $user, $datatime);
            }
            $this->redirect('categoria', '5');
        }
    }