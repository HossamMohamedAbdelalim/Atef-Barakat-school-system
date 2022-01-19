<?php
include_once("My DB.php");
class educational_year
{
    public $ID;
    public $Name;


    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from   educational_year   where id = $id";
            $UserDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($UserDataSet))
            {

                $this->id = $id;
                $this->name = $row ["name"];

                
            }

        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $ID = $_POST['ID'];
        $Name = $_POST['Name'];
      
       }

       $sql = "INSERT INTO  educational_year ('name') VALUES ('$name')  ";
        
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
        $ID = $_POST['ID'];
        $Name = $_POST['Name'];
       }

       $sql = "UPDATE  educational_year SET 'Name' = $Name, 'ID' = $ID   ";
        
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
       if(isset($_GET['ID'])) {
       $educational_year_id = $_GET['educational_year_id '];
       
       }

       $sql = "DELETE  FROM   educational_year    WHERE 'id' = ' educational_year_id'";
        
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