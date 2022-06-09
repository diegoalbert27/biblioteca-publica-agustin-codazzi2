<?php

    require_once 'core/db_abstract.php';

    class asuntoModel extends dbAbstractModel {

        public function get () {

            $this->query = 'SELECT * FROM `asunto_event`';

            $this->get_result_from_query();
            return $this->rows;
        }

        public function getById () {

            $this->query = "SELECT * FROM `asunto_event` WHERE id_a='" . $_GET['id']."'";

            $this->get_result_from_query();
            return $this->rows;
        }

        public function post () {

            if ($_POST) {
                
                 if (!empty($_POST['asunto'])) {
                     
                    $this->query = 'INSERT INTO `asunto_event` (asunto) VALUES (?)';
                
                    $this->rows = array($_POST['asunto']);
                    
                     return $this->execute_single_query('s', $this->rows);
                  
                }
            }

        }

        public function update () {

            if ($_POST) {

                if (!empty($_POST['asunto']) && $_POST['id']) {

                    $this->query = 'UPDATE `asunto_event` SET asunto=? WHERE id_a=?';
                
                    $this->rows = array($_POST['asunto'], $_POST['id']);

                     $this->execute_single_query('si', $this->rows);
                       
                }
            }
        }

        public function delete () {

            if ($_GET) {

                $this->query = "DELETE FROM asunto_event WHERE id_a='" . $_GET['id']."'";
                $this->rows = array($_GET['id']);
                $this->execute_single_query('i', $this->rows);
            }
        }
        public function historial() {}
        public function inhabilitar() {}
    }