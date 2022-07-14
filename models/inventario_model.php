<?php

    require_once 'core/db_abstract.php';

    class inventarioModel extends dbAbstractModel {

        public function get () {

            $this->query = 'SELECT l.cota AS cota, l.titulo AS titulo, l.autor AS autor,  c.id_c AS categoria, l.estado_libro AS estado, l.cantidad AS cantidad, c.nombre_c AS nombrec FROM libros l INNER JOIN categoria c ON l.categoria = c.id_c';

            $this->get_result_from_query();
            return $this->rows;
        }

        public function getById () {

        //     $this->query = "SELECT l.cota AS cota, l.titulo AS titulo, l.autor AS autor,  c.id_c AS categoria, l.estado_libro AS estado, c.nombre_c AS nombrec FROM libros l INNER JOIN categoria c ON l.categoria = c.id_c WHERE cota='" . $_GET['id']."'";

        //     $this->get_result_from_query();
        //     return $this->rows;
        // 
        }

        public function post () {

            if ($_POST) {
                
                 if (!empty($_POST['cantidad']) && !empty($_POST['minima'])) {
                    $cantidad = $_POST['cantidad']; 
                    $minima = $_POST['minima'];
                     
                    $this->query = 'INSERT INTO `inventario` (total_inv, min_inv, cant_inv, resto_inv) VALUES (?,?,?,0)';
                
                    $this->rows = array(&$cantidad, &$minima, &$cantidad);
                    
                    return $this->execute_single_query('iii', $this->rows);
                }
            }

        }

        public function update () {
            if ($_POST) {
                $cantidad = $_POST['cantidad']; 
                $minima = $_POST['minima'];
                $total = $_POST['total'];
                $resto = $_POST['resto'];
                $id = $_POST['id'];
                
                $this->query = 'UPDATE `inventario` SET cant_inv=?, total_inv=?, min_inv=?, resto_inv=? WHERE id_inv=?';
            
                $this->rows = array(&$cantidad, &$total, &$minima, &$resto, &$id);

                return $this->execute_single_query('iiiii', $this->rows);   
            }
        }

        public function updateStock ($cant, $rest, $id) {
            $this->query = 'UPDATE `inventario` SET cant_inv=?, resto_inv=? WHERE id_inv=?';
        
            $this->rows = array(&$cant, &$rest, &$id);

            return $this->execute_single_query('iii', $this->rows);   
        }

        public function delete () {

            if ($_GET) {
                $id = $_GET['id'];
                $this->query = "DELETE FROM libros WHERE cota='" . $_GET['id']."'";
                $this->rows = array(&$id);
                $this->execute_single_query('i', $this->rows);
            }
        }

        public function getTotal () {

             $this->query = 'SELECT SUM(total_inv) AS total, SUM(resto_inv) AS prestados, SUM(cant_inv) AS actual FROM inventario';

             $this->get_result_from_query();
             return $this->rows;
        }


        public function historial() {}
        public function inhabilitar() {}
    }