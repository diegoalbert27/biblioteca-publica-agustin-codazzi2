<?php

    class controllerBase {
        
        public function redirect ($controlador, $codigoResp = '') {
            header("Location: index.php?controller=$controlador&r=$codigoResp");
        }

        public function issetValue ($array, $targetValue, $value) {
            foreach ($array as $element) {
                if ($element[$targetValue] === $value) return true;
            }
        }

        public function searchValue ($array, $targetValue, $value) {
            foreach ($array as $element) {
                if ($element[$targetValue] === $value) return $element;
            }
        }

        public function filterValue ($array, $targetValue, $value) {
            $filter = array();
            foreach ($array as $element) {
                if ($element[$targetValue] === $value) {
                    array_push($filter, $element);
                }
            }
            return $filter;
        }

        public function JSONResponse ($type, $message) {
            return array(
                'type' => $type,
                'message' => $message
            );
        }
        
        public function __construct () {
            foreach (glob("models/*.php") as $file) {
                require_once $file;
            }
        }

        public function view ($view, $datos, $array=array()) {
            foreach ($datos as $id_assoc => $values) {
                $array[$id_assoc] = $values;
            }
            $response = $array;

            require_once CORE_PATH . '/helper_vista.php';

            $helpers = new helperVista;

            require_once VIEW_PATH . '/' . $view . '_view.php';
        }
    }