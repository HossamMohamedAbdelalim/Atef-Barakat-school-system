<?php
class usertype
{
    public $ID;
    public $NAME;
    public $p_id;

    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from user where ID = $id";
            $UserDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($UserDataSet))
            {

                $this->ID = $id;
                $this->NAME = $row ["NAME"];
                $this->p_id = $row ["p_id"];
            }
           
        }

    }


    public function creat()
    {
       if(isset($_POST['submit'])) {
        $NAME = $_POST['NAME'];
        $ID = $_POST['ID'];
        $p_id = $_POST['p_id'];
       }

       $sql = "INSERT INTO  usertype ('NAME','p_id' ) VALUES ('$NAME', '$p_id')  ";
        
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
        $NAME = $_POST['NAME'];
        $ID = $_POST['ID'];
        $p_id = $_POST['p_id'];
       }

       $sql = "UPDATE  usertype SET 'NAME' = $NAME, 'ID' = $ID  ,'p_id' =  $p_id  ";
        
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
       $usertype_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM usertype WHERE 'id' = '$usertype_id'";
        
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