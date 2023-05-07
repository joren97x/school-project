<?php 

    class database
    {
        private $host;
        private $user;
        private $password;
        private $dbname;
        private $stat;
        private $conn;


        public function __construct()
        {
            $this->host = 'localhost';
            $this->user = 'root';
            $this->password = '';
            $this->dbname = 'group10';
            $this->stat = false;

            $this->conn = $this->init();
        }

        public function getStatus()
        {
            return $this->stat;
        }

        public function getConn()
        {
            return $this->conn;
        }

        public function closeConn()
        {
            $this->conn = null;
        }

        private function init()
        {
            try {
                $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->stat = true;


                return $conn;
            } catch (PDOException $e) {
                echo "Connection to server failed: " . $e->getMessage();
            }
        }

    }

?>