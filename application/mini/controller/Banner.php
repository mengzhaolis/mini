<?php

namespace app\mini\controller;

use think\Request;
use think\Db;
use think\Exception;
use app\lib\exception\BaseException;
use app\lib\exception\Z_Exception;

Class Banner
{
    /*
    首页对应的banner图数据展示
    **/
    public function index_banner()
    {
        //首页中banner图展示图为三张
        
    }
    
    //首页banner图对应的商品详情页
    public function banner_details()
    {
        $request=Request::instance();
        $id = $request->param();
        // var_dump($id);die;
        if(empty($id))
        {
           throw new BaseException();
        }
    }
}

?>