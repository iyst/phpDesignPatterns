<?php

/**
 * Created by PhpStorm.
 * User: lihui
 * Date: 2017/9/7
 * Time: 15:52
 */
class Preferences
{

    private $props = [];
    private static $obj;
    private function __construct(){}

    public static function createObj()
    {
        if(empty(self::$obj)) {
            self::$obj = new Preferences();
        }
        return self::$obj;
    }

    public function set($key,$val){
        $this->props[$key] = $val;
    }
    public function get($key){
        return $this->props[$key];
    }
    public static function unsetObj(){
        self::$obj =null;
    }

}

$obj = Preferences::createObj();
var_dump($obj);
$obj::unsetObj();
$obj2 = Preferences::createObj();
$obj3 = Preferences::createObj();


var_dump($obj2);
var_dump($obj3);