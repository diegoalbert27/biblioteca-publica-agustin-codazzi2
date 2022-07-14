<?php

ob_start();
    
    abstract class dbAbstractModel {

        private static $host, $user, $passwd; 
        
        protected $db, $query;
        protected $rows = array();
       
        abstract protected function get();
        abstract protected function getById();
        abstract protected function post();
        abstract protected function update();
        abstract protected function delete();
        abstract protected function historial();  
        abstract protected function inhabilitar();       

        private $conn;

        public function __construct () {

            $config_database = require_once 'config/config_database.php';
        
            self::$host = $config_database['host'] ?? 'localhost';
            self::$user = $config_database['user'] ?? 'root';
            self::$passwd = $config_database['passwd'] ?? 'root';
            
            $this->db = $config_database['db'] ?? 'id15173591_biblioteca_agustin_codazzi';
        }

        protected function open_connection_db () {

            $this->conn = new mysqli(self::$host, self::$user, self::$passwd, $this->db);

            if ($this->conn->connect_errno) {
                echo 'Error con conectar la base de datos ' . $this->conn->connect_errno;
                echo ' No Funciona ' . $this->conn->connect_error;
            }
        }

        protected function close_connection_db () {
            $this->conn->close();
        }

        public function execute_single_query ($param, $rows) {

            $this->open_connection_db();

            $stmt = $this->conn->prepare($this->query);
            @call_user_func_array(array($stmt, 'bind_param'), array_merge(array($param), $rows));
            if (!$stmt->execute()) {
                return $stmt->error;
            }
            
            $lastInsertId = $this->conn->insert_id;
            
            $this->close_connection_db();

            return $lastInsertId;
        }

        public function utf8 ($rows) {
            $convert = [];
            foreach ($rows as $row)
            {
                $rows_convert = [];
               foreach($row as $k => $v)
               {
                   $rows_convert[$k] = utf8_decode($v);
               }
               $convert[] = $rows_convert;
            }

            return $convert;
        }

        public function get_result_from_query () {

            $this->open_connection_db();
            if (!$result = $this->conn->query($this->query)) echo $this->conn->error;
            while ($this->rows[] = $result->fetch_assoc());
            array_pop($this->rows);

            // $this->rows = $this->utf8($this->rows);

            $this->close_connection_db();
        }
    }

    ob_end_flush();
