<?php
/**
 * 适配器模式
 */

interface PayAdapter
{
    public function pay();
}



class AliPay implements PayAdapter
{
    public function pay()
    {
        echo 'alipay';
        // TODO: Implement pay() method.

    }
}
class WechatPay implements PayAdapter
{
    public function pay()
    {
        // TODO: Implement pay() method.
    }
}

class CommaPay
{
    public static function pay($type){
         switch ($type){
             case 'wechat':
                 break;
             case 'alipay':
                   $obj = new AliPay();
                   $obj->pay();
                 break;
         }
    }
}

class Client
{
    public function call()
    {
        CommaPay::pay('alipay');
    }
}

$c = new Client();
$c->call();