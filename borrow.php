<?php
include_once("My DB.php");
include_once("books.php");
include_once("student.php");
include_once("borrow_details.php");
class borrow
{
    public $id;
    public $bookObj;
    public $book_detObj;
    public $studentObj;
 

    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from borrow where id = $id";
            $borrowDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($borrowDataSet))
            {

                $this->id = $id;
                $this->bookObj = new book();
                $this->book_detObj = new book_det();
                $this->studentObj = new student();
               
            }

        }

    }

    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
      
       }

       $ $sql = "INSERT INTO  borrow ( ) VALUES ()  ";
        
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
       }

       $sql = "UPDATE   borrow  SET  'id' = $id   ";
        
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
       $borrow_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM borrow  WHERE 'id' = '$borrow_id'";
        
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


