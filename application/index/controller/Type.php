<?php

namespace app\index\controller;

use think\Request;
use think\Db;
use think\Controller;
use app\index\model\Types;

class Type
{
    //商品数据分类
    public function s_type($type)
    {
        $data=model('Types')->s_type($type);
        // var_dump($data);die;
        return view('s_type',['incese'=>$data]);
    }
    //数据列表页中的搜索功能
    public function sousuo()
    {
        $where = Request::instance()->post('search');
        $data = model('Types')->search($where);
        if(empty($data))
        {
            return "<script>alert('暂时没有此数据,请返回上一部操作');";
        }
        // var_dump($data);die;
        return view('ti',['incese'=>$data]);

    }
    //数据分类中数据等级的划分
    public function classes()
    {
        $data = Request::instance()->post('search');
    }

}


?>