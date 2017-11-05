<?php
/**
 * Created by PhpStorm.
 * User: zaks
 * Date: 2017/11/5
 * Time: 14:22
 */

//核心启动类
class Framework{
    public static function run(){
        echo "run...<br>";
        static::init();
        echo getcwd().DIRECTORY_SEPARATOR;//获取当前文件目录
        echo "<br>1";
        echo ROOT;

    }
    //初始化方法
    public static function init(){
        //获取项目根目录
        define("DS",DIRECTORY_SEPARATOR);
        define("ROOT",getcwd().DS);

        //应用程序目录
        define("APP_PATH",ROOT."application".DS);
        //框架目录
        define("FRAMEWORK_PATH",ROOT."framework".DS);
        //静态文件目录
        define("PUBLIC_PATH",ROOT."public".DS);

        //模型路径
        define("MODEL_PATH",APP_PATH."model".DS);
        //控制器路径
        define("CONTROLLER_PATH",APP_PATH."controller".DS);
        //视图路径
        define("VIEW_PATH",APP_PATH."view".DS);
        //配置文件路径
        define("CONFIG_PATH",APP_PATH."config".DS);

        //框架核心路径
        define("CORE_PATH",FRAMEWORK_PATH."core".DS);
        //数据库操作路径
        define("DB_PATH",FRAMEWORK_PATH."datebase".DS);
        //辅助目录路径
        define("HELPERS_PATH",FRAMEWORK_PATH."helpers".DS);
        //框架资源路径
        define("LIB_PATH",FRAMEWORK_PATH."libraries".DS);

        /**
         *-------------------------------------------------------
         */
        //通过请求判断控制器 视图   的位置(分前后端)需要解析url携带的参数，p=admin&c=goods&a=add
        define("PLAFORM",isset($_REQUEST['p'])?ucfirst($_REQUEST['p']):"home");//默认是前台
        define("CONTROLLER",isset($_REQUEST['c'])?ucfirst($_REQUEST['c']):'Index');//默认控制器
        define("ACTION",isset($_REQUEST['a'])?ucfirst($_REQUEST['a']):'Index');//方法

        //当前访问的控制器
        define("CURR_CONTROLLER_PATH",CONTROLLER_PATH.PLAFORM.DS);//路径+平台+\
        //当前访问的视图
        define("CURR_VIEW_PATH",VIEW_PATH.PLAFORM.DS);
    }

    //路由方法
    public function router(){
        //控制器
        $controller_name = CONTROLLER."Cotroller";//如 PersonController
        //方法名
        $action_name = ACTION."Action";


        //实例化
        $controller = new $controller_name;//这里 实例化 加不加括号都一样(无参数的情况下)
        $controller->$action_name();
    }

    //自动加载方法
    public function aotoload(){
            
    }
}