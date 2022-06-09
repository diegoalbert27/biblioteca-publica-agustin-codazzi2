<?php

    class controllerUsuario extends controllerBase {
        private static $tabla;

        public function __construct () {
            parent::__construct();
            self::$tabla = 'usuario';
        }

        public function index () {
            $usuario = new usuarioModel;
            $allUsuarios = $usuario->get();
            $this->view('usuarioView/usuario', array(
                '$allUsuarios' => $allUsuarios,
                'title' => 'Usuario'
            ));
        }

        public function viewbyid () {
            if (isset($_GET['id'])) {
                $usuario = new usuarioModel;
                $allusuario = $usuario->getById();
                $this->view('usuarioView/usuario', array(
                    '$allusuario' => $allusuario,
                    'title' => 'Informacion'
                ));
            }
        }

        public function form () {
            $usuario = new depFunc('usuario');
            $allUsuario = $usuario->get();
            
            $this->view('usuarioView/usuario', array(
                '$allUsuario' => $allUsuario,
                'title' => 'Registrar'
            ));
        }

        public function formupdate () {
            $usuario = new usuarioModel;
            $allUsuario = $usuario->getById();

            $this->view('usuarioView/usuario', array(
                '$allUsuario' => $allUsuario,
                'title' => 'Cambiar Datos'
            ));
        }

        public function perfil () {
             $usuario = new usuarioModel;
             $allusuario = $usuario->historial();
             $organizer = new Organizer;
             $organizador = $organizer->getByUser($_SESSION['user_id']);
             $this->view('usuarioView/usuario', array(
                 '$allusuario' => $allusuario,
                 'organizador' => $organizador,
                 'title' => 'Perfil'
             ));
         
         }

        public function crear () {
            if (isset($_POST['id'])) {
                $usuario = new usuarioModel;
                $idUser = $usuario->post();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Creación de Nuevo Usuario';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $auditoria->postIndie(self::$tabla, $accion, $idUser, $user, $datatime);
            }
            $this->redirect('question&action=form', $idUser);
        }

        public function actualizar () {
            if (isset($_POST['id'])) {
                $usuario = new usuarioModel;
                $usuario->update();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Actualización de Usuario';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idUser = $_POST['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idUser, $user, $datatime);
            }
            $this->redirect('usuario', '4');
        }

        public function delete () {
            if (isset($_GET['id'])) {
                $usuario = new usuarioModel;
                $usuario->delete();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Eliminación de Usuario';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idUser = $_GET['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idUser, $user, $datatime);
            }
            $this->redirect('usuario', '5');
        }

        public function habilitar () {
            if (isset($_GET['id'])) {
                $usuario = new usuarioModel;
                $usuario->habilitar();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Activación de usuario';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idSol = $_GET['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idSol, $user, $datatime);
            }
            $this->redirect('usuario', '4');
        }
    }

