<?php
include_once("My DB.php");
include_once("usertype.php");
include_once("pages.php");
class usertype
{
    public $ID;
    public $USERTYPEObj;
    public $Page_ID;


    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from usertype_pages where ID = $id";
            $UserDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($UserDataSet))
            {

                $this->ID = $id;
                $this->USERTYPEObj = new USERTYPE();
                $this->Page_IDObj= new Page_ID();
            }
        
        }

    }


    public function creat()
    {
       if(isset($_POST['submit'])) {
        $ID = $_POST['ID'];
       }

       $sql = "INSERT INTO  usertype_pages ('FullName','DOB' , 'USERNAME', 'password', 'Address', 'EMAIL') VALUES ('$FullName', '$DOB',  $USERNAME', '$password' , ' $Address', '  $EMAIL')  ";
        
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
        $ID = $_POST['ID'];
       }

       $sql = "UPDATE  usertype_pages SET  'ID' = $ID     ";
        
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

       $sql = "DELETE  FROM usertype_pages WHERE 'id' = '$user_id'";
        
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