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
}