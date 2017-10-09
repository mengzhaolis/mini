<?php

namespace app\index\controller;

use think\Request;
use think\View;
use think\Controller;
use think\File;


Class Base extends Controller
{
    //文件上传的方法
    public function up($file)
    {
        // var_dump($file);die;
        //上传文件命名规则

        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->validate(['size'=>1567800,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            // 成功上传后 获取上传信息
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            // var_dump($info);die;
            $path = $info->getSaveName();
            $new_path=str_replace("'\'",'/',$path);
            return  '/uploads/'.$new_path;
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
}


?>