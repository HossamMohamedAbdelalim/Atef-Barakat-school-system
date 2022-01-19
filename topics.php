<?php
include_once("My DB.php");
class topics
{
    public $id;
    public $name;


    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from topics where id = $id";
            $UserDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($UserDataSet))
            {

                $this->id = $id;
                $this->name = $row ["name"];

                
            }

        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
      
       }

       $sql = "INSERT INTO  topics ('name') VALUES ('$name')  ";
        
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
        $name = $_POST['name'];
        $id = $_POST['id'];
       }

       $sql = "UPDATE  topics SET 'name' = $name, 'id' = $id   ";
        
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

       $sql = "DELETE  FROM topics WHERE 'id' = '$topics_id'";
        
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