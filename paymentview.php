<?php 
	function showpaymentdetails($objpayment)
	{
		echo "student_id:" .objpayment->student_id."<br>";
		echo "iscreated:" .objpayment->iscreated."<br>";
		echo "paytype." .objpayment->paytype."<br>";
	}