<?php

    require_once 'core/db_abstract.php';

    class blogModel extends dbAbstractModel {

        public function get () {

            $this->query = 'SELECT * FROM `blog`';

            $this->get_result_from_query();
            return $this->rows;
        }

        public function getById () {

            $this->query = "SELECT * FROM `blog` WHERE id_blog='" . $_GET['id']."'";

            $this->get_result_from_query();
            return $this->rows;
        }

        public function post () {

            if ($_POST) {
                
                 if (!empty($_POST['title_blog']) && !empty($_POST['author_blog']) && !empty($_POST['content_blog']) && !empty($_POST['date_blog'])) {
                     
                    $this->query = 'INSERT INTO `blog` (title_blog, author_blog, content_blog, date_blog) VALUES (?,?,?,?)';
                    $title_blog = $_POST['title_blog'];
                    $author_blog = $_POST['author_blog'];
                    $content_blog = $_POST['content_blog'];
                    $date_blog = $_POST['date_blog'];
                
                    $this->rows = array(&$title_blog, &$author_blog, &$content_blog, &$date_blog);
                    
                     return $this->execute_single_query('ssss', $this->rows);
                  
                }
            }

        }

        public function update () {

            if ($_POST) {

                if (!empty($_POST['title_blog']) && !empty($_POST['author_blog']) && !empty($_POST['content_blog']) && !empty($_POST['date_blog']) && $_POST['id']) {

                    $this->query = 'UPDATE `blog` SET title_blog=?, author_blog=?, content_blog=?, date_blog=? WHERE id_blog=?';

                    $title_blog = $_POST['title_blog'];
                    $author_blog = $_POST['author_blog'];
                    $content_blog = $_POST['content_blog'];
                    $date_blog = $_POST['date_blog'];
                    $id = $_POST['id'];
                
                    $this->rows = array(&$title_blog, &$author_blog, &$content_blog, &$date_blog, &$id);

                     $this->execute_single_query('ssssi', $this->rows);
                       
                }
            }
        }

        public function delete () {

            if ($_GET) {

                $this->query = "DELETE FROM blog WHERE id_blog='" . $_GET['id']."'";
                $id = $_GET['id'];
                $this->rows = array(&$id);
                $this->execute_single_query('i', $this->rows);
            }
        }
        public function historial() {}
        public function inhabilitar() {}
    }