<?php

include_once 'myDB.php';
include_once 'payment.php';
include_once 'payment_options_value.php';
include_once 'payment_options.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $paytype_id = 1;
    $amount= trim($_POST["cardname"]);
    $student_id=trim($_POST["id"]);
    $paymentmethodoption=3;
    $payment=new payment_options_value(-1);
    $payment->createpaymentopt($paymentmethodoption, $student_id, $student_id, $paytype_id);
    $paytype_id = 1;
    $amount= trim($_POST["cardnumber"]);
    $student_id=trim($_POST["id"]);
    $paymentmethodoption=4;
    $payment->createpaymentopt($paymentmethodoption, $student_id, $student_id, $paytype_id);
    $paytype_id = 1;
    $amount= trim($_POST["expmonth"]);
    $student_id=trim($_POST["id"]);
    $paymentmethodoption=2;
    $payment->createpaymentopt($paymentmethodoption, $student_id, $student_id, $paytype_id);
   $paytype_id = 1;
    $amount= trim($_POST["cvv"]);
    $student_id=trim($_POST["id"]);
    $paymentmethodoption=1;
    $payment->createpaymentopt($paymentmethodoption, $student_id, $student_id, $paytype_id);
   $paytype_id = 1;
    $amount= trim($_POST["amount"]);
    $student_id=trim($_POST["id"]);
    $paymentmethodoption=0;
    $payment->createpaymentopt($paymentmethodoption, $student_id, $student_id, $paytype_id);
   
}