<?php

namespace app\mini\model;

use think\Model;

class Indentnum extends Model
{
    //产生订单号
    public function Ding()
    {
        $english = '';
        $data = date('YmdHis');
        $num = rand(1000,9999);
        for($i=1;$i<=4;$i++)
        {
            $english.=chr(rand(65,90));
        }
        return $english.$data.$num;
    }
}


?>