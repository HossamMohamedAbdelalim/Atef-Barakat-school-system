<?php
require_once("system database");
require_once("My DB.php");
 abstract class user
{
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
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from User where ID = $id";
            $UserDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($UserDataSet))
            {

                $this->id = $id;
                $this->FullName = $row ["FullName"];
                $this->USERNAME = $row ["USERNAME"];
                $this->EMAIL = $row ["EMAIL"];
                $this->password = $row ["Password"];
                $this-> Address = $row ["Address"];
                $this->DOB = $row ["DOB"];
             // $this->USERTYPEObj = new USERTYPE();
             // $this->LINKObj = new LINK();
            }
           

            

        }

    }

    public function creat()
    {
       if(isset($_POST['submit'])) {
        $FullName = $_POST['FullName'];
        $ID = $_POST['ID'];
        $DOB = $_POST['DOB'];
        $USERNAME = $_POST['USERNAME'];
        $password = $_POST['password'];
        $Address = $_POST['Address'];
        $EMAIL = $_POST['EMAIL'];
       }

       $sql = "INSERT INTO  'User' ('FullName','DOB' , 'USERNAME', 'password', 'Address', 'EMAIL') VALUES ('$FullName', '$DOB',  $USERNAME', '$password' , ' $Address', '  $EMAIL')  ";
        
       $result = DatabaseConnection::getInstance()->database_connection->query($sql);

       if($result == TRUE)
       {
           echo "New record created succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }


    }

   

    public function update()
    {
       if(isset($_POST['update'])) {
        $FullName = $_POST['FullName'];
        $ID = $_POST['ID'];
        $DOB = $_POST['DOB'];
        $USERNAME = $_POST['USERNAME'];
        $password = $_POST['password'];
        $Address = $_POST['Address'];
        $EMAIL = $_POST['EMAIL'];
       }

       $sql = "UPDATE  'User' SET 'FullName' = $FullName, 'ID' = $ID  ,'DOB' =  $DOB, 'USERNAME' = $USERNAME, 'password' =  $password , 'Address' = $Address, 'EMAIL' = $EMAIL   ";
        
       $result = DatabaseConnection::getInstance()->database_connection->query($sql);

       if($result == TRUE)
       {
           echo "New record Updated succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }


    }


    public function delete()
    {
       if(isset($_GET['id'])) {
       $user_id = $_GET['id'];
       
       }

       $sql = "DELETE  FRoM 'User' WHERE 'id' = '$user_id'";
        
       $result = DatabaseConnection::getInstance()->database_connection->query($sql);

       if($result == TRUE)
       {
           echo " Record deleted succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }


    }

   

    public static function SelectAllusersInDB()
	{
        $UserDataSet = "";
        $result = DatabaseConnection::getInstance()->database_connection->query($sql);
		$sql="select * from User order by FullName";
		$UserDataSet = mysqli_connect($sql) ;
		
		$i=0;
		$result = "";
		while ($row = mysqli_fetch_array($UserDataSet))
		{
			$MyObj= new user($row["Id"]);
			$result[$i]=$MyObj;
			$i++;
		}
		return $result;
		
	}


    public function register()
    {
       if(isset($_POST['submit']))
       {
        $USERNAME = $_POST['USERNAME'];
        $EMAIL = $_POST['EMAIL'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        
        if( $password ==   $confirmpassword)
        {
            $sql = "INSERT INTO 'user'  ( 'USERNAME', 'EMAIL', 'password', 'confirmpassword' ) VALUES ('$USERNAME', '$email' ,'$passward' , '$confirmpassword' )";

        }


       }

       $result = DatabaseConnection::getInstance()->database_connection->query($sql);

       if($result == TRUE)
       {
           echo " You are registered succesfully";

       }

       else {
           echo "Password not match:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }


    }

}




?>