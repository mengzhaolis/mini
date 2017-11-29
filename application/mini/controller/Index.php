<?php

namespace app\mini\controller;

use app\mini\model\MIndex;
use think\Request;
use think\Model;
use think\Db;
use think\Session;

Class Index
{
    public $useres = '';
    public function index()
    {
        /*
        首页展示包含首页中的数据
        **/
        $banner= model('MIndex')->t_banner();
        return view('index',['banner' => $banner]);
    }
    //正常页验证登陆
    public function l(Request $request)
    {
         $data = $request->post();
         Session::set('url',$data['test']);
        if(empty(Session::get('username')))
        {
            return false;
        }else
        {
            $data = $request->post();
            // var_dump($data);die;
            if(!empty($data['test']))
            {
                Session::set('url',$data['test']);
                return true;
            }else
            {
                return false;
            }
        }
    }
    public function login(Request $request)
    {
        return view('login');      
    }
    //执行登陆功能
    public function login_in(Request $request)
    {
            $data = $request->post();
        // var_dump($data);die;
        
            $username = Db::table('user')->where('username','=',$data['Username'])->find();
            if(empty($username))
            {
                return '<script>alert("用户名不存在");window.location.href="login.html"</script>';
                
            }else if($username['password'] == $data['Password'])
            {
                $user = $username['username'];
                // $this->useres = $user;
                $id = $username['id'];
                Session::set("id",$username['id']);
                Session::set("username",$username['username']);
                // var_dump(Session::get("$user"));die;
                if(!empty(Session::get('id') || !empty('username')))
                {
                    $url = Session::get('url');

                    // var_dump($url);die;
                    echo '<script>alert("登陆成功！！！");</script>';
                    echo '<script language="javascript">location.href="' . $url . '"; </script>';
                }
                
                // var_dump(Session::get('username'));die;
            }else
            {
                return '<script>alert("密码错误！！！");window.location.href="login.html"</script>';
            }
        
        
    }
    //注册页面展示
    public function zhuce()
    {
        return view('zhuce');
    }
    //执行注册录入数据库‘
    public function add(Request $request)
    {
        $data = $request->post();
        
        $inster = Db::table('user')->insertGetId($data);
        if(empty($insert))
        {
            return "<script>alert('注册失败，请重新注册')window.location.href='zhuce';</script>";
        }else
        {
            $url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
            // var_dump($url);die;
            return "<script>alert('注册成功);window.location.href='$url'</script>";
        }
    }
}


?>