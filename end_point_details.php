<?php
include_once("My DB.php");
class end_point_details
{
    public $id;
    public $end_point_name;
 

    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from end_point_details where id = $id";
            $end_point_detailsDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($end_point_detailsDataSet))
            {

                $this->id = $id;
                $this->end_point_name = $row ["end_point_name"];
               
            }

        }

    }

    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $end_point_name = $_POST['end_point_name'];
      
       }

       $sql = "INSERT INTO  end_point_details ('end_point_name') VALUES ('$end_point_name')  ";
        
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
        $end_point_name = $_POST['end_point_name'];
       }

       $sql = "UPDATE  end_point_details SET  'id' = $id  ,'end_point_name' =  $end_point_name ";
        
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
       $end_point_details_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM end_point_details WHERE 'id' = '$end_point_details_id'";
        
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


