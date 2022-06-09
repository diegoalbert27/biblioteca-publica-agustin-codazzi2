<?php

    class controllerPrestamo extends controllerBase {
        private static $tabla;

        public function __construct () {
            parent::__construct();
            self::$tabla = 'prestamo';
        }

        public function index () {
            $prestamo = new prestamoModel;
            $allPrestamos = $prestamo->get();
            $this->view('prestamoView/prestamo', array(
                '$allPrestamos' => $allPrestamos,
                'title' => 'Préstamo circulante'
            ));
        }

        public function viewbyid () {
            if (isset($_GET['id'])) {
                $prestamo = new prestamoModel;
                $allprestamo = $prestamo->getById();
                $this->view('prestamoView/prestamo', array(
                    '$allprestamo' => $allprestamo,
                    'title' => 'Informacion'
                ));
            }
        }

        public function form () {
            $solicitantes = new depFunc('solicitantes');
            $libros = new depFunc('libros');

            $allLibros = $libros->get();
            $allSolicitantes = $solicitantes->get();

            $allActivos = array();

            foreach ($allSolicitantes as $solicitantes) {
                if ($solicitantes['estado_s'] == 1) {
                    array_push($allActivos, $solicitantes);
                }
            }

            $allDisponibles = array();

            foreach ($allLibros as $libros) {
                if ($libros['estado_libro'] == "Lectura y prestamo") {
                    array_push($allDisponibles, $libros);
                }
            }

            $this->view('prestamoView/prestamo', array(
                '$allSolicitantes' => $allActivos,
                '$allLibros' => $allDisponibles,
                'title' => 'Registrar'
            ));
        }

        public function formupdate () {
            $solicitantes = new depFunc('solicitantes');
            $libros = new depFunc('libros');
            $prestamo = new prestamoModel;
            
            $allprestamo = $prestamo->getById();
            $allLibros = $libros->get();
            $allSolicitantes = $solicitantes->get();

            $this->view('prestamoView/prestamo', array(
                '$allSolicitantes' => $allSolicitantes, 
                '$allLibros' => $allLibros,
                '$allprestamo' => $allprestamo,
                'title' => 'Cambiar Datos'
            ));
        }

        public function crear () {
            $prestamo = new prestamoModel;
            $libro = new libroModel;
            $solicitante = new solicitanteModel;
            $inventario = new inventarioModel;
            $allLibro = $libro->get();
            $allPrestamos = $prestamo->get();
            $allSolicitantes = $solicitante->get();

            $solValue = $this->issetValue($allSolicitantes, 'idSol', $_POST['sol']);
            $bookValue = $this->issetValue($allLibro, 'id', $_POST['libro']);

            if (!$solValue || !$bookValue) {
                $json = $this->JSONResponse('Error', 'Los datos ingresados no son correctos');
                echo json_encode($json);
                return false;
            }

            $allSolicitantes = $this->searchValue($allSolicitantes, 'idSol', $_POST['sol']);
            $allLibro = $this->searchValue($allLibro, 'id', $_POST['libro']);
            $allPrestamos = $this->filterValue($allPrestamos, 'idSol', $allSolicitantes['idSol']);
            $allPrestamos = $this->filterValue($allPrestamos, 'estado', '1');

            if (!empty($allPrestamos)) {
                if (count($allPrestamos) >= 3) {
                    $json = $this->JSONResponse('Error', 'Error en el Solicitante, puede ser que este tenga más prestamos pendientes');
                    echo json_encode($json);
                    return false;
                }
            }

            if ($allLibro['stock'] > $allLibro['min']) {
                if (isset($_POST['sol'])) {
                    $stockLibro = new libroModel;
                    $allLibro = $stockLibro->getCantidadStockById($_POST['libro']);
                    
                    $id = $allLibro[0]['cantidad'];
                    $stock = $allLibro[0]['stock'] - 1;
                    $resto = $allLibro[0]['total'] - $stock;
                    
                    $idPres = $prestamo->post();
                    $inventario->updateStock($stock, $resto, $id);

                    //Datos e inserción de auditoria
                    $auditoria = new auditoriaModel;
                    $accion = 'Creación de Nuevo Prestamo';
                    $user = $_SESSION['user_id'];
                    $datatime = date('Y-m-d H:i:s');
                    $auditoria->postIndie(self::$tabla, $accion, $idPres, $user, $datatime);

                    $json = $this->JSONResponse('Success', $idPres);
                    
                    echo json_encode($json);

                    return true;
                }
            }

            $json = $this->JSONResponse('Error', 'La cantidad del libro indicado a llegado a su limite');
            
            echo json_encode($json);

            return false;
        }

        public function get () {
            $prestamo = new prestamoModel;
            $allprestamo = $prestamo->get();

            $json = $this->JSONResponse('Success', $allprestamo);

            echo json_encode($json);
        }

        public function actualizar () {
            if (isset($_POST['id'])) {
                $prestamo = new prestamoModel;
                $libro = new libroModel;
                $inventario = new inventarioModel;
                $allLibro = $libro->getCantidadStockById($_POST['libro']);
                $id = $allLibro[0]['cantidad'];
                $stock = $allLibro[0]['stock'] - 1;
                $resto = $allLibro[0]['total'] - $stock;
                $prestamo->update();
                $inventario->updateStock($stock, $resto, $id);

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Actualización de Prestamo';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idPres = $_POST['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idPres, $user, $datatime);
            }

            if (isset($_POST['libro2'])) {
                $libro = new libroModel;
                $inventario = new inventarioModel;
                $allLibro = $libro->getCantidadStockById($_POST['libro2']);
                $id = $allLibro[0]['cantidad'];
                $stock = $allLibro[0]['stock'] + 1;
                $resto = $allLibro[0]['total'] - $stock;
                $inventario->updateStock($stock, $resto, $id);
            }

            $this->redirect('prestamo', '4');
        }

        public function delete () {
            if (isset($_GET['id'])) {
                $prestamo = new prestamoModel;
                $libro = new libroModel;
                $inventario = new inventarioModel;
                $allLibro = $libro->getCantidadStockById($_GET['cota']);
                $id = $allLibro[0]['cantidad'];
                $stock = $allLibro[0]['stock'] + 1;
                $resto = $allLibro[0]['total'] - $stock;
                $prestamo->delete();
                $inventario->updateStock($stock, $resto, $id);

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Eliminación de Prestamo';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idPrest = $_GET['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idPrest, $user, $datatime);
            }
            $this->redirect('prestamo', '5');
        }
    }