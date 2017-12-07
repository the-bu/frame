<?php

/**
 * Created by PhpStorm.
 * User: Bu
 * Date: 2017/12/5
 * Time: 23:38
 */
namespace best\view;

class Base
{
    #因为还有方法需要调用,所以生成个地址属性更方便调用
    private $path;
    private $data = [];
    public function make()
    {

        #../app/home/index/view
        #拼合模版路径
        $this -> path ="../app/".MODULE.'/view/'.strtolower(CONTROLLER).'/'.ACTION.'.html';

         return $this ;

    }
    public function with($var=[])#给$var一个默认值是个空数组, 因为extract ()只可以转换数组变成变量做为下标的格式
    {
        $this -> data = $var;
        return $this;
    }

    /**
     * @return string
     * 只有被echo才会被调用, 所以一定要在实例化base的地法规return改成echo
     *
     */
    public function __toString ()
    {

        extract ($this->data);
        #如果路径存在的话在执行, 防止不调用make()方法
        if ($this ->path)
        {
            include  $this -> path;
        }

        return '';
    }
}