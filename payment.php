<?php

class payment {
    //put your code here
    public $ID;
    public $student_id;
    public $iscreated;
    public $amount;
    public $paytype_id;
            
        function __construct($id)
	{
		global $con;
                $con = mysqli_connect("localhost", "root", "","system database");
		if ($id != -1)
		{	
			$sql="SELECT * FROM paymentsdetails WHERE id=$id";
			$StudentDataSet = mysqli_query($con,$sql) or die(mysql_error());
			$row = mysqli_fetch_array($StudentDataSet);
                        $this->ID=$id;
                        $this->student_id=$row["student_id"];
                        $this->iscreated = $row["iscreated"];
                        $this->amount = $row["amount"];
                        $this->paytype_id=$row["paytype_id"];
                       
		}
        }
    function createpayment() {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="INSERT INTO paymentsdetails(id,student_id,iscreated,amount,paytype_id) VALUES ('$id','$student_id','$iscreated','$amount','$paytype_id')";
        mysqli_query($con,$sql) or die(mysql_error());
    }   
    function updatepayment($id) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="UPDATE INTO paymentsdetails(id,student_id,iscreated,amount,paytype_id) SET amount = $amount ,paytype_id= $paytype_id)";
        mysqli_query($con,$sql) or die(mysql_error());
    }
    function deletepayment($id) {
        global $con;
        $con = mysqli_connect("localhost", "root", "","system database");
        $sql="DELETE FROM paymentsdetails WHERE id = $id";
        mysqli_query($con,$sql) or die(mysql_error());
    }
    
}

