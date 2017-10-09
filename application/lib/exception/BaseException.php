<?php

// namespace app\lib\exception;

// use think\Request;
// use think\Exception;

/**
 * 
 */
// class BaseException extends Exception
// {
//     /**  
//     *定义公共属性其中包括错误抛出异常的 http状态码 自定义的错误码、错误信息
//     */
//     public $code = 400;
//     public $msg = '参数错误';
//     public $errorcode = 1000;
//     //定义构造方法用来自动执行
//     //首先构造方法中接收参数定义为数组因为在调用这个异常处理类的时候已经传入了参数为数组的形式
//     public function __construct($arr=[])
//     {   
//         // var_dump($arr);die;
//         if(is_array($arr)==false)
//         {
//             throw new Exception("参数错误");
//         }else
//         {
//             // var_dump(3);die;
//             //采用array_key_exists()函数判断接收的数组中是否存在检测的键，这个键值就是调用的时候传递过来的值，如果存在将本类中的参数通过接收的数值进行覆盖
//             if(array_key_exists('code',$arr))
//             {
//                 $this->msg = $arr['code'];              
//             }
//             if(array_key_exists('msg',$arr))
//             {
//                 $this->msg = $arr['msg'];              
//             }
//             if(array_key_exists('errorcode',$arr))
//             {
//                 $this->msg = $arr['errorcode'];              
//             }
//         }
        
//     }
// }


?>
