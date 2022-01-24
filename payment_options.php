<?php

class payment_options {
    //put your code here
    public $ID;
    public $payment_id;
    public $option_id;
 
            
        function __construct($ID)
	{
		global $con;
                $con = mysqli_connect("localhost", "root", "","system database");
		if ($ID != -1)
		{	
			$sql="SELECT * FROM payment_options WHERE ID=$ID";
			$StudentDataSet = mysqli_query($con,$sql) or die(mysql_error());
			$row = mysqli_fetch_array($StudentDataSet);
                        $this->ID=$ID;
                        $this->payment_id=$row["payment_id"];
                        $this->option_id = $row["option_id"];
                       
		}
        }
    function createpayment() {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="INSERT INTO payment_options(payment_id,option_id) VALUES ('$payment_id','$option_id')";
        mysqli_query($con,$sql) or die(mysql_error());
         if($con == TRUE)
       {
           echo " Record created succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }
    }   
    function updatepayment($id) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="UPDATE INTO payment_options(payment_id,option_id) SET payment_id = $payment_id ,option_id= $option_id";
        mysqli_query($con,$sql) or die(mysql_error());
         if($con == TRUE)
       {
           echo " Record updated succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }
    }
    function deletepayment($id) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="DELETE FROM payment_options WHERE id = $id";
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
