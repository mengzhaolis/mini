<?php

namespace app\mini\controller;

use think\Request;
use think\Model;
use app\mini\model\Sdetailses;
use think\View;

class Details
{
    //商品详情页
    public function S_Details(Request $request)
    {
        //主要是展示商品的数据
        $id=$request->route('id');
        $data = model('Sdetailses')->details($id);
        $goods=[
            'name' => $data[0]['name'],
            'jiage'=> $data[0]['jiage'],
            'guige'=> $data[0]['guige'],
            'kucun'=> $data[0]['kucun'],
            'canshu'=> $data[0]['canshu'],
            'baozhang'=> $data[0]['baozhang'],
            'xiangqing'=> $data[0]['xiangqing']

        ];
        
        return view('shop',['data'=>$data,'goods'=>$goods]);
    }
    //立即购买
    public function buy_go(Request $request)
    {
        $data = Request::instance()->post();
        // var_dump($data);die;
        $j = model('Buy')->Goods_buy($data);
        if(!empty($j))
        {
            return $j;
        }else
        {
            return false;
        }
        
    }
}



?>