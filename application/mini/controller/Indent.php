<?php

namespace app\mini\controller;

use think\View;
use think\Model;
use think\Request;
use think\Db;

class Indent
{
    public function indents(Request $request)
    {
        $id = $request->param('id');
        $data = Db::table('indent')->where('id','=',$id)->find();
        $goods = Db::table('insence')->where('id','=',$data['insence_id'])->find();
        $data['no_time'] = $data['no_time']-$data['create_time'];
        // var_dump($data);die;
        return view('indent',['data'=>$data,'goods'=>$goods]);
    }
}



?>