<?php
    class Database{
        protected $pdo = null;
        protected $stmt = null;

        public $error = "";

        function __construct(){
            
            try{
                $this->pdo = new PDO(
                    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
                    DB_USER,
                    DB_PASSWORD,
                    [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]
                );    

                echo "Connected successfully!";
            }catch(PDOException $e){
                echo "Unable to connect to Database: " . $e->getMessage();
            }
        }
    }

    $db = new Database();
?>