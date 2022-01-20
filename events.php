<?php
include_once("My DB.php");
include_once("event_type.php");
include_once("user.php");
class events
{
    public $id;
    public $academis_calObj;
    public $userObj;  
    public $event_typeObj;  

    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from events where id = $id";
            $eventsDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($eventsDataSet))
            {

                $this->id = $id;
                $this->academis_calObj = new academis_cal();
                $this->userObj = new user();
                $this->event_typeObj = new event_type();
            }

        }

    }

    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
       }

       $sql = "INSERT INTO  events () VALUES ()  ";
        
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
      
       }

       $sql = "UPDATE  events SET  'id' = $id   ";
        
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
       $events_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM events WHERE 'id' = '$events_id'";
        
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


