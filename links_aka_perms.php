<?php
include_once("My DB.php");
class links_aka_perms
{
    public $ID;
    public $FRINDLYNAME;
    public $ADDRESS;
 

    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from links_aka_perms where id = $id";
            $links_aka_permsDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($links_aka_permssDataSet))
            {

                $this->id = $id;
                $this->FRINDLYNAME = $row ["FRINDLYNAME"];
                $this->ADDRESS = $row ["ADDRESS"];
               
            }

        }

    }

    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $FRINDLYNAME  = $_POST['FRINDLYNAME '];
        $ADDRESS  = $_POST['ADDRESS '];
      
       }

       $ $sql = "INSERT INTO  links_aka_perms ('FRINDLYNAME ','ADDRESS ' ) VALUES ('$FRINDLYNAME ', '$ADDRESS ')  ";
        
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
        $FRINDLYNAME  = $_POST['FRINDLYNAME '];
        $ADDRESS  = $_POST['ADDRESS '];
       }

       $sql = "UPDATE   links_aka_perms SET  'id' = $id  ,'FRINDLYNAME ' =  $FRINDLYNAME  ,'ADDRESS ' =  $ADDRESS  ";
        
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
       $links_aka_perms_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM links_aka_perms WHERE 'id' = '$links_aka_perms_id'";
        
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


