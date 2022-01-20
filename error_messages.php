<?php
include_once("My DB.php");
include_once("type_error_message.php");
class error_messages
{
    public $id;
    public $message;
    public $type_errorObj;


    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from error_messages where id = $id";
            $error_messagesDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($error_messagesDataSet))
            {

                $this->id = $id;
                $this->message = $row ["message"];
                $this->type_errorObj = new type_error();

                
            }

        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $message = $_POST['message'];
      
       }

       $sql = "INSERT INTO  error_messages ('message') VALUES ('$message')  ";
        
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
        $message = $_POST['message'];
        $id = $_POST['id'];
       }

       $sql = "UPDATE  error_messages SET 'message' = $message, 'id' = $id   ";
        
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
       $error_messages_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM error_messages WHERE 'id' = '$error_messages_id'";
        
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