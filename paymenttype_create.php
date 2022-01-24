<?php
include_once 'myDB.php';
include_once 'paymenttype.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $paytype = trim($_POST("paytype"));
    $payment=new payment(-1);
    $payment->createpayment($paytype);
}