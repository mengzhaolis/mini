<?php

namespace app\mini\controller;

use think\Db;

class Type
{
    public function data()
    {
         $data = Db::table('class')->select();
         $arr=$this->digui($data,0,0);
         print_r($arr);die;
    }
    public function digui($data,$pid,$level)
    {
        $tree = Array();
        foreach($data as $k => $v)
        {
            if($v['pid'] == $pid)
            {
                $v['level'] = $level;
                 $flg = str_repeat('|―',$level);
                 $v['goods_name'] = $flg.$v['goods_name'];
                 $tree[$k] = $v;
                // //  var_dump($tree);die;
                 $tree[$k]['son'] = $this->digui($data,$v['c_id'],$level+1);
            }
        }
        
        return $tree;
    }

}


?>