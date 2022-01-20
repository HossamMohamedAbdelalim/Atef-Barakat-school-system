<?php
include_once("My DB.php");
class payment
{
    public $id;
    public $paytype;


    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from payment where id = $id";
            $paymentDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($paymentDataSet))
            {

                $this->id = $id;
                $this->paytype = $row ["paytype"];

                
            }

        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $paytype = $_POST['paytype'];
      
       }

       $sql = "INSERT INTO  payment ('paytype') VALUES ('$paytype')  ";
        
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
        $paytype = $_POST['paytype'];
        $id = $_POST['id'];
       }

       $sql = "UPDATE  payment SET 'paytype' = $paytype, 'id' = $id   ";
        
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
        $payment_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM payment WHERE 'id' = '$payment_id'";
        
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