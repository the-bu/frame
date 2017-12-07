<?php
/**
 * Created by PhpStorm.
 * User: Bu
 * Date: 2017/12/7
 * Time: 15:30
 */
namespace best\model;
use Exception;
use PDO;
/**
 * Class Base
 * @package best\model
 *
 *
 */
class Base
{
    private static $pdo = null;
   public function __construct()
   {
       #连接数据库
       #如果数据库已经连接就会存到静态属性里,就不需要重新连接
       if (is_null(self::$pdo))
       {
           $this -> connect();
       }

   }

    /**
     * 连接数据库函数
     *
     */
   public  function connect()
   {
       try
       {
           $dsn       = c('database.driver').":host=".c('database.host').";dbname=".c('database.dbname');
           $username  = c('database.username');
           $password  = c('database.password');
           self::$pdo = new PDO($dsn,$username,$password);

       }catch (Exception $e)#注意Exception是个类,如果前面不加\或不用use Exception 就会报错,因为他会在当前空间进行查找,如果use就会到根目录下查找
       {
           die($e -> getMessage());
       }
   }
   public  function q($sql)
   {
       try
       {
           $res = self::$pdo -> query ($sql);

           $data =$res -> fetchAll ( PDO::FETCH_ASSOC );
           if($data)
           {
               return $data;
           }else
           {
               return false;
           }
//            p($res -> fetchAll ( PDO::FETCH_ASSOC ));
       }catch (Exception $e)
       {
           die($e -> getMessage());
       }
   }
   public function e($sql)
   {
       try
       {
           return self::$pdo -> exec ($sql);

       }catch (Exception $e)
       {
           die($e ->getMessage());
       }
   }
}