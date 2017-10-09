<?php

namespace app\validate\controller;

use think\Request;
use think\Validate;
use think\Exception;
use app\lib\exception\BaseException;

Class BaseValidate extends Validate
{
    //制作自定义的验证类
    //首先自定义的类继承框架中本身定义好的类Validate
    //自定义的类和验证器中的思路是相同的，定义方法作用在于接收要验证的值
    public function getcheck()
    {
        //接收全部的值
        $request = Request::instance();
        $param = $request->param();
        //编写验证的规则、对传输过来的值进行验证
        $res = $this->check($param);
        // var_dump($res);die;
        if(empty($res))
        {
            //传入变量
            $e = new BaseException();
            //获取错误信息
            // var_dump($e);die;
            $e->msg = $this->error;
            //抛出异常
            throw $e;
        }else
        {
            return true;
        }
    }
}

?>