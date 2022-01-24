<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of payment_options_value
 *
 * @author kirol
 */
include_once 'register.php';
include_once 'paymenttype.php';
include_once 'myDB.php';
class payment_options_value {
    //put your code here
    public $ID;
    public $payments_option_id;
    public $reg_id;
    public $value;
    public $paytype_id;
            
        function __construct($ID)
	{	global $con;
                $con = mysqli_connect("localhost", "root", "","system database");
		if ($ID != -1)
		{	
			$sql="SELECT * FROM payment_options_value WHERE ID=$ID";
			$StudentDataSet = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($StudentDataSet);
                        $this->ID=$ID;
                        $this->student_id=$row["payments_option_id"];
                        $this->reg_id = new register($row["reg_id"]);
                        $this->value = $row["value"];
                        $this->paytype_id=new payment_type($row["payment_id"]);
		}
        }
    function createpaymentopt($payments_option_id,$reg_id,$value,$paytype_id) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="INSERT INTO payment_options_value(payments_option_id,reg_id,value,paytype_id) VALUES ('$payments_option_id','$reg_id','$value','$paytype_id')";
        mysqli_query($con,$sql);
        if($con == TRUE)
       {
           echo " Record created succesfully2";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }
    }   
    function updatepaymentopt($ID) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="UPDATE INTO payment_options_value(id,student_id,iscreated,amount,paytype_id) SET amount = $amount ,paytype_id= $paytype_id";
        mysqli_query($con,$sql) or die(mysql_error());
         if($con == TRUE)
       {
           echo " Record updated succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }
    }
    function deletepaymentopt($id) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="DELETE FROM payment_options_value WHERE id = $id";
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
$pa=new payment_options_value(3);
$pa->createpaymentopt('1','2','200','1');
echo $pa->createpaymentopt('1','2','200','1');