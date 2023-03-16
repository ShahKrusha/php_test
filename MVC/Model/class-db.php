<?php
    class dbclass
    {
        public $host = "localhost";
        public $user = "root";
        public $password = "root";
        public $db = "category_db";
        public $conn;

        public function __construct()
        {
            try {
                $conn = mysqli_connect('localhost','root','root','category_db');
			    $this->conn=$conn;
                //echo "Successfully Connected !";
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
        public function query($sql) {
            // Execute the query
            $result = $this->conn->query($sql);
            
            // Check if the query was successful
            if (!$result) {
                die("Query failed: " . $this->conn->error);
            }
            
            return $result;
        }
    }
?>