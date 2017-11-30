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
    public function type_one()
    {
        //查询一级类
        $data = Db::table('class')->select();
        $arr=$this->digui($data,0,0);
        //图片
        $banner= model('MIndex')->t_banner();
        //商品数据
        $shop = Db::table('insence')->alias('i')->join('class c','i.id=c.goods_id')->join('images img','i.image=img.id')->select();
        // print_r($shop);die;
        // foreach($arr as $k=>$v)
        // {
        //     $shopp[] = $v['son'];
        // }
        // print_r($shopp);die;
        //查询品牌推荐中的数据
        $recommend = Db::table('insence')->order('id desc')->limit('9')->field('id,name')->select();
        // print_r($recommend);die;
        return view('sort',['first'=>$arr,'banner'=>$banner,'firstone'=>$shop,'recommend'=>$recommend]);
    }

}


?>