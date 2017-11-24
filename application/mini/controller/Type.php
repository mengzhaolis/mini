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
    //分类信息
    public function type_one()
    {
        $data = Db::table('class')->select();
        $arr=$this->digui($data,0,0);
        foreach($arr as $k=>$val)
        {
            
            if($val['pid']==0)
            {
                $da[] = $val['son'];
            }
        }
        // print_r($da);die;
        $banner= model('MIndex')->t_banner();

        return view('sort',['first'=>$arr,'banner'=>$banner,'forstone'=>$da]);
    }
}


?>