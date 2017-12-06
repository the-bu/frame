<?php
namespace best\core;
/**
 * Created by PhpStorm.
 * User: Bu
 * Date: 2017/12/5
 * Time: 16:27
 */

/**
 * Class Boot
 * 启动类
 */
class Boot
{

    public static function run()
    {
//        p($_GET);

        #初始化框架
        self::init();
        #执行应用
        self::apprun();

    }
    public static  function hander()
    {

    }
    public static  function init()
    {
        #短路写法,判断sessionid是否存在, 如果不存在就开启session
        session_id() || session_start();
        #设置时区,prc中国时区
        date_default_timezone_set('PRC');
    }
    public static  function apprun()
    {
        #当通过http://frame.com/?s=home/index/index访问的时候
        #判断get参数s里面传入的参数
        if (isset($_GET['s']))
        {
//            p($_GET);
            #将数组里的内容转成一个数组
            $info = explode('/',$_GET['s']);
//            p($info);
            #将控制器首字母大写,在拼合路径处用到
            $info[1] = ucfirst($info[1]);

            $c = "app\\$info[0]\\controller\\$info[1]";
//            p($c);
            $a = $info[2];
            #定义常量
            define('MODULE',strtolower($info[0]));#模块
            define('CONTROLLER',strtolower($info[1]));#控制器
            define('AXTION',strtolower($info[2]));#方法

        }else#如果没有传入参数,就走默认控制器和方法
        {
            $c = "app\home\controller\index";
            $a = 'index';
            define('MODULE','home');#模块
            define('CONTROLLER','index');#控制器
            define('AXTION',$a);#方法
        }
        return call_user_func_array([new $c,$a],[]);

    }

}