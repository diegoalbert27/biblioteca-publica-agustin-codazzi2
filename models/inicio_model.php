<?php

    require_once 'core/db_abstract.php';

    class inicioModel extends dbAbstractModel {

        public function get () {

            $this->query = "SELECT p.id_p AS idp, s.id_sol AS idSol, s.nom_sol AS nomSol, s.ape_sol AS apeSol, s.corr_sol AS corrSol, s.tlf_sol AS teleSol, l.cota AS cota, l.titulo AS titulo, p.fecha_entrega AS fe, p.fecha_devolucion AS fd, p.observaciones_p AS obs, p.pendiente AS estado FROM prestamo p INNER JOIN solicitantes s ON p.numero_carnet2 = s.id_sol INNER JOIN libros l ON p.id_libro2 = l.id_libro WHERE pendiente='1' ORDER BY p.fecha_devolucion";

            $this->get_result_from_query();
            return $this->rows;
        }

        public function getById () {

            $this->query = "SELECT * FROM `usuario` WHERE id_user='" . $_SESSION['user_id']."'";

            $this->get_result_from_query();
            return $this->rows;
        }

        public function post () {}
        public function update () {}
        public function delete () {}
        public function historial() {}
        public function inhabilitar() {}
    }