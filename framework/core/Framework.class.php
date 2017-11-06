<?php
/**
 * Created by PhpStorm.
 * User: zaks
 * Date: 2017/11/5
 * Time: 14:22
 */


/**
 * 类 都带有 .class的|但是类名是不包含后面的class的
 * 注意  控制器类  如  ItemController.Class.php
 * 模型类              ItemModel.Class.php
 */
header("content-type:text/html;charset=utf-8");

//核心启动类
class Framework{
    public static function run(){

        self::init();
        self::aotoload();
        self::router();

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
        //传入参数的时候  控制器不必加Controller
        define("PLAFORM",isset($_REQUEST['p'])?ucfirst($_REQUEST['p']):"home");//默认是前台
        define("CONTROLLER",isset($_REQUEST['c'])?ucfirst($_REQUEST['c']):'Index');//默认控制器
        define("ACTION",isset($_REQUEST['a'])?ucfirst($_REQUEST['a']):'Index');//方法

        //当前访问的控制器(已判定前后端)
        define("CURRENT_CONTROLLER_PATH",CONTROLLER_PATH.PLAFORM.DS);//路径+平台+\
        //当前访问的视图(已判定了前后端)
        define("CURRENT_VIEW_PATH",VIEW_PATH.PLAFORM.DS);
        //模型是通用所以不分前后端


        //手动载入控制器核心类
        require CORE_PATH."Controller.Class.php";
    }

    //路由方法
    public static function router(){
        //控制器
        $controller_name = CONTROLLER."Controller";//如 PersonController
        //方法名
        $action_name = ACTION;

//        echo "路由".$controller_name."<br>";
//        echo "方法".$action_name."<br>";
        //实例化
        $controller = new $controller_name;//这里 实例化 加不加括号都一样(无参数的情况下)
        $controller->$action_name();
    }

    //自动加载方法
    public static function aotoload(){
//        echo "自动加载".__CLASS__."<br>";
        //如果只加载方法就只传入方法名，如果要加载某个类中的方法 就需要如下
        spl_autoload_register(array(__CLASS__,'load'));
    }

    //自动加载只针对控制器类和模型类
    public static function load($classname){
        //如果是控制器类
        if(substr($classname,-10)=='Controller'){
            echo "是控制器<br>";
            require CURRENT_CONTROLLER_PATH.$classname.'.Class.php';
        }elseif (substr($classname,-5)=='Model'){
            //如果是模型类
            require MODEL_PATH.$classname.'.Class.php';
        }else{
            //暂无其他情况
        }
    }


}