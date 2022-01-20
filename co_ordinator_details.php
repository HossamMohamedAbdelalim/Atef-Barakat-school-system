<?php
include_once("My DB.php");
class co_ordinator_details
{
    public $id;
    public $co_ordinator_name;


    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from co_ordinator_details where id = $id";
            $co_ordinator_detailsDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($co_ordinator_detailsDataSet))
            {

                $this->id = $id;
                $this->co_ordinator_name = $row ["co_ordinator_name"];

                
            }

        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $co_ordinator_name = $_POST['co_ordinator_name'];
      
       }

       $sql = "INSERT INTO  co_ordinator_details ('co_ordinator_name') VALUES ('$co_ordinator_name')  ";
        
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
        $co_ordinator_name = $_POST['co_ordinator_name'];
        $id = $_POST['id'];
       }

       $sql = "UPDATE  co_ordinator_details SET 'co_ordinator_name' = $co_ordinator_name, 'id' = $id   ";
        
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
        $co_ordinator_details_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM co_ordinator_details WHERE 'id' = '$co_ordinator_details_id'";
        
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