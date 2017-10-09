<?php

namespace app\index\model;
use think\Model;
use think\Request;
use think\Db;

class Types extends Model
{
    //商品分类数据模型
    public function s_type($type)
    {
        if($type==1)
        {
            $data = Db::table('insence')->alias('i')->JOIN('images img','i.image=img.id','left')->field('insence.id,insence.name,create_time,img_path')->where('img_type',1)->select();
            return $data;
        }
    }
    //商品搜索功能
    public function search($where)
    {
        $data = Db::table('insence')->alias('i')->JOIN('images img','i.image=img.id','left')->field('insence.id,insence.name,create_time,img_path')->where('name','like',"%$where%")->select();
        if(empty($data))
        {
            $data = Db::table('insence')->alias('i')->JOIN('images img','i.image=img.id','left')->field('insence.id,insence.name,create_time,img_path')->where('name','like',"%$where")->select();
        }else if(empty($data))
        {
            $data = Db::table('insence')->alias('i')->JOIN('images img','i.image=img.id','left')->field('insence.id,insence.name,create_time,img_path')->where('name','like',"$where%")->select();
        }
        
        foreach($data as $k=>$v)
        {
            $ti = "<font color='red'><b>$where</b></font>";
            $data[$k]['name'] = str_replace("$where","$ti",$v['name']);
        }
        return $data;
    }
}



?>