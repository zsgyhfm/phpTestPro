<?php
/**
 * Created by PhpStorm.
 * User: yishan
 * Date: 2017/11/5
 * Time: 下午10:47
 */
class IndexController{
    function __construct(){

    }
    public function Index(){

        //加载视图使用include
       include CURRENT_VIEW_PATH.'admin.html';
    }
}