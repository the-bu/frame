<?php
namespace app\home\controller;
use best\core\Controller;
use best\model\Model;
use best\view\View;
/**
 * Created by PhpStorm.
 * User: Bu
 * Date: 2017/12/5
 * Time: 20:48
 */

/**
 * Class Index
 * @package app\home\controller
 * 继承controller用于setRedirect和message的调用
 */
class Index extends Controller
{
    #index方法显示首页,返回数据
    public function index()
    {
//        p(c('database.driver'));#测试c函数
//        $res = Model::q("select * from student");
//        p($res);
//        Model::e("insert into student(name) values('阿沁')");
        return View::make()->with(compact('data'));

    }
    public function test()
    {
        $res = Model::q("select * from student");
        echo 1;
        p($res);

//        $this->setRedirect(u('index'))->message('没有此页面');
    }
}