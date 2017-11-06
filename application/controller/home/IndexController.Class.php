<?php
/**
 * Created by PhpStorm.
 * User: yishan
 * Date: 2017/11/5
 * Time: 下午10:47
 */
class IndexController extends Controller {
    function __construct(){
        echo "初始化 IndexController";
    }
    public function Index(){
        echo "<br>执行方法<br>";
        //
        echo "<pre>";
        $item = new itemsModel("items");
        $list = $item->test();
        var_dump($list);

        echo "<br><br>";

        //调用helpers方法 辅助函数
        $this->helper("input");
        f1();
        //加载lib中类 工具类
        $this->library("Page");
        page();
    }
}