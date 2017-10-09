<?php
namespace app\index\controller;

use thinl\View;
use think\Request;
use think\File;
use think\Db;

class Index
{
    /*
    *首页banner图方法接口
    *$id=传入接口的banner号
    *路径(url)http/:id
    *访问方式:Post
    **/
    public function index(Request $request)
    {
        if(empty($request::instance()->param()))
        {
            return view('index');
        }
    }
    //首页中调用的中间部分
    public function ifream()
    {
       return view('index_v1');
    }
    //香瓜类展示对应数据上传
    public function incese()
    {
        return view('contacts');
    }
    //香瓜类数据上传
    public function incese_up()
    {
        return view('form_basic');
    }
    //羊角脆数据上传模板展示
    public function yang()
    {
        return view('yang');
    }
    //黄挂数据上传-模板展示
    public function huanggua()
    {
        return view('huanggua');
    }
    //西红柿数据上传-模板展示
    public function xi()
    {
        return view('xi');
    }
    //瓜苗数据添加-模板展示
    public function guamiao()
    {
        return view('xi');
    }
    //香瓜类数据添加中的商品参数调用富文本编辑器
    public function canshu()
    {
        return view('canshu');
    }
    //数据列表
    public function lists()
    {
        return view('profile');
    }
    //banner图数据添加模板展示
    public function banner()
    {
        $type = Db::table('insence')->where('status','=',1)->field('id,name')->select();
        return view('banner',['type'=>$type]);
    }
    //数据添加中的商品等级的划分
    public function type()
    {
        $type = Db::table('class')->field('id,goods_name')->select();
        return view('class',['type'=>$type]);
    }
}
