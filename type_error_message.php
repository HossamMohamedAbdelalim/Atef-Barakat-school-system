<?php
include_once("My DB.php");
class type_error_message
{
    public $id;
    public $name;
    public $pObj;


    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from type_error_message where id = $id";
            $type_error_messageDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($type_error_messageDataSet))
            {

                $this->id = $id;
                $this->name = $row ["name"];
                $this->pObj = new p();

                
            }

        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
      
       }

       $sql = "INSERT INTO  type_error_message ('name') VALUES ('$name')  ";
        
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
        $name = $_POST['name'];
       }

       $sql = "UPDATE  type_error_message SET 'id' = $id , name' = $name ";
        
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
        $type_error_message_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM type_error_message WHERE 'id' = '$type_error_message_id'";
        
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