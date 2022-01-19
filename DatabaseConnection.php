<?php

class DatabaseConnection {
    
    private $host="localhost";
    private $username="root";
    private $password="";
    private $database_name="system database";
    private  $database_connection; 
    private static $instance;
public  static $Counter=0;


  
    private function __construct() {
      $this->database_connection = $this->database_connect($this->host, $this->username,$this->password);
     self::$Counter++;
      echo self::$Counter;

    }
    public static function getInstance(){
        if(self::$instance==null){
          echo "Return New Instance";
            self::$instance=new DatabaseConnection();
        }
        else 
        {
          echo "Object is their";
          

        }
        return self::$instance;
    }
     private function database_connect($database_host, $database_username, $database_password) {
      if ($connection = mysqli_connect("localhost", "root", "")){
             mysqli_select_db($connection,"system database");
            return $connection;
            
        } else {
                die("Database connection error");
            
        }
    }
    private function database_select($database_name) {
      
        return mysqli_select_db( $this->database_connection,$database_name)
            or die("No database is selecteted");
        
    }
}

?>