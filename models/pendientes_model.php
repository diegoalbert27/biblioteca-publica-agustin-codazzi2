<?php

    require_once 'core/db_abstract.php';

    class pendienteModel extends dbAbstractModel {

        public function get () {

            $this->query = "SELECT p.id_p AS idp, s.id_sol AS idSol, s.nom_sol AS nomSol, s.ape_sol AS apeSol, s.corr_sol AS corrSol, s.tlf_sol AS teleSol, l.id_libro as idLibro, l.cota AS cota, l.titulo AS titulo, p.fecha_entrega AS fe, p.fecha_devolucion AS fd, p.observaciones_p AS obs, p.pendiente AS estado FROM prestamo p INNER JOIN solicitantes s ON p.numero_carnet2 = s.id_sol INNER JOIN libros l ON p.id_libro2 = l.id_libro WHERE pendiente='1' ORDER BY p.fecha_devolucion";

            $this->get_result_from_query();
            return $this->rows;
        }

        public function getById () {}
        public function post () {}

        public function update () {

            if ($_GET) {

                $this->query = 'UPDATE `prestamo` SET pendiente="0" WHERE id_p=?';
                $id = $_GET['id'];
                $this->rows = array(&$id);
                $this->execute_single_query('i', $this->rows);
            }
   
        }

        public function delete () {}
        public function historial() {}
        public function inhabilitar() {}
    }