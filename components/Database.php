<?php
class Database{    
    private static $instance = null;
    private $connection;
    private $path = ROOT . '/config/DataBaseParams.php';
    public static function getInstance(){   
        if (null === self::$instance){
            self::$instance = new self();
        }
        return self::$instance;       
    }
    
    private function __construct(){
        try{
            $params = include($this->path);
            $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
            $this->connection = new PDO($dsn, $params['user'], $params['password']);
            $this->connection->exec("set names utf8");
            }catch(PDOException $err){
                echo $err->getMessage();
        }      
    }
        
    private function __clone(){         
    }
    public function getConnection(){
	return $this->connection;
    }      
}
