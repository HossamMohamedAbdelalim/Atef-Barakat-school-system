<?php
require_once 'myDB.php';
class payment {
    //put your code here
    public $ID;
    public $student_id;
    public $iscreated;             
    public $amount;
    public $paytype_id;
    public $paymentmethodoption;
            function __construct($ID)
	{
           global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        
		if ($ID !=-1)
		{	
			$sql="SELECT * FROM paymentsdetails WHERE ID=$ID";
			$StudentDataSet = mysqli_query($con,$sql) or die(mysqli_error());
			$row = mysqli_fetch_array($StudentDataSet);
                        {        
                        $this->ID=$ID;
                        $this->student_id=$row["student_id"];
                        $this->iscreated = $row["iscreated"];
                        $this->amount = $row["value"];
                        $this->paytype_id=$row["paytype_id"];
                        $this->paymentmethodoption=$row["paymentmethodoption"];
                        }
		}
        }
    function createpaymentdet($student_id,$amount,$paytype_id,$paymentmethodoption) {
       global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        
        $sql="INSERT INTO paymentsdetails(student_id,value,paytype_id,paymentmethodoption) VALUES ('$student_id','$amount','$paytype_id','$paymentmethodoption')";
        $StudentDataSet =mysqli_query($con,$sql) or die(mysql_error());
         if($StudentDataSet == TRUE)
       {
           echo " Record created succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }
    }   
    
    function deletepaymentdet($id) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        
        $sql="DELETE FROM paymentsdetails WHERE id = $id";
        mysqli_query($sql) or die(mysql_error());
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
