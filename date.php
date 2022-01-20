<?php
include_once("My DB.php");
class date
{
    public $id;
    public $from_date;
    public $end_date;


    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from  date where id = $id";
            $error_messagesDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($error_messagesDataSet))
            {

                $this->id = $id;
                $this->from_date = $row ["from_date"];
                $this->end_date = $row ["end_date"];

                
            }

        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $from_date = $_POST['from_date'];
        $end_date = $_POST['end_date'];
      
       }

       $sql = "UPDATE  date  SET  'id' = $id  ,'from_date' =  $from_date, 'end_date' = $end_date ";
        
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
        $from_date = $_POST['from_date'];
        $end_date = $_POST['end_date'];
       }

       $sql = "UPDATE   date  SET  'id' = $id , 'from_date' = $from_date,  'end_date' = $end_date  ";
        
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
       $date_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM  date  WHERE 'id' = '$date_id'";
        
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