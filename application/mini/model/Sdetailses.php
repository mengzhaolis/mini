<?php

namespace app\mini\model;

use think\Request;
use think\Db;
use think\Model;
use think\Cache;
use think\cache\driver\Redis;


class Sdetailses extends Model
{
    //商品详情数据查询
    public function details($id)
    {
        $id=abs("$id");
        // var_dump($id);die;
        if(!is_numeric($id))
        {
            return '参数错误';
        }else
        {
            $details = Db::table('insence')->alias('i')
            ->join('images img','i.image = img.id','Left')->field('insence.id,i.name,i.jiage,guige,kucun,canshu,baozhang,xiangqing,img_path')->where('i.id','=',"$id")->select();
            // var_dump($details);die;
            if(empty($details))
            {
                return '商品不存在!!!';
            }else
            {
                $kucun = $details[0]['kucun'];
                $key = $details[0]['id'];        
                if($kucun > 0)
                {
                    //商品的库存数量正常的情况下将商品的库存写入缓存当中每次写入的值为1
                    $redis = new\Redis();
                    $r = $redis->connect('127.0.0.1','6379');
                    //首先设置商品库存的队列
                    $goods_start = $redis->llen("$key");
                    // return $goods_start;
                    //通过循环就能检测到库存的变化，在没有变化的时候列表的key值是不会变化的，有改变的时候列表的key会随着库存的数量经过循环的方式而改变
                    for($i=0;$i<$kucun;$i++)
                    {
                        $redis->lpush("$key",1);
                        
                        // $redis->flushall();
                        // var_dump($redis->flushall());die;
                    }
                    // return $redis->keys("$key");
                    // var_dump($redis->keys("$key"));die;
                }else
                {
                    //返回值为0禁用下单按钮
                    var_dump('商品售罄，暂时无货');die;
                }
                
                return $details;
            }
            // var_dump($details);die;
        }
    }
    
        
}


?>