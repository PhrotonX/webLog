<?php
    class Database{
        protected $pdo = null;
        protected $stmt = null;

        public $error = "";

        function __construct(){
            open();
        }

        function close(){
            try{
                $pdo = null;
            }catch(PDOException $e){
                echo "Unable to disconnect from Database: " . $e->getMessage();
            }
        }

        function open(){
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

        function save($query){
            $pdo->exec($query);
        }

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

    define("DB_HOST", "localhost");
    define("DB_NAME", "weblogdb");
    define("DB_CHARSET", "utf8mb4");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");

?>