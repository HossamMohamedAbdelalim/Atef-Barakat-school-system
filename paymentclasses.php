<?php
class typeofpayment{
	public paytype_id;
	public paytype;
	function __construct ($id)
	{
			$con = mysqli_connect("localhost", "root", "","student");
			if (!$con)
				{
					die('Could not connect: ' . mysqli_error());
				}
			$sql ="select *from typeofpayment where paytype_id=$id"; 
			$paymentDataSet = mysqli_query($con,$sql) or die(mysqli_error());
			if($row = mysqli_fetch_array($paymentDataSet)
			{
				this->paytype_id=$row["paytype_id"];
				this->paytype=$row["paytype"];
			}
	}
		

class paymentdetails {
	public $id;
	public $studentid;
	public $iscreated;
	public $amount;
	public $paytypeobj;
	
	function insert($id,$studentid,$iscreated,$amount,$typeofpayment)
	{
			$con = mysqli_connect("localhost", "root", "","student");
			if (!$con)
				{
					die('Could not connect: ' . mysqli_error());
				}
			$sql ="INSERT INTO `paymentsdetails` (id, student_id, iscreated, amount, paytype_id) VALUES($id, $student_id, $iscreated,$amount,$typeofpayment)"; 
			$paymentDataSet = mysqli_query($con,$sql) or die(mysql_error());
		
	}	
		function update($id,$studentid,$iscreated,$amount,$typeofpayment){
				$con = mysqli_connect("localhost", "root", "","student");
				if (!$con)
				{
					die('Could not connect: ' . mysqli_error());
				}
			$sql ="UPDATE paymentsdetails SET iscreated= :iscreated,amount= :amount,typeofpayment= :typeofpayment WHERE id= :id"; 
			$paymentDataSet = mysqli_query($con,$sql) or die(mysql_error());
			
		
		}
				function delete($id){
				$con = mysqli_connect("localhost", "root", "","student");
				if (!$con)
				{
					die('Could not connect: ' . mysqli_error());
				}
			$sql ="DELETE from paymentdetails WHERE id= :id";			
			$paymentDataSet = mysqli_query($con,$sql) or die(mysql_error());
			
		
		}
		
	function __construct ($id)
	{
		if(!$id=="")
		{
			$con = mysqli_connect("localhost", "root", "","student");
			if (!$con)
				{
					die('Could not connect: ' . mysqli_error());
				}
			$sql ="select *from paymentdetails where id=$id"; 
			$paymentDataSet = mysqli_query($con,$sql) or die(mysql_error());
			if($row = mysqli_fetch_array($paymentDataSet)
			{
				this->studentid=$row["studentid"];
				this->iscreated=$row["iscreated"];
				this->amount=$row["amount"];
				this->paytypeobj=new typeofpayment($row["paytype_id"]);
			} 
		}
	}
				
?>