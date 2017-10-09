<?php

namespace app\index\controller;

use think\Request;
use app\index\verifiction\Verif;

Class Ver
{
    //测试验证器
    public function C(Request $requset)
    {
        $id = (int)$requset::instance()->param('id');
        // var_dump($id);die;
        $v = new Verif();
        $v->getcheck();

        // $data=['id'=>$id];
        // $res=new Verif();
        // $a=$res->batch()->check($data);
        // // var_dump($a);die;
        // if($a)
        // {
        //     return 1;
        // }else
        // {
        //     echo "$a";
        // }
    }
}


?>