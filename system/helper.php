<?php
//头部
/**
 * 助手函数库
 */
header('Content-type:text/html;charset=utf8');
date_default_timezone_set('PRC');
if (!function_exists('dd')) {
    /**
     * 打印函数
     *
     * @param $var    打印的变量
     */
    function dd($var)
    {
        echo '<pre style="background: #ccc;padding: 8px;border-radius: 6px">';
        var_dump($var);
        echo '</pre>';
    }
}

if (!function_exists('p')) {
    /**
     * 打印函数
     *
     * @param $var    打印的变量
     */
function p($var)
    {
        echo '<pre style="background: #ccc;padding: 8px;border-radius: 6px">';
        if (is_bool($var) || is_null($var)) {
            var_dump($var);die;
        } else {
            print_r($var);die;
        }
        echo '</pre>';
    }
}

/**
 * 定义常量IS_POST检测表单请求是否为post请求
 * $_SERVER['REQUEST_METHOD'] 请求方式 get post
 * 自己一定要$_SERVER打印出来
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //说明是post方式请求
    //为什么定义常量不定义变量：常量全局作用范围
    //以后使用框架，看手册都出现IS_POST
    define('IS_POST', true);
} else {
    define('IS_POST', false);
}


if (!function_exists('sucesss')) {
    /**
     * 成功提示
     * @param $msg        提示消息
     * @param $url        跳转路径
     */
    function success($msg, $url)
    {
        echo "<script>alert('$msg');location.href='$url'</script>";
        //终止代码运行
        die;
    }
}

if (!function_exists('error')) {
    /**
     * 错误提示
     * @param $msg        提示消息
     */
    function error($msg)
    {
        echo "<script>alert('$msg');history.back()</script>";
        //终止代码运行
        die;
    }
}

if (!function_exists('dataToFile')) {
    /**
     * 将数据写入文件中
     * @param $data        写入数据库的数据
     * @param $file        数据库文件名
     */
    function dataToFile($data, $file)
    {
        $newData = var_export($data, true);
        //组合要写到data.php数据库中的数据
        $str = <<<str
<?php
return $newData;
?>
str;
        //将$str数据写入到数据库文件中去
        file_put_contents($file, $str);
    }
}

function __autoload($name)
{
    include "./controller/{$name}.class.php";
}

/**
 * $_SERVER['HTTP_X_REQUESTED_WITH']),
 * 想打印查看数据，需要在异步里面进行打印查看
 */
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    //说明是post方式请求
    //为什么定义常量不定义变量：常量全局作用范围
    //以后使用框架，看手册都出现IS_POST
    define('IS_AJAX', true);
} else {
    define('IS_AJAX', false);
}
function u($url)
{
     #将传进来的短位网址转换成数组,
     #用来取出其中的模块,控制器和方法
     $info = explode('/',$url);
     #拼合出路径, 按输入的内容把内容做处理返回
    #如果数组中的下标个数等于1的话,说明只传进来一个参数
    if (count($info)==1)
    {
        $res = "?s=".MODULE.'/'.CONTROLLER.'/'.$info[0];
    }elseif (count($info)==2)
    {
        $res = "?s=".MODULE.'/'.$info[0].'/'.$info[1];
    }else
    {
        $res = "?s=".$info[0].'/'.$info[1].'/'.$info[2] ;
    }
    return $res;
}
function c($path='')#给个默认值防止报错
{
    if (! $path)#如果$path没有传值,进来就是false,取反下变成true,返回bull
    {
        return null;
    };
        #dabase.user拿到数组
        $info = explode('.',$path);
        #拼合配置项路径
        $config = "../system/config/".$info[0].'.php';
        #判断配置项文件是否存在
        if (!is_file($config))
        {
            return null  ;#如果存在旧返回文件路径
        }
        $data = include $config;
        if (count($info)==1)
        {
            return $data;
        }else
        {
            return isset($data[$info[1]]) ? $data[$info[1]] : null;
        }
        #如果需要的参数在里面将其返出, 没有旧返回null


}

