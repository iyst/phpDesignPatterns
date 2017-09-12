<?php
/**
 * 观察者模式
 */

/**
 * Interface Message
 * 操作类接口
 */
interface Message {
    function send();
}

/**
 * 被观察者接口
 * Interface Observable
 */
interface Observable{
    function add(Message $message);
    function remove(Message $message);
    function send();
}

class WechatMsg implements Message{
    public function send()
    {
        // TODO: Implement send() method.
        echo 'wechat message send function';
    }
}
class EmailMsg implements Message{
    public function send()
    {
        // TODO: Implement send() method.
        echo 'Email message send function'."\n";
    }
}
class SystemLog implements Message{
    public function send()
    {
        // TODO: Implement send() method.
        echo 'System Log function'."\n";
    }
}


class MessageFactory implements Observable
{
    private $objs=[] ;
    private $status;
    public function add(Message $message)
    {
        if(array_search($message,$this->objs) === false){
            $this->objs[] = $message;
        }
        // TODO: Implement add() method.
    }
    public function remove(Message $message)
    {
        if($key = array_search($message,$this->objs)){
            unset($this->objs[$key]);
        }
        // TODO: Implement remove() method.
    }
    public function send()
    {
        // TODO: Implement send() method.
        foreach ($this->objs as $obj){
            $obj->send();
        }
    }
    public function getStatus()
    {
        return $this->status;
    }
}

class Client
{
    function call()
    {
            $factory = new MessageFactory();
            $factory->add(new EmailMsg());
            $factory->add(new SystemLog());
            $factory->add(new WechatMsg());
            $factory->send();
    }
}

$c = new Client();
$c->call();






