<?php

    class controllerPendiente extends controllerBase {
        private static $tabla;

        public function __construct () {
            parent::__construct();
            self::$tabla = 'prestamo';
        }

        public function index () {
            $pendiente = new pendienteModel;
            $allpendientes = $pendiente->get();
            $this->view('pendientesView/pendientes', array(
                '$allpendientes' => $allpendientes,
                'title' => 'Préstamos pendientes'
            ));
        }

        public function update () {
            if (isset($_GET['id'])) {
                $pendiente = new pendienteModel;
                $pendiente->update();
                
                $libro = new libroModel;
                $inventario = new inventarioModel;
                $allLibro = $libro->getCantidadStockById($_GET['libro']);
                $id = $allLibro[0]['cantidad'];
                $stock = $allLibro[0]['stock'] + 1;
                $resto = $allLibro[0]['total'] - $stock;
                $inventario->updateStock($stock, $resto, $id);

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Creación de Nuevo Categoria';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idPres = $_GET['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idPres, $user, $datatime);
            }
            $this->redirect('pendiente', '5');
        }
    }