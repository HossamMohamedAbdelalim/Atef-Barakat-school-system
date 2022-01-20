<?php
include_once("My DB.php");
include_once("usertype.php");
include_once("tb_users.php");
include_once("user.php");
include_once("educational_yea.php");
include_once("payment.php");

class subject_registration
{
    public $ID;
    public $EducationalYearObj;
    public $UserObj; 
    public $DateTimeStamp;
    public $IsDeleted;
    public $PayObj; 
    //public $x = new DatabaseConnection();

    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from subject_registration where ID = $id";
            $UserDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($UserDataSet))
            {

                $this->ID = $id;
                $this->EducationalyearObj = new EducationalYear();
                $this->payObj = new pay();
                 $this->UserObj = new User();
                 $this->DateTimeStamp = $row ["DateTimeStamp"];
                 $this->IsDeleted = $row ["IsDeleted"];
                 $this->payObj = new pay();

            }

        }

    }

    public function creat()
    {
       if(isset($_POST['submit'])) {
        $ID = $_POST['ID'];
        $DateTimeStamp= $_POST['DateTimeStamp'];
        $IsDeleted = $_POST['IsDeleted'];
       
       }

       $sql = "INSERT INTO  subject_registration ('DateTimeStamp','IsDeleted ' ) VALUES ('$DateTimeStamp', '$IsDeleted ')  ";
        
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
        $DateTimeStamp= $_POST['DateTimeStamp'];
        $IsDeleted = $_POST['IsDeleted'];
       }

       $sql = "UPDATE  subject_registration SET 'DateTimeStamp' = $DateTimeStamp, 'ID' = $ID  ,'IsDeleted' =  $IsDeleted  ";
        
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

       $sql = "DELETE  FROM subject_registration WHERE 'ID' = '$subject_registration_id'";
        
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


