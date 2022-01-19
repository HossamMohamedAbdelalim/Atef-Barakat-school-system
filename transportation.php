<?php
include_once("My DB.php");
include_once("student.php");
include_once("transportation_details.php");
class transportation
{
    public $id;
    public $student_Obj;
    public $transport_det_Obj; 



    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select *  transportation id = $id";
            $UserDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($UserDataSet))
            {

                $this->id = $id;
                $this->student_Obj = new student();
                $this->transport_det__Obj = new stransport_det();
               
            }

        }

    }



    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
       }

       $sql = "INSERT INTO  transportation ('' ) VALUES ('$', '$')  ";
        
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
        $transport_det_Obj = $_POST['transport_det_Obj'];
        $student_det_Obj = $_POST['student_det_Obj'];
       }

       $sql = "UPDATE  transportation  SET  'id' = $id  ";
        
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

       $sql = "DELETE  FROM  transportation WHERE 'id' = '$ transportation_id'";
        
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