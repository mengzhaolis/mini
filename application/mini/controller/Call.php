<?php

namespace app\mini\controller;

use think\Request;
use think\Model;
use app\mini\model\Sdetailses;
use think\View;

class Call
{
    public function t(Request $request)
    {
        $data = $request->param();
        var_dump($data);die;
    }
}