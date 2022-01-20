<?php
include_once("My DB.php");
class area_names
{
    public $id;
    public $name;
    public $areaObj;


    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from area_names where id = $id";
            $area_namesDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($area_namesDataSet))
            {

                $this->id = $id;
                $this->name = $row ["name"];
                $this->areaObj = new area();

                
            }

        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
      
       }

       $sql = "INSERT INTO  area_names ('name') VALUES ('$name')  ";
        
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
       }

       $sql = "UPDATE  area_names SET 'id' = $id , name' = $name  ";
        
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
        $area_names_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM area_names WHERE 'id' = '$area_names_id'";
        
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