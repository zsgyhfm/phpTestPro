<?php
/**
 * Created by PhpStorm.
 * User: zaks
 * Date: 2017/11/6
 * Time: 11:04
 */

//基础控制器
class Controller{
    public function jump($url,$message,$wait=3){
        if($wait==0){
            header("localtion:$url");
        }else{
            include CURRENT_VIEW_PATH.'message.html';
        }
    }
    public function show(){
        echo "核心类";
    }

    //定义辅助函数方法  如 input_helper.php
    public function helper($helpers){
        require HELPERS_PATH."{$helpers}_helper.php";
    }
    //定义载入类库的方法
    public function library($lib){
        require LIB_PATH ."{$lib}.Class.php";
    }
}