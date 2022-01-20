<?php
include_once("My DB.php");
include_once("categories.php");
class books
{
    public $id;
    public $name;
    public $Publication_year;
    public $description;
    public $categoriesObj; 
    //public $x = new DatabaseConnection();

    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from books where id = $id";
            $booksDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($booksDataSet))
            {

                $this->id = $id;
                $this->name = $row ["name"];
                $this-> Publication_year= $row ["Publication_year"];
                $this->description = $row ["description"];
                 $this->categoriesObj = new categories();
            }

        }

    }

    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $Publication_year = $_POST['Publication_year'];
        $description = $_POST['description'];
       }

       $sql = "INSERT INTO  books ('name','Publication_year' , 'description ') VALUES ('$name', '$Publication_year',  $description ')  ";
        
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
        $Publication_year = $_POST['Publication_year'];
        $description = $_POST['description'];
       }

       $sql = "UPDATE  book SET  'id' = $id  ,'name' =  $name, 'Publication_year' = $Publication_year, 'description' =  $description   ";
        
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
       $book_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM book WHERE 'id' = '$book_id'";
        
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


