<?php

    class sessionModel extends dbAbstractModel {

        public function get () {}

        public function post() {
            if ($_POST) {
                if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['nivel_user']) && !empty($_POST['enabled']) && !empty($_POST['password'])) {
                    $nombre = $_POST['name'];
                    $usuario = $_POST['email'];
                    $nivel = $_POST['nivel_user'];
                    $estado = $_POST['enabled'];
                    $clave = $_POST['password'];

                    $password_hash = password_hash($clave, PASSWORD_BCRYPT);

                    $this->query = 'INSERT INTO usuario (name_user, email_user, nivel_user, enabled, passwd_user) VALUES (?,?,?,?,?)';
                    $this->rows = array(&$nombre, &$usuario, &$nivel, &$estado, &$password_hash);
                    $this->execute_single_query('ssiis', $this->rows);
                }
            }
        }

        public function postClient() {
            if ($_POST) {
                if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                    $nombre = $_POST['name'];
                    $usuario = $_POST['email'];
                    $clave = $_POST['password'];

                    $password_hash = password_hash($clave, PASSWORD_BCRYPT);

                    $this->query = 'INSERT INTO usuario (name_user, email_user, nivel_user, passwd_user) VALUES (?,?,?,?)';
                    $this->rows = array(&$nombre, &$usuario, 1, &$password_hash);
                    $this->execute_single_query('ssis', $this->rows);
                }
            }
        }

        public function update() {}
        public function delete() {}
        public function historial() {}
        public function inhabilitar() {}
        
        public function getById () {
            if ($_POST) {
                if (!empty($_POST['email']) && !empty($_POST['password'])) {
                    $correo = $_POST['email'];
                    $this->query = "SELECT * FROM usuario WHERE email_user = '$correo' OR name_user = '$correo'";
                    $this->get_result_from_query();
                    return $this->rows;
                }
            }
        }

        public function blockAccount ($id) {
            $this->query = "UPDATE usuario SET enabled = 0 WHERE id_user = ?";
            $this->rows = array(&$id);
            $this->execute_single_query('i', $this->rows);
        }
    }