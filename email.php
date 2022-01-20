<?php
include_once("My DB.php");
class email
{
    public $id;
    public $email_address;
    public $pObj;


    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from email where id = $id";
            $busesDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($busesDataSet))
            {

                $this->id = $id;
                $this->email_address = $row ["email_address"];
                $this->pObj = new p();

                
            }

        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $email_address = $_POST['email_address'];
      
       }

       $sql = "INSERT INTO  email ('email_address') VALUES ('$email_address')  ";
        
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
        $id = $_POST['id'];
        $email_address = $_POST['email_address'];
       }

       $sql = "UPDATE  email SET 'id' = $id , email_address' = $email_address  ";
        
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
        $email_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM email WHERE 'id' = '$email_id'";
        
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