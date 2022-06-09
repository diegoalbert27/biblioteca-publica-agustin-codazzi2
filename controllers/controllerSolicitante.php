<?php

    class controllerSolicitante extends controllerBase {
        private static $tabla;

        public function __construct () {
            parent::__construct();
            self::$tabla = 'solicitantes';
        }

        public function index () {
            $solicitante = new solicitanteModel;
            $allSolicitantes = $solicitante->get();
            $this->view('solicitantesView/solicitantes', array(
                '$allSolicitantes' => $allSolicitantes,
                'title' => 'Solicitantes'
            ));
        }

        public function viewbyid () {
            if (isset($_GET['id'])) {
                $solicitante = new solicitanteModel;
                $allsolicitante = $solicitante->getById();
                $this->view('solicitantesView/solicitantes', array(
                    '$allsolicitante' => $allsolicitante,
                    'title' => 'Informacion'
                ));
            }
        }

        public function form () {
            $ocupacion = new depFunc('ocupacion');
            $allOcupacion = $ocupacion->get();

            $this->view('solicitantesView/solicitantes', array(
                '$allOcupacion' => $allOcupacion,
                'title' => 'Registrar'
            ));
        }

        public function formupdate () {
            $ocupacion = new depFunc('ocupacion');
            $solicitante = new solicitanteModel;
            
            $allsolicitante = $solicitante->getById();
            $allOcupacion = $ocupacion->get();

            $this->view('solicitantesView/solicitantes', array(
                '$allOcupacion' => $allOcupacion,
                '$allsolicitante' => $allsolicitante,
                'title' => 'Cambiar Datos'
            ));
        }

        public function historial () {
            if (isset($_GET['id'])) {
                $historial = new solicitanteModel;
                $solicitante = new solicitanteModel;

                $allsolicitante = $solicitante->getById();
                $allhistorial = $historial->historial();
                $this->view('solicitantesView/solicitantes', array(
                    '$allhistorial' => $allhistorial,
                    '$allsolicitante' => $allsolicitante,
                    'title' => 'Historial de préstamos'
                ));
            }
        }

        public function pdf () {
            if (isset($_GET['id'])) {
                $pdf = new solicitanteModel;
                $solicitante = new solicitanteModel;
                $usuario = new usuarioModel;
            
                $allsolicitante = $solicitante->getById();
                $allpdf = $pdf->historial();
                $allusuario = $usuario->historial();

                $this->view('solicitantesView/solicitantes', array(
                    '$allpdf' => $allpdf,
                    '$allsolicitante' => $allsolicitante,
                    '$allusuario' => $allusuario,
                    'title' => 'PDF Solicitante'
                ));
            }
        }

        public function carnet () {
            if (isset($_GET['id'])) {
                $solicitante = new solicitanteModel;
                $usuario = new usuarioModel;
                $allsolicitante = $solicitante->getById();
                $allusuario = $usuario->historial();
                $this->view('solicitantesView/solicitantes', array(
                    '$allsolicitante' => $allsolicitante,
                    '$allusuario' => $allusuario,
                    'title' => 'Carnet Solicitante'
                ));
            }
        }

        public function get () {
            $solicitante = new solicitanteModel;
            $allSolicitantes = $solicitante->get();

            $json = $this->JSONResponse('Success', $allSolicitantes);

            $jsonstring = json_encode($json);

            echo $jsonstring;
        }

        public function getByEnabled () {
            $solicitante = new solicitanteModel;
            $allSolicitantes = $solicitante->get();

            $allSolicitantes = $this->filterValue($allSolicitantes, 'estado_s', '1');

            $json = $this->JSONResponse('Success', $allSolicitantes);

            $jsonstring = json_encode($json);

            echo $jsonstring;

            return true;
        }

        public function crear () {
            if (isset($_POST['nombre'])) {
                $solicitante = new solicitanteModel;
                $allSolicitantes = $solicitante->get();

                if (!$this->issetValue($allSolicitantes, 'cedSol', $_POST['cedula'])) {
                    $idSol = $solicitante->post();

                    //Datos e inserción de auditoria
                    $auditoria = new auditoriaModel;
                    $accion = 'Creación de Nuevo Solicitante';
                    $user = $_SESSION['user_id'];
                    $datatime = date('Y-m-d H:i:s');
                    $auditoria->postIndie(self::$tabla, $accion, $idSol, $user, $datatime);

                    $json = $this->JSONResponse('Success', $idSol);

                    echo json_encode($json);

                    return true;
                }

                $json = $this->JSONResponse('Error', 'El número de cedula se encuentra registrado');

                echo json_encode($json);
            }
            // $this->redirect('solicitante', '3');
        }

        public function actualizar () {
            if (isset($_POST['id'])) {
                $solicitante = new solicitanteModel;
                $solicitante->update();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Actualización de Solicitante';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idSol = $_POST['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idSol, $user, $datatime);

                $json = $this->JSONResponse('Success', $idSol);

                echo json_encode($json);

                return true;
            }
            // $this->redirect('solicitante', '4');
        }

        public function delete () {
            if (isset($_GET['id'])) {
                $solicitante = new solicitanteModel;
                $solicitante->delete();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Eliminación Solicitante';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idSol = $_GET['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idSol, $user, $datatime);
            }
            $this->redirect('solicitante', '5');
        }

        public function inhabilitar () {
            if (isset($_GET['id'])) {
                $solicitante = new solicitanteModel;
                $solicitante->inhabilitar();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Inhabilitación Solicitante';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idSol = $_GET['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idSol, $user, $datatime);
            }
            $this->redirect('solicitante', '4');
        }
    }