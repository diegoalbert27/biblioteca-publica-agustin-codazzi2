<?php

    require_once 'core/db_abstract.php';

    class categoriaModel extends dbAbstractModel {

        public function get () {

            $this->query = 'SELECT * FROM `categoria`';

            $this->get_result_from_query();
            return $this->rows;
        }

        public function getById () {

            $this->query = "SELECT * FROM `categoria` WHERE id_c='" . $_GET['id']."'";

            $this->get_result_from_query();
            return $this->rows;
        }

        public function post () {

            if ($_POST) {
                
                 if (!empty($_POST['nombre_c']) && !empty($_POST['piso'])) {
                     
                    $this->query = 'INSERT INTO `categoria` (nombre_c, piso) VALUES (?,?)';
                
                    $this->rows = array($_POST['nombre_c'], $_POST['piso']);
                    
                     return $this->execute_single_query('si', $this->rows);
                  
                }
            }

        }

        public function update () {

            if ($_POST) {

                if (!empty($_POST['nombre_c']) && !empty($_POST['piso']) && $_POST['id']) {

                    $this->query = 'UPDATE `categoria` SET nombre_c=?, piso=? WHERE id_c=?';
                
                    $this->rows = array($_POST['nombre_c'], $_POST['piso'], $_POST['id']);

                     $this->execute_single_query('sii', $this->rows);
                       
                }
            }
        }

        public function delete () {

            if ($_GET) {

                $this->query = "DELETE FROM categoria WHERE id_c='" . $_GET['id']."'";
                $this->rows = array($_GET['id']);
                $this->execute_single_query('i', $this->rows);
            }
        }
        public function historial() {}
        public function inhabilitar() {}
    }