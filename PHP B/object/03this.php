<?php


class Saler
{
      //属性
    public $count = 100;
    protected $discount = 0.9;
    private $money = 100;
    public function getAll(){
        //内置对象
        var_dump($this);
        echo $this->count,$this->discount,$this->money;

    }
    public static function testStaticThis(){
        //静态方法本质是给类访问, so 不能在静态方法内部使用$this对象
        var_dump($this);
    }

}

//$s = new Saler();
//$s->getAll();
//
//echo '<hr/>';
//$s1 = new Saler();
//$s1->count = 1000000;
//$s1 ->getAll();
Saler::testStaticThis();

//构造方法
//__construct()  初始化资源

//析构方法      销毁对象自身所占资源
//__destruct()