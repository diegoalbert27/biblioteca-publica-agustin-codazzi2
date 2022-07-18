<?php

    require_once 'core/db_abstract.php';

    class usuarioModel extends dbAbstractModel {

        public function get () {

            $this->query = 'SELECT * FROM `usuario`';

            $this->get_result_from_query();
            return $this->rows;
        }

        public function getById () {

            $this->query = "SELECT * FROM `usuario` WHERE id_user='" . $_GET['id']."'";

            $this->get_result_from_query();
            return $this->rows;
        }

        public function post () {

            if ($_POST) {
                
                 if (!empty($_POST['name_user']) && !empty($_POST['email_user']) && !empty($_POST['nivel_user']) && !empty($_POST['passwd_user']) && !empty($_POST['tlf_user']) && !empty($_POST['enabled']) && !empty($_POST['correo_user'])) {
                    $nombre = $_POST['name_user'];
                    $usuario = $_POST['email_user'];
                    $nivel = $_POST['nivel_user'];
                    $clave = $_POST['passwd_user'];
                    $telefono = $_POST['tlf_user'];
                    $estado = $_POST['enabled'];
                    $correo = $_POST['correo_user'];

                    $this->query = 'INSERT INTO `usuario` (name_user, email_user, nivel_user, passwd_user, tlf_user, enabled, correo_user) VALUES (?,?,?,?,?,?,?)';

                    $password_hash = password_hash($clave, PASSWORD_BCRYPT);
                
                    $this->rows = array(&$nombre, &$usuario, &$nivel, &$password_hash, &$telefono, &$estado, &$correo);
                    
                     return $this->execute_single_query('ssissis', $this->rows);
                  
                }
            }

        }

        public function update () {

            if ($_POST) {
 
                     if (!empty($_POST['name_user']) && !empty($_POST['email_user']) && !empty($_POST['passwd_user']) && !empty($_POST['tlf_user']) && !empty($_POST['correo_user']) && !empty($_POST['enabled']) && !empty($_POST['id'])) {
                        $nombre = $_POST['name_user'];
                        $usuario = $_POST['email_user'];
                        $clave = $_POST['passwd_user'];
                        $telefono = $_POST['tlf_user'];
                        $correo = $_POST['correo_user'];
                        $estado = $_POST['enabled'];
                        $id = $_POST['id'];

                        $this->query = 'UPDATE `usuario` SET name_user=?, email_user=?, passwd_user=?, tlf_user=?, correo_user=?, enabled=? WHERE id_user=?';
                        
                        $password_hash = password_hash($clave, PASSWORD_BCRYPT);
                    
                        $this->rows = array(&$nombre, &$usuario, &$password_hash, &$telefono, &$correo, &$estado, &$id);

                         return $this->execute_single_query('sssssii', $this->rows);
                }
            }
        }

        public function delete () {

            if ($_GET) {

                $this->query = "DELETE FROM usuario WHERE id_user='" . $_GET['id']."'";
                $id = $_GET['id'];
                $this->rows = array(&$id);
                $this->execute_single_query('i', $this->rows);
            }
        }
        public function historial() {
            
            $this->query = "SELECT * FROM `usuario` WHERE id_user='" . $_SESSION['user_id']."'";

            $this->get_result_from_query();
            return $this->rows;
        }

        public function updateNivel () {
            if ($_GET) {
                $this->query = 'UPDATE usuario SET nivel_user=? WHERE id_user=?';
                $id = $_GET['id'];
                $this->rows = array(2, &$id);
                        
                return $this->execute_single_query('ii', $this->rows);
            }
        }

        public function getByNivel ($nivel = 1) {
            $this->query = 'SELECT * FROM `usuario` WHERE nivel_user = ' . $nivel ;

            $this->get_result_from_query();
            return $this->rows;       
        }

        public function habilitar() {

            if ($_GET) {

                $this->query = 'UPDATE `usuario` SET enabled=1 WHERE id_user=?';
                $id = $_GET['id'];
                $this->rows = array(&$id);
                $this->execute_single_query('i', $this->rows);
            }
        }

        public function inhabilitar() {}
    }