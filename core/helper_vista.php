<?php

    class helperVista {

        public function url ($controlador, $accion) {

            $urlString = "index.php?controller=$controlador&action=$accion";
            return $urlString;
        }
    }