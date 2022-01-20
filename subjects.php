<?php
include_once 'myDB.php';
include_once("teacher.php");
class subjects {
    public $ID;
    public $SUBJECT_NAME;
    public $SUBJECT_CODE;
    public $GRADE;
    public $DESCRIPTION;
    public $teacherObj; 

    function __construct($id)
    {
		global $con;
                $con = mysqli_connect("localhost", "root", "","system database");
		if ($id != -1)
		{	
			$sql="SELECT * FROM  subjects WHERE ID=$id";
			$userDataSet = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($userDataSet);

            $this->ID = $id;
            $this->SUBJECT_NAME = $row ["SUBJECT_NAME"];
            $this->SUBJECT_CODE = $row ["SUBJECT_CODE"];
            $this->GRADE = $row ["GRADE"];
            $this->DESCRIPTION = $row ["DESCRIPTION"];
            $this->teacherObj = new teacher();
                      
                      
                        
		    }
        }
    function creat($FullName,$USERNAME,$password,$DOB) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="INSERT INTO  subjects (ID,SUBJECT_NAME,SUBJECT_CODE ,GRADE,DESCRIPTION,teacherObj) VALUES ('$ID','$SUBJECT_NAME', '$SUBJECT_CODE ' ,'$GRADE','$DESCRIPTION','$teacherObj' )";
        mysqli_query($con,$sql);
         if($con == TRUE)
       {
           echo " Record created succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }
    }   
    function update($id) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql = "UPDATE   subjects SET 'SUBJECT_NAME' = $SUBJECT_NAME, 'ID' = $ID  ,'SUBJECT_CODE' =  $SUBJECT_CODE, 'GRADE' = $GRADE, 'DESCRIPTION' =  $DESCRIPTION , 'teacherObj' = $teacherObj   ";
        mysqli_query($con,$sql) or die(mysql_error());
         if($con == TRUE)
       {
           echo " Record updated succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }
    }

    function delete($id) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="DELETE FROM  subjects WHERE ID = $id";
        mysqli_query($con,$sql) or die(mysql_error());
         if($con == TRUE)
       {
           echo " Record deleted succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }
    }
    
}


?>


