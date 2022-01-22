<?php 
abstract class payment
{

public function paycash()
{
    return'payment with cash';
}
public function payvisa()
{
    return 'payment with visa';
}
public function pay_paypal()
{
    return 'pay with paypal';
}
protected abstract function type();
protected abstract function step1();
protected abstract function step2();
protected abstract function step3();
}


class paymentwithcash extends payment
{
    public function type(){
        return 'cash';
        
    }
    public function step1()
    {
        return'go to the bank in school';
    }
    public function step2()
    {
        return 'pay the cash';
    }
    public function step3()
    {
        return 'take your paper and submit it to register in courses';
    }
}
class paymentwithvisa extends payment
{
    public function type(){
        return 'visa';
    
    }
    public function step1(){
        return 'enter your visa card details';
    }
    public function step2(){
        return 'validate your visa and pay';
    }
    public function step3(){
        return 'transaction completed go register courses ';
    }
}
class paymentwithpaypal extends payment
{
        public function type(){
        return 'paypal';
    
    }
    public function step1(){
        return 'transfer the money to school account';
    }
    public function step2(){
        return 'validate your transaction';
    }
    public function step3(){
        return 'transaction completed go register courses ';
    }
}
$paycash=new paymentwithcash;
echo "your type：" . $paycash->paycash() ;
echo "the first step：" . $paycash->step1() ;
echo "the second step：" . $paycash->step2() ;
echo "the third step：" . $paycash->step3() ;

$payvisa=new paymentwithvisa;
echo "your type：" . $payvisa->payvisa() ;
echo "the first step：" . $payvisa->step1() ;
echo "the second step：" . $payvisa->step2() ;
echo "the third step：" . $payvisa->step3() ;


$paypaypal=new paymentwithpaypal;
echo "your type：" . $paypaypal->pay_paypal() ;
echo "the first step：" . $paypaypal->step1() ;
echo "the second step：" . $paypaypal->step2()  ;
echo "the third step：" .$paypaypal->step3() ;

?>