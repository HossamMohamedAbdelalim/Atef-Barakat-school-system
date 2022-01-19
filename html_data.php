<?php
include_once("My DB.php");
include_once("parent.php");
class html_data
{
    public $id;
    public $link;
    public $parent_Obj;
    public $htmldata; 



    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from html_data where ID = $id";
            $UserDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($UserDataSet))
            {

                $this->id = $id;
                $this->link = $row ["FullName"];
                $this->parent_Obj = new parent();
                $this->htmldata = $row ["htmldata "];;
            }

        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $link = $_POST['link '];
        $id = $_POST['id'];
        $htmldata = $_POST['htmldata'];
       }

       $sql = "INSERT INTO  html_data ('link','htmldata' ) VALUES ('$link', '$htmldata')  ";
        
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
        $link = $_POST['link'];
        $id = $_POST['id'];
        $htmldata = $_POST['htmldata'];
       }

       $sql = "UPDATE  html_data  SET 'link' = $link, 'id' = $id  ,'htmldata' =  $htmldata";
        
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
       $html_data_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM html_data WHERE 'id' = '$html_data_id'";
        
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