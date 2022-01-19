<?php
include_once("My DB.php");
include_once("usertype.php");
include_once("tb_users.php");
class pages
{
    public $ID;
    public $FrindlyName;
    public $LinkAdress;
    public $HTML;

    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from pages where ID = $id";
            $UserDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($UserDataSet))
            {

                $this->ID = $id;
                $this->FrindlyName = $row ["FrindlyName"];
                $this->LinkAdress = $row ["LinkAdress"];
                $this->HTMl = $row ["HTMl "];
              
            }
        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $FrindlyName = $_POST['FrindlyName'];
        $ID = $_POST['ID'];
        $LinkAdress = $_POST['LinkAdress'];
        $HTML = $_POST['HTML'];
       }

       $sql = "INSERT INTO  pages ('FrindlyName','LinkAdress' , 'HTML') VALUES ('$FrindlyName', '$LinkAdress',  $HTML')  ";
        
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
        $FriendlyName = $_POST['FriendlyName '];
        $ID = $_POST['ID'];
        $LinkAdress = $_POST['LinkAdress'];
        $HTML = $_POST['HTML'];
       }

       $sql = "UPDATE  pages SET 'FriendlyName' = $FriendlyName, 'ID' = $ID  ,'LinkAdress' =  $LinkAdress, 'HTML' = $HTML  ";
        
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
       $user_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM pages WHERE 'ID' = '$id'";
        
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