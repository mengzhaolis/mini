<?php

namespace app\mini\model;

use think\Request;
use think\Db;
use think\Model;
// use think\View;
// use think\cache\driver\Redis;

class Buy extends Model
{
    //商品详情页中的立即购买
    public function Goods_buy($data)
    {   
        
        //自定义商品id
        $id = abs((int)$data["goods_id"]);
        if($id ==0)
        {
            return '商品数量不能为0';
        }
        // return $id;
        // $user_id=1;
        // return $id;
        //假设用户购买数量
        $goods_num=abs((int)$data['num']);
        // $goods_num=5;
        
        $details = Db::table('insence')->where('id','=',"$id")->find();
        // var_dump($details);die;
        $kucun = $details['kucun'];

        //首先判断商品的库存数量
        if($kucun<=0)
        {   
            //商品库存为0         
            return 0;
        }else
        { 
            //因为在商品详情的时候已经将商品的库存量写入了缓存在用户下单时候我们只需要保障大量用户过来请求的时候保证请求的原子性的同时库存相应的减少并且不会出现超卖的情况就可以了
            $redis = new\Redis();
            $redis->connect('127.0.0.1','6379');
            //通过原子性请求的特点减少在redis商品队列中的库存量
            $goods = $redis->lpop("$id");
            // var_dump($goods);die;
            if(empty($goods))
            {
                //0表示商品售罄
                return '不能再增加了啊';
            }else
            {
                //如果能够正常的取值那么将录入订单信息
                //订单号
                $hao = model('Indentnum')->Ding();
                // $haos = 'fhasjh';
                // var_dump($hao);die;
                // 收件人姓名
                $user_name = '张三';
                //收件人手机号
                $user_phone = 18310546098; 
                //下单时间
                $create_time = time();
                //订单过期时间
                $no_time = strtotime("+1 day");
                //添加订单操作
                $data = ['indent_hao'=>"$hao",'user_name'=>$user_name,'phone_user'=>$user_phone,'insence_id'=>$id,'create_time'=>$create_time,'insence_num'=>$goods_num,'insence_cost'=>$data['jiage'],'insence_name'=>$data['insence_name'],'insence_jiage'=>$data['danjia'],'no_time'=>$no_time];
                $insert = Db::table('indent')->insertGetId($data);
                if(!empty($insert))
                {
                    // $new_kucun = bcsub($kucun,1);
                    
                    // Db::table('log')->insert(['kucun'=>$new_kucun]);
                    //订单入库成功之后减少商品的库存
                    $update = Db::table('insence')->where('id','=',"$id")->setDec('kucun',"$goods_num");
                    if(!empty($update))
                    {        
                        $k=$kucun-$goods_num;       
                        for($i=0;$i<$k;$i++)
                        {
                            $redis->lpush("$id",1);
                            // $redis->flushall();
                            // var_dump($redis->flushall());die;
                        }
                        //返回提交订单的页面，引导用户付款这里返回的是程序执行成功之后的标识
                        return $insert;
                    }else
                    {
                        return '库存减少失败';
                    }
                }else
                {
                    return '不能正常下单';
                }
            }

        }
        
    }
}