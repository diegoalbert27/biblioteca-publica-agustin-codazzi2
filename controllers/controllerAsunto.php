<?php

    class controllerAsunto extends controllerBase {
        private static $tabla;

        public function __construct () {
            parent::__construct();
            self::$tabla = 'asunto_event';
        }

        public function index () {
            $asunto = new asuntoModel;
            $allAsunto = $asunto->get();
            $this->view('asuntoView/asunto', array(
                '$allAsunto' => $allAsunto,
                'title' => 'Asuntos eventos'
            ));
        }

        public function viewbyid () {
            if (isset($_GET['id'])) {
                $asunto = new asuntoModel;
                $allasunto = $asunto->getById();
                $this->view('asuntoView/asunto', array(
                    '$allasunto' => $allasunto,
                    'title' => 'Informacion'
                ));
            }
        }

        public function form () {
            $asunto = new depFunc('asunto');
            $allAsunto = $asunto->get();
            
            $this->view('asuntoView/asunto', array(
                '$allAsunto' => $allAsunto,
                'title' => 'Registrar'
            ));
        }

        public function formupdate () {
            $asunto = new asuntoModel;
            $allAsunto= $asunto->getById();

            $this->view('asuntoView/asunto', array(
                '$allAsunto' => $allAsunto,
                'title' => 'Cambiar Datos'
            ));
        }

        public function crear () {
            if (isset($_POST['id'])) {
                $asunto = new asuntoModel;
                $idAsunto = $asunto->post();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Creación de Nuevo Asunto';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $auditoria->postIndie(self::$tabla, $accion, $idAsunto, $user, $datatime);
            }
            $this->redirect('asunto', '3');
        }

        public function actualizar () {
            if (isset($_POST['id'])) {
                $asunto = new asuntoModel;
                $asunto->update();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Actualización de Asunto';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idAsunto = $_POST['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idAsunto, $user, $datatime);
            }
            $this->redirect('asunto', '4');
        }

        public function delete () {
            if (isset($_GET['id'])) {
                $asunto = new asuntoModel;
                $asunto->delete();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Eliminación de Asunto';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idAsunto = $_GET['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idAsunto, $user, $datatime);
            }
            $this->redirect('asunto', '5');
        }
    }