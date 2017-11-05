<?php
/**
 * Created by PhpStorm.
 * User: yishan
 * Date: 2017/11/5
 * Time: 下午10:47
 */
class IndexController{
    function __construct(){
        echo "初始化 后台IndexController";
    }
    public function Index(){
        echo "<br>执行后台方法";
    }
}