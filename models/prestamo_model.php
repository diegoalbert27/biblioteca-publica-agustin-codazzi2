<?php

    require_once 'core/db_abstract.php';

    class prestamoModel extends dbAbstractModel {
        
         public function get () {

            $this->query = 'SELECT p.id_p AS idp, s.id_sol AS idSol, l.id_libro AS id, l.cota AS cota, l.titulo AS titulo, p.fecha_entrega AS fe, p.fecha_devolucion AS fd, p.observaciones_p AS obs, p.pendiente AS estado FROM prestamo p INNER JOIN solicitantes s ON p.numero_carnet2 = s.id_sol INNER JOIN libros l ON p.id_libro2 = l.id_libro';

            $this->get_result_from_query();
            return $this->rows;
        }

        public function getById () {

            $this->query = "SELECT p.id_p AS idp, s.id_sol AS idSol, s.nom_sol AS nomSol, s.ape_sol AS apeSol, l.id_libro AS id, l.cota AS cota, l.titulo AS titulo, p.fecha_entrega AS fe, p.fecha_devolucion AS fd, p.observaciones_p AS obs, p.pendiente AS estado FROM prestamo p INNER JOIN solicitantes s ON p.numero_carnet2 = s.id_sol INNER JOIN libros l ON p.id_libro2 = l.id_libro WHERE id_p='" . $_GET['id']."'";

            $this->get_result_from_query();
            return $this->rows;
        }

        // public function getByDate () {

        //     $this->query = "SELECT * FROM prestamo WHERE fecha_entrega IN ( SELECT fecha_entrega FROM prestamo GROUP BY fecha_entrega )";

        //     $this->get_result_from_query();
        //     return $this->rows;
        // }

        public function post () {

            if ($_POST) {

                if (!empty($_POST['sol']) && !empty($_POST['libro']) && !empty($_POST['fe']) && !empty($_POST['fd'] && $_POST['obs']) && !empty($_POST['estado'])) {
                    $solicitante = $_POST['sol'];
                    $libro = $_POST['libro'];
                    $fe = $_POST['fe'];
                    $fd = $_POST['fd'];
                    $observaciones = $_POST['obs'];
                    $estado = $_POST['estado'];

                    $this->query = 'INSERT INTO `prestamo` (numero_carnet2, id_libro2, fecha_entrega, fecha_devolucion, observaciones_p, pendiente) VALUES (?,?,?,?,?,?)';
                
                    $this->rows = array(&$solicitante, &$libro, &$fe, &$fd, &$observaciones, &$estado);

                    return $this->execute_single_query('isssss', $this->rows);
                }
            }
        }

        public function update () {

            if ($_POST) {

                if (!empty($_POST['sol']) && !empty($_POST['libro']) && !empty($_POST['fe']) && !empty($_POST['fd']) && $_POST['obs'] && !empty($_POST['estado']) && $_POST['id']) {
                    $solicitante = $_POST['sol'];
                    $libro = $_POST['libro'];
                    $fe = $_POST['fe'];
                    $fd = $_POST['fd'];
                    $observaciones = $_POST['obs'];
                    $estado = $_POST['estado'];
                    $id = $_POST['id'];

                    $this->query = 'UPDATE `prestamo` SET numero_carnet2=?, id_libro2=?, fecha_entrega=?, fecha_devolucion=?, observaciones_p=?, pendiente=? WHERE id_p=?';
                
                    $this->rows = array(&$solicitante, &$libro, &$fe, &$fd, &$observaciones, &$estado, &$id);

                    $this->execute_single_query('isssssi', $this->rows);
                }
            }
        }

        public function delete () {

            if ($_GET) {

                $this->query = 'DELETE FROM prestamo WHERE id_p=?';
                $id = $_GET['id'];
                $this->rows = array(&$id);
                $this->execute_single_query('i', $this->rows);
            }
        }
        public function historial() {}
        public function inhabilitar() {}
    }