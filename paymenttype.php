<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of payment_type
 *
 * @author kirol
 */
include_once 'myDB.php';
include_once 'payment_options_value.php';
include_once 'payment.php';
class payment_type {
    //put your code here
    public $id;
    public $paytype;
    function __construct($id)
    {
		global $con;
                $con = mysqli_connect("localhost", "root", "","system database");
		if ($id != -1)
		{	
			$sql="SELECT * FROM payment WHERE id=$id";
			$StudentDataSet = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($StudentDataSet);
                        {
                            $this->ID=$id;
                            $this->paytype=$row["paytype"];
                        }
                       
		}
        }
    function createpayment($paytype) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="INSERT INTO payment(paytype) VALUES ('$paytype')";
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
        $sql="UPDATE INTO payment(paytype) SET paytype= $paytype";
        mysqli_query($con,$sql) or die(mysql_error());
         if($con == TRUE)
       {
           echo " Record updated succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }
    }
    
}

