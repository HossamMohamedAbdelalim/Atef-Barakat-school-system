<?php
include_once("My DB.php");
class start_point_details
{
    public $id;
    public $start_point_name;
 

    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from start_point_details where id = $id";
            $start_point_detailsDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($start_point_detailsDataSet))
            {

                $this->id = $id;
                $this->start_point_name = $row ["start_point_name"];
               
            }

        }

    }

    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $start_point_name = $_POST['start_point_name'];
      
       }

       $sql = "INSERT INTO  start_point_details ('start_point_name') VALUES ('$start_point_name')  ";
        
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
        $start_point_name = $_POST['start_point_name'];
       }

       $sql = "UPDATE  start_point_details SET  'id' = $id  ,'start_point_name' =  $start_point_name ";
        
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
       $start_point_details_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM start_point_details WHERE 'id' = '$start_point_details_id'";
        
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


