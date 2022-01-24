<?php
class Database {
    //put your code here
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "system database";
    public static $connection;
      private static $instance;
    public function connectToDB() {
        $con = mysqli_connect($this->server, $this->username, $this->password, $this->dbname);
        if ($con) {
            return $con;
        } else {
            die("ERROR: Could not connect. " . mysqli_connect_error());

            return false;
        }
    }
    public static function getInstance(){// create only one object for databse 
        if(self::$instance==null){
          echo "Return New Instance";
            self::$instance=new Database();
        }
        else 
        {
          echo "Object is their";
          

        }
        return self::$instance;
    }
}
