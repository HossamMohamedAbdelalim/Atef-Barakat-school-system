<?php
include_once("My DB.php");
class buses
{
    public $id;
    public $number;


    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from buses where id = $id";
            $busesDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($busesDataSet))
            {

                $this->id = $id;
                $this->number = $row ["number"];

                
            }

        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $number = $_POST['number'];
      
       }

       $sql = "INSERT INTO  buses ('number') VALUES ('$number')  ";
        
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
        $number = $_POST['number'];
        $id = $_POST['id'];
       }

       $sql = "UPDATE  buses SET 'number' = $number, 'id' = $id   ";
        
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
        $buses_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM buses WHERE 'id' = '$buses_id'";
        
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