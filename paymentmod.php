require_once("system database");
require_once("My DB.php");
<?php
class typeofpayment{
	public $paytype_id;
	public $paytype;
	function __construct ($id)
	{
			$con = mysqli_connect("localhost", "root", "","system database");
			if (!$con)
				{
					die('Could not connect: ' . mysqli_error());
				}
			$sql ="insert INTO typeofpayment SET where paytype_id=$id"; 
			$paymentDataSet = mysqli_query($con,$sql) or die(mysqli_error());
			if($row = mysqli_fetch_array($paymentDataSet))
			{
				this->paytype_id=$id;
				this->paytype=$row["paytype"];
			}
	}
}




/* NOTE : BOTH WAYS ARE ELIGIBLE UP AND DOWN, CONFIG(Array Of Arrays to store data more private and secure and faster) or DATABASE TABLE for paymentType/**/
$config = array(
	'paymentType' => array( // vocations, format: ID_of_vocation => 'Name of Character to copy'
		1 => 'Cash',
		2 => 'Debit/Credit Card',
		3 => 'Paypal',
		4 => 'BTC/CRYPTO',
		));

class paymentdetails {
	public $id;
	public $studentid;
	public $iscreated;
	public $amount;
	public $paytypeobj;
	
	function create($student_id,$iscreated,$paytype)
	{       
	 if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $student_id = $_POST['student_id'];
        $iscreated = $_POST['iscreated'];
        $amount = $_POST['amount'];
        $paytype_id = $_POST['paytype_id'];
	}	
	       	$sql ="INSERT INTO `paymentsdetails` (id, student_id, iscreated, amount, paytype_id) VALUES($id, $student_id, $iscreated,$amount,$typeofpayment)"; 
			$result = DatabaseConnection::getInstance()->database_connection->query($sql);
	
       if($result == TRUE)
       {
           echo "New record Updated succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }

			
		
	}	
		function update(){
			if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $student_id = $_POST['student_id'];
        $iscreated = $_POST['iscreated'];
        $amount = $_POST['amount'];
        $paytype_id = $_POST['paytype_id'];
			}
				
			$sql ="UPDATE paymentsdetails SET iscreated= :iscreated,amount= :amount,typeofpayment= :typeofpayment WHERE id= :id"; 
			$result = DatabaseConnection::getInstance()->database_connection->query($sql);

			
       if($result == TRUE)
       {
           echo "New record Updated succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }
		
		}
				function delete($id){
				if(isset($_GET['id'])) {
				$id = $_GET['id'];
			$sql ="DELETE from paymentdetails WHERE id= :id";			
			$result = DatabaseConnection::getInstance()->database_connection->query($sql);
		if($result == TRUE)
       {
           echo " Record deleted succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }


			
		
		}
		
	function __construct ($id)
	{
		 $stmt = DatabaseConnection::getInstance()->database_connection-> prepare();
		if(!$id=="")
		{		
			$sql ="select *from paymentdetails where id=$id"; 
			$paymentDataSet = mysqli_query($con,$sql) or die(mysql_error());
			if($row = mysqli_fetch_array($paymentDataSet))
			{
				this->studentid=$row["studentid"];
				this->iscreated=$row["iscreated"];
				this->amount=$row["amount"];
				this->paytypeobj=new typeofpayment($row["paytype_id"]);
			} 
		}
	}
}		
?>
