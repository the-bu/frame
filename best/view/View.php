<?php

/**
 * Created by PhpStorm.
 * User: Bu
 * Date: 2017/12/5
 * Time: 21:49
 */
namespace best\view;

class View
{
    /**
     * @param $name  调用view时候所执行的方法 make() 因为没有所以会自动传进来
     * @param $arguments  参数
     * @return mixed
     */
    #如果是正常调用的话走这个,获取未定义的方法
    public function __call ($name,$arguments)
    {
        #调用getAction方法,实例化base,传入被调用的方法名
        return self::getAction($name,$arguments);
    }
    public  static function __callStatic($name, $arguments)
    {
        return self::getAction($name,$arguments);
    }

    public static function getAction($name,$arguments)
    {
        #实例化base类,并把方法名(make())传入进去
        return call_user_func_array([new Base,$name],$arguments);
    }
}