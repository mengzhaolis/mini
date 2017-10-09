<?php

namespace app\index\controller;

use think\Request;
use app\index\controller\Base;
use think\Db;


Class Incense extends Base
{
    protected $autoWriteTimestamp = true;
    //香瓜类数据上传
    public function up_data(Request $request)
    {
        $type=$request->post('type');
        // var_dump($type);die;
        $file=$request->file('image');
        if(!empty($file))
        {
            $path= $this->up($file);
            // var_dump($path);die;
            if(!empty($path))
            {
                if($type==1)
                {
                    $img_name='香瓜类图片';
                }
                if($type==2)
                {
                    $img_name='羊角脆类图片';
                }else if($type==3)
                {
                    $img_name='黄瓜类图片';
                }
                if($type==4)
                {
                    $img_name='西红柿类图片';
                }else if($type==5)
                {
                    $img_name='瓜苗类图片';
                }
                //进行数据入库操作
                $data=['img_name' => $img_name,
                        'img_type' => (int)$type,
                        'img_path' => $path,  
                ];
                $id=Db::table('images')->insertGetId($data);
                if(!empty($id))
                {
                    $data=$request->post();
                    $data['image']=$id;
                    $data['create_time']=time();
                    $s_id=Db::table('insence')->insertGetId($data);
                    if(!empty($s_id))
                    {
                        $this->success('添加成功','Index/lists');
                    }
                }else
                {
                    return '数据存在错误不能正常录入';
                }
            }
        }else
        {
            return '商品封面图不能为空~亲';
        }

    }
}

?>