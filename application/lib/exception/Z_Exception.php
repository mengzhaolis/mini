<?php

// namespace app\lib\exception;

// use think\Exception;
// use think\exception\Handle;
// use think\Request;
// use think\Log;
// use think\Config;

// class Z_Exception extends Handle
// {
//     //定义成员变量
//     //抛出异常的http状态码、抛出异常的错误信息、抛出异常的错误码
//     private $code;
//     private $msg;
//     private $errorcode;
    // public function render(Exception $e)
    // {
    //     if($e instanceof BaseException)
    //     {
    //         $this->code = $e->code;
    //         $this->msg = $e->msg;
    //         $this->errorcode = $e->errorcode;
    //     }else
    //     {
    //         // var_dump(parent::render($e));die;
    //         if(config('app_debug')==false)
    //         {
    //             return parent::render($e);
    //         }else
    //         {
    //             $this->code = 500;
    //             $this->msg = '服务器内部错误，就是不想告诉你为什么';
    //             $this->errorcode = 999;
    //             //调用日志方法
    //             $this->recordErrorLog($e);
    //         }
    //     }
    //     $request=Request::instance();

    //         $data=[
    //             'code'=> $this->code,
    //             'msg' => $this->msg,
    //             'error_code' => $this->errorcode,
    //             'request_url' => $request->url()
    //         ];
    //     return json($data);
    // }
    // //定义日志方法
    // private function recordErrorLog(Exception $e)
    // {
    //     //日志初始化
    //     Log::init([
    //         //日志类型
    //         'type' => 'File',
    //         //日志的存储路径
    //         'path' => LOG_PATH,
    //         //错误级别
    //         'level' => ['error']
    //     ]);
    //     Log::record($e->getMessage(),'error');

    // }
// }


?>