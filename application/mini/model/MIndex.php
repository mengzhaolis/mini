<?php

namespace app\mini\model;

use think\Request;
use think\Db;
use think\Model;


/*
首页数据展示的model层
**/
class MIndex extends Model
{   
    //banner图展示
    public function t_banner()
    {
        $three = Db::table('banner')->order('create_time desc')->limit(3)->select();
        return $three;
    }
}


?>