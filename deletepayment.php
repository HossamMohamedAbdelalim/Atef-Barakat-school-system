<?php

include_once 'myDB.php';
include_once 'payment.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = trim($_POST("name"));
    $paytype_id = trim($_POST("paytype_id"));
    $amount= trim($_POST("amount"));
    $student_id=trim($_POST("student_id"));
    $payment=new payment(-1);
    $payment->deletepayment($id);
}

