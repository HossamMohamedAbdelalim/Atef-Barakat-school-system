<?php
include_once("My DB.php");
class categoriestype
{
    public $id;
    public $nametype;


    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from driver where id = $id";
            $UserDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($UserDataSet))
            {

                $this->id = $id;
                $this->nametype= $row ["nametype"];

                
            }

        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nametype = $_POST['nametype'];
      
       }

       $sql = "INSERT INTO  categoriestype ('nametype') VALUES ('$nametype')  ";
        
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
        $nametype = $_POST['nametype'];
        $id = $_POST['id'];
       }

       $sql = "UPDATE  categoriestype SET 'name' = $nametype, 'id' = $id   ";
        
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
       $id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM categoriestype WHERE 'id' = '$categoriestype_id'";
        
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