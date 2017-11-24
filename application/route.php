<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

//后台首页
Route::any('admin','Index/Index/Index');
//首页banner接口
Route::post('banner/:id','Index\banner');
Route::any('up','index/File/up');
//加载首页中间部分
Route::any('iferam','index/Index/ifream');
//执行香瓜类数据上传
Route::post('incense','index/Incense/up_data');
//数据添加中的黄瓜类
Route::get('huanggua','index/Index/huanggua');
//数据添加中的西红柿类
Route::get('xi','index/Index/xi');
//数据添加中的羊角脆类
Route::get('yang','index/Index/yang');
//数据添加中的瓜苗类
Route::get('guamiao','index/Index/guamiao');
//banner图数据添加对应模板展示
Route::get('banneres','index/Index/banner');
//banner图数据添加
Route::post('banner_up','index/Banner/banner_up');
//后台数据添加中的数据等级
Route::any('type','index/Index/type');
Route::post('class','index/Type/classes');

//商品分类
Route::any('s_type/:type','index/Type/s_type');
//商品分类中搜索功能
Route::post('search','index/Type/sousuo');


//测试验证器
Route::get('var','index/Ver/C');


//移动端首页录用
Route::any('/','mini/Index/index');
//用户登录注册页
Route::any('login','mini/Index/login');
Route::any('l','mini/Index/l');

//用户登录执行功能
Route::post('login_in','mini/Index/login_in');
//用户注册页面
Route::any('zhuce','mini/Index/zhuce');
//执行用户的注册功能
Route::post('add','mini/Index/add');
//首页banner图对应的详情页
Route::get('banner','mini/Banner/banner_details');
//移动端商品详情页
Route::any('details','mini/Details/S_Details');
//立即购买
Route::post('goods_buy','mini/Details/buy_go');
//提交订单页
Route::any('indent','mini/Indent/indents');
//用户付款，调用支付宝接口
Route::post('alipay','mini/Alipays/pay');
//用户付款成功的页面
Route::any('payok','mini/alipays/payok');
//商品分类递归
Route::any('digui','mini/Type/data');
