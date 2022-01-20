<?php
include_once("My DB.php");
class duration_type_events
{
    public $id;
    public $name;
    public $duration;

    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from duration_type_events where id = $id";
            $duration_type_eventsDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($duration_type_eventsDataSet))
            {

                $this->id = $id;
                $this->name = $row ["name"];
                $this->duration = $row ["duration"];
            }

        }

    }

    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $duration= $_POST['duration'];
       }

       $sql = "INSERT INTO  duration_type_events ('name','duration' ) VALUES ('$name', '$duration')  ";
        
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
        $duration= $_POST['duration'];
       }

       $sql = "UPDATE  duration_type_events SET  'id' = $id  ,'name' =  $name, 'duration' = $duration ";
        
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
       $duration_type_events_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM duration_type_events WHERE 'id' = '$duration_type_events_id'";
        
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


