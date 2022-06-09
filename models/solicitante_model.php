<?php

    require_once 'core/db_abstract.php';

    class solicitanteModel extends dbAbstractModel {

        # public $nombre, $apellido, $sexo, $cedula, $email, $ocupacion, $institucion, $edad;

        # private $telefono, $id, $direccion;

        public function get () {

            $this->query = 'SELECT s.id_sol AS idSol, s.nom_sol AS nomSol, s.ape_sol AS apeSol, s.ced_sol AS cedSol, s.corr_sol AS corrSol, s.dir_sol AS dirSol, s.edad_sol AS edadSol, s.sex_sol AS sexSol, s.tlf_sol AS teleSol, o.id_ocup AS idOcup, o.nom_ocup AS nomOcup, s.nom_inst AS nomInst, s.dir_inst AS dirInst, s.tel_inst AS telInst, s.estado_s AS estado_s FROM solicitantes s INNER JOIN ocupacion o ON s.ocup_sol = o.id_ocup ORDER BY s.id_sol';

            $this->get_result_from_query();
            return $this->rows;
        }

        public function getById () {

            $this->query = 'SELECT s.id_sol AS idSol, s.nom_sol AS nomSol, s.ape_sol AS apeSol,  s.ced_sol AS cedSol, s.corr_sol AS corrSol, s.dir_sol AS dirSol, s.edad_sol AS edadSol, s.sex_sol AS sexSol, s.tlf_sol AS teleSol, o.id_ocup AS idOcup, o.nom_ocup AS nomOcup, s.nom_inst AS nomInst, s.dir_inst AS dirInst, s.tel_inst AS telInst, s.estado_s AS estado_s FROM solicitantes s INNER JOIN ocupacion o ON s.ocup_sol = o.id_ocup WHERE id_sol=' . $_GET['id'];

            $this->get_result_from_query();
            return $this->rows;
        }

        public function post () {

            if ($_POST) {

                $nombre    = (!empty($_POST['nombre']));
                $apellido  = (!empty($_POST['apellido']));
                $cedula    = (!empty($_POST['cedula']));
                $sexo      = (!empty($_POST['sexo']));
                $edad      = (!empty($_POST['edad']));
                $telefono  = (!empty($_POST['telefono']));
                $email     = (!empty($_POST['email']));
                $direccion = (!empty($_POST['direccion']));
                $ocupacion = (!empty($_POST['ocupacion']));
                $nom_inst  = (!empty($_POST['nom_inst']))  ?  $_POST['nom_inst']  : NULL ;
                $tel_inst  = (!empty($_POST['tel_inst']))  ?  $_POST['tel_inst']  : NULL ;
                $dir_inst  = (!empty($_POST['dir_inst']))  ?  $_POST['dir_inst']  : NULL ;
                $estado_s  = (!empty($_POST['estado_s']));

                $this->query = 'INSERT INTO `solicitantes` (nom_sol, ape_sol, ced_sol, edad_sol, tlf_sol, dir_sol, corr_sol, sex_sol, ocup_sol, nom_inst, tel_inst, dir_inst, estado_s) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
                
                $this->rows = array($_POST['nombre'], $_POST['apellido'], $_POST['cedula'], $_POST['edad'], $_POST['telefono'], $_POST['direccion'], $_POST['email'], $_POST['sexo'],$_POST['ocupacion'], $_POST['nom_inst'], $_POST['tel_inst'], $_POST['dir_inst'], $_POST['estado_s']);

                return $this->execute_single_query('ssiissssisssi', $this->rows);
                
            }
        }

        public function update () {

            if ($_POST) {

                $nombre    = (!empty($_POST['nombre']))    ?  $_POST['nombre']    : NULL ;
                $apellido  = (!empty($_POST['apellido']))  ?  $_POST['apellido']  : NULL ;
                $cedula    = (!empty($_POST['cedula']))    ?  $_POST['cedula']    : NULL ;
                $sexo      = (!empty($_POST['sexo']))      ?  $_POST['sexo']      : NULL ;
                $edad      = (!empty($_POST['edad']))      ?  $_POST['edad']      : NULL ;
                $telefono  = (!empty($_POST['telefono']))  ?  $_POST['telefono']  : NULL ;
                $email     = (!empty($_POST['email']))     ?  $_POST['email']     : NULL ;
                $direccion = (!empty($_POST['direccion'])) ?  $_POST['direccion'] : NULL ;
                $ocupacion = (!empty($_POST['ocupacion'])) ?  $_POST['ocupacion'] : NULL ;
                $nom_inst  = (!empty($_POST['nom_inst']))  ?  $_POST['nom_inst']  : NULL ;
                $tel_inst  = (!empty($_POST['tel_inst']))  ?  $_POST['tel_inst']  : NULL ;
                $dir_inst  = (!empty($_POST['dir_inst']))  ?  $_POST['dir_inst']  : NULL ;
                $estado_s  = (!empty($_POST['estado_s']))  ?  $_POST['estado_s']  : NULL ;

                $this->query = 'UPDATE `solicitantes` SET nom_sol=?, ape_sol=?, ced_sol=?, edad_sol=?, tlf_sol=?, dir_sol=?, corr_sol=?, sex_sol=?, ocup_sol=?, nom_inst=?, tel_inst=?, dir_inst=?, estado_s=? WHERE id_sol=?';
                
                $this->rows = array($_POST['nombre'], $_POST['apellido'], $_POST['cedula'], $_POST['edad'], $_POST['telefono'], $_POST['direccion'], $_POST['email'], $_POST['sexo'],$_POST['ocupacion'], $_POST['nom_inst'], $_POST['tel_inst'], $_POST['dir_inst'], $_POST['estado_s'], $_POST['id']);

                return $this->execute_single_query('ssiissssisssii', $this->rows);
                
            }
        }

        public function delete () {

            if ($_GET) {

                $this->query = 'DELETE FROM solicitantes WHERE id_sol=?';
                $this->rows = array($_GET['id']);
                $this->execute_single_query('i', $this->rows);
            }
        }

        public function historial () {

            $this->query = "SELECT p.id_p AS idp, p.id_libro2, s.id_sol AS idSol, s.nom_sol AS nomSol, s.ape_sol AS apeSol, l.id_libro, l.cota AS cota, l.titulo AS titulo, l.autor AS autor, p.fecha_entrega AS fe, p.fecha_devolucion AS fd, p.observaciones_p AS obs, s.ced_sol AS cedSol, s.corr_sol AS corrSol, s.dir_sol AS dirSol, s.edad_sol AS edadSol, s.sex_sol AS sexSol, s.tlf_sol AS teleSol, o.id_ocup AS idOcup, o.nom_ocup AS nomOcup, s.nom_inst AS nomInst, s.dir_inst AS dirInst, s.tel_inst AS telInst  FROM prestamo p INNER JOIN solicitantes s ON p.numero_carnet2 = s.id_sol INNER JOIN libros l ON p.id_libro2 = l.id_libro INNER JOIN ocupacion o ON s.ocup_sol = o.id_ocup WHERE numero_carnet2='" . $_GET['id']."'";

            $this->get_result_from_query();
            return $this->rows;
        }

        public function inhabilitar() {

            if ($_GET) {

                $this->query = 'UPDATE `solicitantes` SET estado_s=0 WHERE id_sol=?';
                $this->rows = array($_GET['id']);
                $this->execute_single_query('i', $this->rows);
            }
                       
        }
    }