<?php
include_once("My DB.php");
include_once("teacher.php");
class subjects
{
    public $ID;
    public $SUBJECT_NAME;
    public $SUBJECT_CODE;
    public $GRADE;
    public $DESCRIPTION;
    public $teacherObj; 

    
    function __construct($id)
    {
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
            
        if($id !="")
        {
            $sql="select * from subjects where ID = $id";
            $subjectsDataSet = mysqli_query($sql)  or die (mysqli_error());
            if($row = mysqli_fetch_array($subjectsDataSet))
            {

                $this->ID = $id;
                $this->SUBJECT_NAME = $row ["SUBJECT_NAME"];
                $this->SUBJECT_CODE = $row ["SUBJECT_CODE"];
                $this->GRADE = $row ["GRADE"];
                $this->DESCRIPTION = $row ["DESCRIPTION"];
                $this->teacherObj = new teacher();
            }

        }

    }

    public function creat()
    {
       if(isset($_POST['submit'])) {
        $ID = $_POST['ID'];
        $SUBJECT_NAME = $_POST['SUBJECT_NAME'];
        $SUBJECT_CODE = $_POST['SUBJECT_CODE'];
        $GRADE = $_POST['GRADE'];
        $DESCRIPTION = $_POST['DESCRIPTION'];
       }

       $sql = "INSERT INTO   subjects ('SUBJECT_NAME','SUBJECT_CODE' , 'GRADE', 'DESCRIPTION ') VALUES ('$SUBJECT_NAME', '$SUBJECT_CODE',  $GRADE', '$DESCRIPTION ' )  ";
        
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
        $SUBJECT_NAME = $_POST['SUBJECT_NAME'];
        $SUBJECT_CODE = $_POST['SUBJECT_CODE'];
        $GRADE = $_POST['GRADE'];
        $DESCRIPTION = $_POST['DESCRIPTION'];
       }

       $sql = "UPDATE  subjects SET  'ID' = $ID  ,'SUBJECT_NAME' =  $SUBJECT_NAME, 'SUBJECT_CODE' = $SUBJECT_CODE, 'GRADE' =  $GRADE , 'DESCRIPTION ' = $DESCRIPTION    ";
        
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
       if(isset($_GET['ID'])) {
       $subjects_id = $_GET['ID'];
       
       }

       $sql = "DELETE  FROM subjects WHERE 'ID' = '$subjects_id'";
        
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


