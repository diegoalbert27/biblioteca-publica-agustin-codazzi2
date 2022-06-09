<?php

    require_once 'core/db_abstract.php';

    class depFunc extends dbAbstractModel {

        private $table;

        public function __construct($table) {
            parent::__construct();
            $this->table = $table;
        }

        public function get () {
            $this->query = "SELECT * FROM $this->table";
            $this->get_result_from_query();
            return $this->rows;
        } 

        public function post() {}
        public function update() {}
        public function delete() {}
        public function getById() {}
        public function historial() {}
        public function inhabilitar() {}
        
    }