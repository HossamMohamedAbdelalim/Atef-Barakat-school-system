<?php
include_once 'myDB.php';
include_once("usertype.php");
include_once("tb_users.php");
include_once("user.php");
include_once("educational_yea.php");
include_once("payment.php");
class subjects_registration {
   
    public $ID;
    public $EducationalYearObj;
    public $UserObj; 
    public $DateTimeStamp;
    public $IsDeleted;
    public $PayObj; 

    function __construct($id)
    {
		global $con;
                $con = mysqli_connect("localhost", "root", "","system database");
		if ($id != -1)
		{	
			$sql="SELECT * FROM  subjects_registration WHERE ID=$id";
			$userDataSet = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($userDataSet);

            $this->ID = $id;
            $this->EducationalyearObj = new EducationalYear();
            $this->payObj = new pay();
             $this->UserObj = new User();
             $this->DateTimeStamp = $row ["DateTimeStamp"];
             $this->IsDeleted = $row ["IsDeleted"];
             $this->payObj = new pay();
                      
                        
		    }
        }
    function creat($DateTimeStamp,$EducationalyearObj ,$payObj,$UserObj,$IsDeleted,) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="INSERT INTO  subjects_registration (ID,DateTimeStamp,EducationalyearObj ,payObj,UserObj,IsDeleted) VALUES ('$ID','$DateTimeStamp', '$EducationalyearObj ' ,'$payObj','$UserObj','$IsDeleted' )";
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
        $sql = "UPDATE   subjects_registration SET 'DateTimeStamp' = $DateTimeStamp, 'ID' = $ID  ,'EducationalyearObj' =  $EducationalyearObj, 'payObj' = $payObj, 'UserObj' =  $UserObj , 'IsDeleted' = $IsDeleted   ";
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
        $sql="DELETE FROM  subjects_registration WHERE ID = $id";
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


