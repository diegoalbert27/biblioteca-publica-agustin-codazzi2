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
                     
                    $this->query = 'INSERT INTO `usuario` (name_user, email_user, nivel_user, passwd_user, tlf_user, enabled, correo_user) VALUES (?,?,?,?,?,?,?)';
                
                    $this->rows = array($_POST['name_user'], $_POST['email_user'], $_POST['nivel_user'], password_hash($_POST['passwd_user'], PASSWORD_BCRYPT), $_POST['tlf_user'], $_POST['enabled'], $_POST['correo_user']);
                    
                     return $this->execute_single_query('ssissis', $this->rows);
                  
                }
            }

        }

        public function update () {

            if ($_POST) {
 
                     if (!empty($_POST['name_user']) && !empty($_POST['email_user']) && !empty($_POST['passwd_user']) && !empty($_POST['tlf_user']) && !empty($_POST['correo_user']) && !empty($_POST['enabled']) && !empty($_POST['id'])) {
                     
                        $this->query = 'UPDATE `usuario` SET name_user=?, email_user=?, passwd_user=?, tlf_user=?, correo_user=?, enabled=? WHERE id_user=?';
                    
                        $this->rows = array($_POST['name_user'], $_POST['email_user'], password_hash($_POST['passwd_user'], PASSWORD_BCRYPT), $_POST['tlf_user'], $_POST['correo_user'], $_POST['enabled'], $_POST['id']);
                        
                         return $this->execute_single_query('sssssii', $this->rows);
                }
            }
        }

        public function delete () {

            if ($_GET) {

                $this->query = "DELETE FROM usuario WHERE id_user='" . $_GET['id']."'";
                $this->rows = array($_GET['id']);
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
                    
                $this->rows = array(2, $_GET['id']);
                        
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
                $this->rows = array($_GET['id']);
                $this->execute_single_query('i', $this->rows);
            }
        }

        public function inhabilitar() {}
    }