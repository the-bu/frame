<?php
namespace app\home\controller;
use best\core\Controller;
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

        return View::make();

    }
    public function test()
    {
        $this->setRedirect(u('index'))->message('没有此页面');
    }
}