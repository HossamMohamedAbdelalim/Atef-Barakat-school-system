<?php
include_once 'myDB.php';
include_once("usertype.php");
include_once("links_aka_perms.php");
class user {
    public $ID;
    public $FullName;
    public $DOB;
    public $USERNAME;
    public $password;
    public $Address;
    public $EMAIL;
    public $USERTYPEObj;
    public $LINKObj;  
    function __construct($id)
    {
		global $con;
                $con = mysqli_connect("localhost", "root", "","system database");
		if ($id != -1)
		{	
			$sql="SELECT * FROM user WHERE ID=$id";
			$userDataSet = mysqli_query($con,$sql) or die(mysql_error());
			$row = mysqli_fetch_array($userDataSet);
                        $this->ID=$id;
                        $this->FullName=$row["FullName"];
                        $this->DOB=$row["DOB"];
                        $this->USERNAME=$row["USERNAME"];
                        $this->password=$row["password"];
                        $this->Address=$row["Address"];
                        $this->EMAIL=$row["EMAIL"];
                        $this->USERTYPEObj = new USERTYPE();
                        $this->LINKObj = new LINK();
                      
                      
                        
		    }
        }
    function creat() {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="INSERT INTO user (ID,FullName,DOB,USERNAME,password,Address,EMAIL) VALUES ('$id','$FullName', '$DOB' ,'$USERNAME','$password','$Address','$EMAIL' )";
        mysqli_query($con,$sql) or die(mysql_error());
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
        $sql = "UPDATE  user SET 'FullName' = $FullName, 'ID' = $ID  ,'DOB' =  $DOB, 'USERNAME' = $USERNAME, 'password' =  $password , 'Address' = $Address, 'EMAIL' = $EMAIL   ";
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
        $sql="DELETE FROM user WHERE id = $id";
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