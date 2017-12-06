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
            var_dump($var);
        } else {
            print_r($var);
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

