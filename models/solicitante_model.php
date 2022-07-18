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
                if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['cedula']) && !empty($_POST['sexo']) && !empty($_POST['edad']) && !empty($_POST['telefono']) && !empty($_POST['email']) && !empty($_POST['direccion']) && !empty($_POST['ocupacion']) && $_POST['nom_inst'] && $_POST['tel_inst'] && $_POST['dir_inst'] && !empty($_POST['estado_s'])) {
                $nombre    = $_POST['nombre'];
                $apellido  = $_POST['apellido'];
                $cedula    = $_POST['cedula'];
                $sexo      = $_POST['sexo'];
                $edad      = $_POST['edad'];
                $telefono  = $_POST['telefono'];
                $email     = $_POST['email'];
                $direccion = $_POST['direccion'];
                $ocupacion = $_POST['ocupacion'];
                $nom_inst  = $_POST['nom_inst'];
                $tel_inst  = $_POST['tel_inst'];
                $dir_inst  = $_POST['dir_inst'];
                $estado_s  = $_POST['estado_s'];

                $this->query = 'INSERT INTO `solicitantes` (nom_sol, ape_sol, ced_sol, edad_sol, tlf_sol, dir_sol, corr_sol, sex_sol, ocup_sol, nom_inst, tel_inst, dir_inst, estado_s) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
                
                $this->rows = array(&$nombre, &$apellido, &$cedula, &$edad, &$telefono, &$direccion, &$email, &$sexo, &$ocupacion, &$nom_inst, &$tel_inst, &$dir_inst, &$estado_s);

                return $this->execute_single_query('ssiissssisssi', $this->rows);

                }
                
            }
    
        }

        public function update () {

            if ($_POST) {
                if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['cedula']) && !empty($_POST['sexo']) && !empty($_POST['edad']) && !empty($_POST['telefono']) && !empty($_POST['email']) && !empty($_POST['direccion']) && !empty($_POST['ocupacion']) && $_POST['nom_inst'] && $_POST['tel_inst'] && $_POST['dir_inst'] && !empty($_POST['estado_s']) && !empty($_POST['id'])) {
                    $nombre    = $_POST['nombre'];
                    $apellido  = $_POST['apellido'];
                    $cedula    = $_POST['cedula'];
                    $sexo      = $_POST['sexo'];
                    $edad      = $_POST['edad'];
                    $telefono  = $_POST['telefono'];
                    $email     = $_POST['email'];
                    $direccion = $_POST['direccion'];
                    $ocupacion = $_POST['ocupacion'];
                    $nom_inst  = $_POST['nom_inst'];
                    $tel_inst  = $_POST['tel_inst'];
                    $dir_inst  = $_POST['dir_inst'];
                    $estado_s  = $_POST['estado_s'];
                    $id        = $_POST['id'];

                $this->query = 'UPDATE `solicitantes` SET nom_sol=?, ape_sol=?, ced_sol=?, edad_sol=?, tlf_sol=?, dir_sol=?, corr_sol=?, sex_sol=?, ocup_sol=?, nom_inst=?, tel_inst=?, dir_inst=?, estado_s=? WHERE id_sol=?';
                
                $this->rows = array(&$nombre, &$apellido, &$cedula, &$edad, &$telefono, &$direccion, &$email, &$sexo, &$ocupacion, &$nom_inst, &$tel_inst, &$dir_inst, &$estado_s, &$id);

                return $this->execute_single_query('ssiissssisssii', $this->rows);

            }
                
            }
        }

        public function delete () {

            if ($_GET) {

                $this->query = 'DELETE FROM solicitantes WHERE id_sol=?';
                $id = $_GET['id'];
                $this->rows = array(&$id);
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
                $id = $_GET['id'];
                $this->rows = array(&$id);
                $this->execute_single_query('i', $this->rows);
            }
                       
        }
    }