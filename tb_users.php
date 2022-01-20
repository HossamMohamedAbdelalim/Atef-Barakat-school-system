<?php
include_once 'myDB.php';
include_once("user.php");
include_once("usertype.php");
class tb_users {
    public $ID;
    public $FullName;
    public $Email;
    public $Password;
    public $DateOfBirth;
    public $UserType_id;
    function __construct($id)
    {
		global $con;
                $con = mysqli_connect("localhost", "root", "","system database");
		if ($id != -1)
		{	
			$sql="SELECT * FROM tb_users WHERE ID=$id";
			$userDataSet = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($userDataSet);
                       
                $this->ID = $id;
                $this->FullName = $row ["FullName"];
                $this->Email = $row ["Email"];
                $this->password = $row ["Password"];
                $this->DateOfBirth = $row ["DateOfBirth"];
                $this->UserTypeObj = new UserType();
                      
                      
                        
		    }
        }
    function creat($FullName,$Email ,$password,$DateOfBirth,$UserTypeObj) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="INSERT INTO tb_users (ID,FullName,password,EMAIL,DateOfBirth,UserTypeObj) VALUES ('$ID','$FullName' ,'$password','$EMAIL' ,'$DateOfBirth','$UserTypeObj')";
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
        $sql = "UPDATE  tb_users SET 'FullName' = $FullName, 'ID' = $ID   'password' =  $password , 'EMAIL' = $EMAIL ,'DateOfBirth' = $DateOfBirth  ,'UserTypeObj' = $UserTypeObj   ";
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
        $sql="DELETE FROM tb_users WHERE ID = $id";
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



}
?>