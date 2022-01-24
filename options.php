<?php

class options {
    public $id;
    public $name;
    public $type;
    function __construct($id)
    {
		global $con;
                $con = mysqli_connect("localhost", "root", "","system database");
		if ($id != -1)
		{	
			$sql="SELECT * FROM options WHERE id=$id";
			$StudentDataSet = mysqli_query($con,$sql) or die(mysql_error());
			$row = mysqli_fetch_array($StudentDataSet);
                        $this->ID=$id;
                        $this->name=$row["name"];
                        $this->type=$row["type"];
		}
    }
    function createpayment() {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="INSERT INTO options(id,name,type) VALUES ('$id','$name','$type')";
        mysqli_query($con,$sql) or die(mysql_error());
         if($con == TRUE)
       {
           echo " Record created succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }
    }   
    
}

