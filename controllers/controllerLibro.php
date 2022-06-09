<?php

    class controllerLibro extends controllerBase {
        private static $tabla;
        
        public function __construct () {
            parent::__construct();
            self::$tabla = 'libros';
        }

        public function index () {
            $libro = new libroModel;
            $allLibros = $libro->get();
            $this->view('librosView/libro', array(
                '$allLibros' => $allLibros,
                'title' => 'Libros'
            ));
        }

        public function viewbyid () {
            if (isset($_GET['id'])) {
                $libro = new libroModel;
                $alllibro = $libro->getById();
                $this->view('librosView/libro', array(
                    '$allLibro' => $alllibro,
                    'title' => 'Informacion'
                ));
            }
        }

        public function form () {
            $categoria = new depFunc('categoria');
            $allCategoria = $categoria->get();
            
            $this->view('librosView/libro', array(
                '$allCategoria' => $allCategoria,
                'title' => 'Registrar'
            ));
        }


        public function formupdate () {
            $categoria = new depFunc('categoria');
            $libro = new libroModel;
            
            $alllibro = $libro->getById();
            $allCategoria = $categoria->get();

            $this->view('librosView/libro', array(
                '$allCategoria' => $allCategoria,
                '$alllibro' => $alllibro,
                'title' => 'Cambiar Datos'
            ));
        }

        public function get () {
            $libro = new libroModel;
            $allLibro = $libro->get();

            $json = $this->JSONResponse('Success', $allLibro);

            $jsonstring = json_encode($json);

            echo $jsonstring;
        }

        public function getByEnabled () {
            $libro = new libroModel;
            $allLibros = $libro->get();

            $allLibros = $this->filterValue($allLibros, 'estado', 'Lectura y prestamo');

            $json = $this->JSONResponse('Success', $allLibros);

            $jsonstring = json_encode($json);

            echo $jsonstring;

            return true;
        }

        public function crear () {
            if (isset($_POST['cota'])) {
                $libro = new libroModel;
                $allLibro = $libro->get();
                if (!$this->issetValue($allLibro, 'cota', $_POST['cota'])) {
                    $idLibro = $libro->post();
                    $inventario = new inventarioModel;
                    $idInventario = $inventario->post();
                    $libro->updateInventario($idLibro, $idInventario);

                    //Datos e inserción de auditoria
                    $auditoria = new auditoriaModel;
                    $accion = 'Creación de Nuevo Libro';
                    $user = $_SESSION['user_id'];
                    $datatime = date('Y-m-d H:i:s');
                    $auditoria->postIndie(self::$tabla, $accion, $idLibro, $user, $datatime);

                    $json = $this->JSONResponse('Success', $idLibro);

                    echo json_encode($json);

                    return true;
                }
                $json = $this->JSONResponse('Error', 'El número de cota se encuentra registrado');

                echo json_encode($json);
            }
            // $this->redirect('libro', '3');
        }

        public function actualizar () {
            if (isset($_POST['id'])) {
                $libro = new libroModel;
                $libro->update();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Actualización de Libro';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idLibro = $_POST['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idLibro, $user, $datatime);

                $json = $this->JSONResponse('Success', $idLibro);

                echo json_encode($json);

                return true;
            }
            // $this->redirect('libro', '4');
        }

        public function delete () {
            if (isset($_GET['id'])) {
                $libro = new libroModel;
                $libro->delete();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Eliminación de Libro';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idLibro = $_GET['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idLibro, $user, $datatime);
            }
            $this->redirect('libro', '5');
        }

        public function libropdf () {
            if (isset($_GET['id'])) {
                $libro = new libroModel;
                $prestamos = new libroModel;
                $alllibro = $libro->getById();
                $allprestamos = $prestamos->prestamos();
                $this->view('librosView/libro', array(
                    '$allLibro' => $alllibro,
                    '$allPrestamos' => $allprestamos,
                    'title' => 'Informacion'
                ));
            }
        }
    }