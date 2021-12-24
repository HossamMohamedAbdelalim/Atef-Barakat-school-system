<?php
include_once ("paymentclasses.php");
include_once ("payview.php");
 
 if(isset(_REQUEST["id"]))
 {
	 paytypeobj=new paymentdetails(_REQUEST["id"]);
	 $v=new payview();
	 $v->showpaymentgdetails($paymenttype);
 }
 if(_REQUEST["command"]=="insert")
 {
	 $paytypeobj= new paymentdetails();
	 $paytypeob->insert($_REQUEST["student_id"],$_REQUEST["iscreated"],$_REQUEST["paytype"];
 }
  if(_REQUEST["command"]=="update")
  {
	  echo "record updated.<br></br>";
	  
  }
   if(_REQUEST["command"]=="delete")
   {
	   echo "record deleted.<br></br>";
   }
 
?>