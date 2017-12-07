<?php
namespace best\model;
/**
 * Created by PhpStorm.
 * User: Bu
 * Date: 2017/12/6
 * Time: 23:06
 */
class Model
{
     public function __call($name, $arguments)
     {

         return self::getaction($name, $arguments);
     }
     public static function __callStatic($name, $arguments)
     {
         return self::getaction($name, $arguments);
     }
     public static function getaction($name, $arguments){
         return call_user_func_array([new Base(),$name],$arguments);
     }
}