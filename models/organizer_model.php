<?php

    require_once 'core/db_abstract.php';

    class Organizer extends dbAbstractModel {

        public function get () {

            $this->query = 'SELECT u.id_user, u.name_user, u.email_user, o.* FROM organizer o INNER JOIN usuario u ON o.id_user = u.id_user ORDER BY o.id_user';

            $this->get_result_from_query();
            return $this->rows;
        }

        public function getAllByState ($state) {

            $this->query = 'SELECT u.id_user, u.name_user, u.email_user, o.* FROM organizer o INNER JOIN usuario u ON o.id_user = u.id_user WHERE o.is_actived = '. $state;

            $this->get_result_from_query();
            return $this->rows;
        }

        public function getById () {

            $this->query = "SELECT u.id_user, u.name_user, u.email_user, o.* FROM organizer o INNER JOIN usuario u ON o.id_user = u.id_user WHERE id='" . $_GET['id']."'";

            $this->get_result_from_query();
            return $this->rows;
        }

        public function getByUser ($user) {

            $this->query = "SELECT * FROM `organizer` WHERE id_user='" . $user."'";

            $this->get_result_from_query();
            return $this->rows;
        }

        public function post () {

            if ($_GET) {
                
                 if (!empty($_GET['id'])) {

                    $id = $_GET['id'];
                     
                    $this->query = 'INSERT INTO `organizer` (id_user, is_actived) VALUES (?,?)';
                
                    $this->rows = array(&$id, 0);
                    
                     return $this->execute_single_query('ii', $this->rows);
                  
                }
            }

        }

        public function updateStateById ($id, $state) {
            $this->query = 'UPDATE organizer SET is_actived = ? WHERE id = ?';
                
            $this->rows = array(&$state, &$id);
                    
            return $this->execute_single_query('ii', $this->rows);
        }

        public function update () {

            if ($_POST) {

                if (!empty($_POST['title_new']) && !empty($_POST['author_new']) && !empty($_POST['content_new']) && !empty($_POST['date_new']) && $_POST['id']) {
                    $title = $_POST['title_new'];
                    $author = $_POST['author_new'];
                    $content = $_POST['content_new'];
                    $date = $_POST['date_new'];
                    $id = $_POST['id'];

                    $this->query = 'UPDATE `news` SET title_new=?, author_new=?, content_new=?, date_new=? WHERE id_new=?';
                
                    $this->rows = array(&$title, &$author, &$content, &$date, &$id);

                     $this->execute_single_query('ssssi', $this->rows);
                       
                }
            }
        }

        public function delete () {

            if ($_GET) {

                $this->query = "DELETE FROM news WHERE id_new='" . $_GET['id']."'";
                $id = $_GET['id'];
                $this->rows = array(&$id);
                $this->execute_single_query('i', $this->rows);
            }
        }
        public function historial() {}
        public function inhabilitar() {}
    }