<?php

/**
 * 组合模式
 * 规范独立对象和组合对象必须实现的方法，保证它们提供给客户端统一的
 * 访问方式
 */
abstract class Filesystem {
    protected $name;
    public function __construct($name){
        $this->name =  $name;
    }
    abstract function getSize();
    abstract function getName();
}


class Dir extends Filesystem{

    private $filesystems = [];

    // 组合对象必须实现添加方法。因为传入参数规定为Filesystem类型，
    // 所以目录和文件都能添加
    public function add(Filesystem $filesystem)
    {
        $key = array_search($filesystem, $this->filesystems);
        if ($key === false) {
            $this->filesystems[] = $filesystem;
        }
    }

    // 组合对象必须实现移除方法
    public function remove(Filesystem $filesystem)
    {
        $key = array_search($filesystem, $this->filesystems);
        if ($key !== false) {
            unset($this->filesystems[$key]);
        }
    }

    public function getName()
    {
        return '目录：' . $this->name;
    }

    public function getSize()
    {
        $size = 0;
        foreach ($this->filesystems as $filesystem) {
            $size += $filesystem->getSize();
        }
        return $size;
    }
}


class Img extends Filesystem{
    public function getName()
    {
        // TODO: Implement getName() method.
        return 'Img' . $this->name;
    }
    public function getSize()
    {
        // TODO: Implement getSize() method.
        return 10;
    }
}

class Text extends Filesystem{
    public function getName()
    {
        // TODO: Implement getName() method.
        return 'Text' . $this->name;
    }
    public function getSize()
    {
        // TODO: Implement getSize() method.
        return 100;
    }
}

class Client {

    public function call(){

        $dir =  new Dir('Home');
        $dir -> add( new Img('图片'));
        $dir -> add( new Text('文本'));

        echo $dir->getSize();
        echo $dir->getName();
    }
}

$client  = new Client();
$client->call();

