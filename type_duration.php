<?php
include_once("My DB.php");
class type_duration
{
    public $id;
    public $duration;


    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from type_duration where id = $id";
            $type_durationDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($type_durationDataSet))
            {

                $this->id = $id;
                $this->duration = $row ["duration"];

                
            }

        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $duration = $_POST['duration'];
      
       }

       $sql = "INSERT INTO  type_duration ('duration') VALUES ('$duration')  ";
        
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
        $duration = $_POST['duration'];
       }

       $sql = "UPDATE  type_duration SET 'id' = $id , duration' = $duration ";
        
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
        $type_duration_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM type_duration WHERE 'id' = '$type_duration_id'";
        
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