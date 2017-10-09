<?php

namespace app\mini\controller;

use think\Request;
use think\Model;
use think\Db;

class Alipays
{
    //调用支付接口
    public function pay(Request $request)
    {
        $data = $request->post();
        // var_dump($data);die;
        $id = $data['indent_id'];
        // $data['id'] = $id;
        $redis = new\Redis();
        $redis->connect('127.0.0.1','6379');
        $data['id'] = md5($data['indent_id']);
        // var_dump($data['id']);die; 
        $redis->set($data['id'],$id);
        // var_dump($redis->keys('*'));die;
        $stype = model('Alipay')->pay($data);
        
    }
    //支付成功之后进行后续操作
    public function payok(Request $request)
    {
        $data = $request->param();
        $redis = new\Redis();
        $redis->connect('127.0.0.1','6379');
        $id = $redis->get($data['id']);
        //  var_dump($id);die;
        if($id==$data['type'])
        {
            $update = Db::table('indent')->where('id','=',$id)->setField('indent_status',1);
            if(!empty($update))
            {
                return "<script>alert('支付成功');location.href='/'</script>";
            }
        }else
        {
            echo "<script>alert('参数错误')</script>";
        }
    }
}

?>