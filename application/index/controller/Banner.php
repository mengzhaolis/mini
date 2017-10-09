<?php

namespace app\index\controller;

use think\Request;
use app\index\controller\Base;
use think\Db;


Class Banner extends Base
{
    protected $autoWriteTimestamp = true;
    //香瓜类数据上传
    public function banner_up(Request $request)
    {
        $i_id=$request->post('i_id');
        // var_dump($type);die;
        $file=$request->file('image');
        if(!empty($file))
        {
            $path= $this->up($file);
            // var_dump($path);die;
            if(!empty($path))
            {
                //进行数据入库操作
                $data=[
                        'i_id' => (int)$i_id,
                        'banner_path' => $path, 
                        'create_time' => time() 
                ];
                $id=Db::table('banner')->insertGetId($data);
                if(!empty($id))
                {
                    return '添加成功';
                }else
                {
                    return '数据添加失败';
                }
            }
        }else
        {
            return '商品封面图不能为空~亲';
        }

    }
}

?>