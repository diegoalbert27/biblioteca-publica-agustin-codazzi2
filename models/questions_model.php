<?php

require_once 'core/db_abstract.php';

class questionsModel extends dbAbstractModel {
    public function get () {
        $this->query = "SELECT * FROM questions";
        $this->get_result_from_query();
        return $this->rows;
    }
    public function getById () {}
    
    public function post () {
        if ($_POST) {
            $this->query = "INSERT INTO questions (pregunta, respuesta, user_que) VALUES (?,?,?)";
            $this->rows = array($_POST['pregunta'], $_POST['respuesta'], $_POST['user']);
            return $this->execute_single_query('ssi', $this->rows);
        }
    }
    
    public function update () {
        if ($_POST) {
            $this->query = "UPDATE questions SET pregunta = ?, respuesta = ? WHERE user_que = ? AND id_que = ?";

            $this->rows = array($_POST['pregunta'], $_POST['respuesta'], $_POST['user'], $_POST['id']);

            return $this->execute_single_query('ssii', $this->rows);
        }
    }
    public function delete () {}
    
    public function historial () {}
    public function inhabilitar () {}
}