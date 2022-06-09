<?php

    class controllerInventario extends controllerBase {
        private static $tabla;

        public function __construct () {
            parent::__construct();
            self::$tabla = 'inventario';
        }

        public function index () {
            $libro = new libroModel;
            $allLibros = $libro->get();

            $allInventario = array();

            foreach ($allLibros as $libros) {
                if ($libros['cantidad'] <= 0) {
                    array_push($allInventario, $libros);
                }
            }

            $this->view('inventarioView/inventario', array(
                'title' => 'Registro de Inventario',
                '$allLibros' => $allInventario
            ));
        }

        public function table () {
            $libro = new libroModel;
            $allLibros = $libro->getCantidadStock();

            $this->view('inventarioView/inventario', array(
                'title' => 'Inventario',
                '$allLibros' => $allLibros
            ));
        }

        public function form () {
            if (isset($_GET['id'])) {
                $libro = new libroModel;
                $allLibro = $libro->getById();
                $this->view('inventarioView/inventario', array(
                    '$allLibro' => $allLibro,
                    'title' => 'Inventario'
                ));
            }
        }

        public function formupdate () {
            if (isset($_GET['id'])) {
                $libro = new libroModel;
                $allLibro = $libro->getCantidadStockById($_GET['id']);
                $this->view('inventarioView/inventario', array(
                    '$allLibro' => $allLibro,
                    'title' => 'Inventario'
                ));
            }
        }

        public function crear () {
            if (isset($_POST['cota'])) {
                $inventario = new inventarioModel;
                $result_id = $inventario->post();
                $libro = new libroModel;
                $cota = $_POST['cota'];
                $libro->updateInventario($cota, $result_id);

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Creación de Inventario';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $auditoria->postIndie(self::$tabla, $accion, $result_id, $user, $datatime);
            }
            $this->redirect('inventario', '3&action=table');
        }

        public function actualizar () {
            if (isset($_POST['id'])) {
                $inventario = new inventarioModel;
                $inventario->update();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Actualización de Inventario';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $result_id = $_POST['id'];
                $auditoria->postIndie(self::$tabla, $accion, $result_id, $user, $datatime);
            }
            $this->redirect('libro', '4');
        }
    }