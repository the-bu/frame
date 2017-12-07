<?php
/**
 * Created by PhpStorm.
 * User: Bu
 * Date: 2017/12/5
 * Time: 21:27
 */

namespace best\core;


class Controller
{
    #定义储地址的属性
    private $url;

    protected function message($msg){
        include 'view/message.php';
        die;
    }

    protected function setRedirect($url = ''){
        if($url){
            $this->url = "location.href='$url'";
        }else{
			$this->url = "window.history.back()";
		}
//		p($this) ;die;
        return $this;
	}
}