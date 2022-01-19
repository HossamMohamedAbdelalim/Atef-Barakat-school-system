<?php
include_once("My DB.php");
include_once("user.php");
include_once("usertype.php");
class tb_users
{
    public $ID;
    public $FullName;
    public $Email;
    public $Password;
    public $DateOfBirth;
    public $UserType_id;

    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from user where ID = $id";
            $Tb_usersDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($Tb_usersDataSet ))
            {

                $this->ID = $id;
                $this->FullName = $row ["FullName"];
                $this->Email = $row ["Email"];
                $this->password = $row ["Password"];
                $this->DateOfBirth = $row ["DateOfBirth"];
                $this->UserTypeObj = new UserType();
            }
           
        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $FullName = $_POST['FullName'];
        $ID = $_POST['ID'];
        $DateOfBirth = $_POST['DateOfBirth '];
        $password = $_POST['password'];
        $Email = $_POST['Email'];
       }

       $sql = "INSERT INTO  tb_users ('FullName','DateOfBirth' , 'password', 'Email') VALUES ('$FullName', '$DateOfBirth', '$password' ,  '  $Email')  ";
        
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
        $DateOfBirth = $_POST['DateOfBirth'];
        $password = $_POST['password'];
        $Email = $_POST['Email'];
       }

       $sql = "UPDATE  tp_users SET 'FullName' = $FullName, 'ID' = $ID  ,'DateOfBirth' =   $DateOfBirth, 'password' =  $password , 'Email' = $Email   ";
        
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
       $Tb_users_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM tb_users WHERE 'id' = '  $Tb_users_id'";
        
       $result = DatabaseConnection::getInstance()->database_connection->query($sql);

       if($result == TRUE)
       {
           echo " Record deleted succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }


    }



}
?>