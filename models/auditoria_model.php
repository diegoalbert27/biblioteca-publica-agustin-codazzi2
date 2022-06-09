<?php

    require_once 'core/db_abstract.php';

    class auditoriaModel extends dbAbstractModel {
        public function get () {
            $this->query = 'SELECT a.id_aud, a.ent_aud, a.usr_aud, a.acc_aud, a.det_aud, a.fec_aud, u.name_user, u.id_user FROM auditorias a INNER JOIN usuario u ON a.usr_aud = u.id_user';
            $this->get_result_from_query();
            return $this->rows;
 
        }

        public function postIndie ($tabla, $accion, $detalle, $user, $fecha) {
           $this->query = 'INSERT INTO auditorias(ent_aud, acc_aud, det_aud, usr_aud, fec_aud) VALUES (?,?,?,?,?)';            
           $this->rows = array($tabla, $accion, $detalle, $user, $fecha);
            return $this->execute_single_query('ssiis', $this->rows);
        }

        public function getByid () {}
        public function post () {}
        public function delete () {}
        public function update () {}
        public function historial() {}
        public function inhabilitar() {}
    }