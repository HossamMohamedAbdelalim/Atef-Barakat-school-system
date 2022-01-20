<?php
include_once 'myDB.php';
include_once("user.php");
class usertype {
    public $ID;
    public $NAME;
    public $p_id;  
    function __construct($id)
    {
		global $con;
                $con = mysqli_connect("localhost", "root", "","system database");
		if ($id != -1)
		{	
			$sql="SELECT * FROM usertype WHERE ID=$id";
			$userDataSet = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($userDataSet);
                        $this->ID=$id;
                        $this->NAME = $row ["NAME"];
                        $this->p_id = $row ["p_id"];
                      
                      
                        
		    }
        }
    function creat($NAME) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="INSERT INTO user (ID,NAME,p_id ) VALUES ('$ID','$NAME', '$p_id' )";
        mysqli_query($con,$sql);
         if($con == TRUE)
       {
           echo " Record created succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }
    }   
    function update($id) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql = "UPDATE  usertype SET 'NAME' = $NAME, 'ID' = $ID  ,'p_id' =  $p_id  ";
        mysqli_query($con,$sql) or die(mysql_error());
         if($con == TRUE)
       {
           echo " Record updated succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }
    }

    function delete($id) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="DELETE FROM usertype WHERE ID = $id";
        mysqli_query($con,$sql) or die(mysql_error());
         if($con == TRUE)
       {
           echo " Record deleted succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }
    }
    
}






?>