<?php
include_once("My DB.php");
include_once("book.php");
include_once("categories_type.php");
include_once("duration.php");
class borrow_details
{
    public $id;
    public $bookObj;
    public $categoriestypeObj;  
    public $durationObj;
    public $created;
   

    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from   borrow_details  where id = $id";
            $borrow_detailsDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($borrow_detailsDataSet))
            {
                $this->id = $id;
              $this->bookObj = new book();
              $this->categoriestypeObj= new categoriestype();
              $this->durationObj= new duration();
              $this->created= $row ["created"];
            }

        }

    }

    public function creat()
    {
       if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $created =  $_POST['created'];
       }

       $sql = "INSERT INTO  borrow_details  ('created ') VALUES ('$created ')  ";
        
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
        $created =  $_POST['created'];
       }

       $sql = "UPDATE  borrow_details SET 'id' = $id,'created' = created ";
        
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
       $borrow_details_id = $_GET['id'];
       
       }

       $sql = "DELETE  FROM  borrow_details  WHERE 'id' = '$borrow_details_id'";
        
       $result = DatabaseConnection::getInstance()->database_connection->query($sql);

       if($result == TRUE)
       {
           echo " Record deleted succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }


    }

   

    public static function SelectAllusersInDB()
	{
        $UserDataSet = "";
        $result = DatabaseConnection::getInstance()->database_connection->query($sql);
		$sql="select * from user order by FullName";
		$UserDataSet = mysqli_connect($sql,$result);
		
		$i=0;
		$result = "";
		while ($row = mysqli_fetch_array($UserDataSet))
		{
                    $MyObj= new user($row["Id"]);
                    $result[$i]=$MyObj;
                    $i++;
		}
		return $result;
	}


    public function register()
    {
       if(isset($_POST['submit']))
       {
        $USERNAME = $_POST['USERNAME'];
        $EMAIL = $_POST['EMAIL'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        
        if( $password ==   $confirmpassword)
        {
            $sql = "INSERT INTO user ( 'USERNAME', 'EMAIL', 'password', 'confirmpassword' ) VALUES ('$USERNAME', '$email' ,'$passward' , '$confirmpassword' )";

        }


       }

       $result = DatabaseConnection::getInstance()->database_connection->query($sql);

       if($result == TRUE)
       {
           echo " You are registered succesfully";

       }

       else {
           echo "Password not match:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }


    }


    public function login()
    {
       if(isset($_POST['submit']))
       {
        $USERNAME = $_POST['USERNAME'];
        $password = $_POST['password'];
        
            $sql = mysqli_query( " select password from user where username = '$USERNAME'");
            
            $result = DatabaseConnection::getInstance()->database_connection->query($sql);
            if($row = mysqli_fetch_array($sql))
            {
                if($password == $row['password'])
                {
                    echo " Valid Password";
                }
                else 
                echo " Invalid Password";
            }
            else 
            echo " Invalid  Username";
        
            }


      

       

    }
}

?>


