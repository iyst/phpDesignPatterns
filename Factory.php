<?php
/**
 * Created by PhpStorm.
 * User: lihui
 * Date: 2017/9/7
 * Time: 21:34
 * 工厂模式
 */

/**
 * Interface payFactory
 * 工厂接口方法
 */
interface  payFactory {
    static function aliPay();
    static function tencentPay();
    static function linePay();
}

/**
 * Interface payFunc
 * 支付的标准接口
 */
interface payFunc{
    public function pay();
    //public function callBack($price);
}

class aliPayClass implements payFunc
{
//    private $price;
//
//    public function __construct($price = 0)
//    {
//        $this->price =  $price;
//    }

    public function pay()
    {
        // TODO: Implement pay() method.
        echo 'alipay function';
    }
    public function returnPrice()
    {
        return $this->price;
    }
}

class tencentPayClass implements payFunc
{
    public function pay()
    {
        // TODO: Implement pay() method.
        echo 'tencent pay';
    }
}

class linePayClass implements payFunc
{
    public function pay()
    {
        // TODO: Implement pay() method.
        echo 'line pay function';
    }

}

class payFactoryClass implements payFactory
{
    private function __construct(){}

    public static function aliPay()
    {
        // TODO: Implement aliPay() method.
//        $obj= new aliPayClass();
//        var_dump($obj);
        return new aliPayClass();
    }

    public static function tencentPay()
    {
        // TODO: Implement tencentPay() method.
        return new tencentPayClass();
    }

    public static function linePay()
    {
        // TODO: Implement linePay() method.
        return new linePayClass();
    }

//    public function pay(){
//        switch (){
//            case 1:
//                break;
//        }
//    }
}

class Client
{
    function call()
    {
        $aliPay = payFactoryClass::aliPay();
//        $aliPay2 = payFactoryClass::aliPay();
//        var_dump($aliPay);
//        var_dump($aliPay2);
        $aliPay->pay();
        echo $aliPay->returnPrice();
    }

}

$client = new Client();
$client->call();