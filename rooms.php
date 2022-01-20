<?php
include_once("My DB.php");
class rooms
{
    public $id;
    public $number;
    public $pObj;


    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from rooms where id = $id";
            $roomsDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($roomsDataSet))
            {

                $this->id = $id;
                $this->number = $row ["number"];
                $this->pObj = new p();

                
            }

        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $number = $_POST['number'];
      
       }

       $sql = "INSERT INTO  rooms ('number') VALUES ('$number')  ";
        
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
        $number = $_POST['number'];
       }

       $sql = "UPDATE  rooms SET 'id' = $id , number' = $number  ";
        
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
        $rooms_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM rooms WHERE 'id' = '$rooms_id'";
        
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