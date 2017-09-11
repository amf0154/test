<?php
class Database{    
    private static $instance = null;
    private $connection; 
    private $path = ROOT . '/config/DataBaseParams.php';
    public static function getInstance(){   
        if (null === self::$instance){  // if $instance not isset
            self::$instance = new self(); // creating new object of this class
        }
        return self::$instance;  // return object of this class     
    }
    
    private function __construct(){
        try{
            $params = include($this->path); // including db params 
            $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}"; // getting params for db connection
            $this->connection = new PDO($dsn, $params['user'], $params['password']); // creating new PDO connection
            $this->connection->exec("set names utf8"); // setting utf8 code
            }catch(PDOException $err){
                echo $err->getMessage();
        }      
    }
        
    private function __clone(){         
    }
    public function getConnection(){  // return object with connection of this class
	return $this->connection;
    }      
}
