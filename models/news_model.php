<?php

    require_once 'core/db_abstract.php';

    class newsModel extends dbAbstractModel {

        public function get () {

            $this->query = 'SELECT * FROM `news`';

            $this->get_result_from_query();
            return $this->rows;
        }

        public function getById () {

            $this->query = "SELECT * FROM `news` WHERE id_new='" . $_GET['id']."'";

            $this->get_result_from_query();
            return $this->rows;
        }

        public function post () {

            if ($_POST) {
                
                 if (!empty($_POST['title_new']) && !empty($_POST['author_new']) && !empty($_POST['content_new']) && !empty($_POST['date_new'])) {
                     
                    $this->query = 'INSERT INTO `news` (title_new, author_new, content_new, date_new) VALUES (?,?,?,?)';

                    $title_new = $_POST['title_new'];
                    $author_new = $_POST['author_new'];
                    $content_new = $_POST['content_new'];
                    $date_new = $_POST['date_new'];
                
                    $this->rows = array(&$title_new, &$author_new, &$content_new, &$date_new);
                    
                     return $this->execute_single_query('ssss', $this->rows);
                  
                }
            }

        }

        public function update () {

            if ($_POST) {

                if (!empty($_POST['title_new']) && !empty($_POST['author_new']) && !empty($_POST['content_new']) && !empty($_POST['date_new']) && $_POST['id']) {

                    $this->query = 'UPDATE `news` SET title_new=?, author_new=?, content_new=?, date_new=? WHERE id_new=?';

                    $title_new = $_POST['title_new'];
                    $author_new = $_POST['author_new'];
                    $content_new = $_POST['content_new'];
                    $date_new = $_POST['date_new'];
                    $id = $_POST['id'];
                
                    $this->rows = array(&$title_new, &$author_new, &$content_new, &$date_new, &$id);

                     $this->execute_single_query('ssssi', $this->rows);
                       
                }
            }
        }

        public function delete () {

            if ($_GET) {
                $id = $_GET['id'];

                $this->query = "DELETE FROM news WHERE id_new='" . $_GET['id']."'";
                $this->rows = array(&$id);
                $this->execute_single_query('i', $this->rows);
            }
        }
        public function historial() {}
        public function inhabilitar() {}
    }