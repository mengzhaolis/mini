<?php

namespace app\index\verifiction;

use think\Request;
use app\validate\controller\BaseValidate;

Class Verif extends BaseValidate
{
    //自定义验证器
    //自定义验证器规则
    //验证器的使用验证器的访问权限是protected
    //并且验证器有一个固定的参数为$rule而且$rule为数组
    protected $rule = ['id' => 'require|Z_verif',

    
     ];
    //自定义验证规则首先在于官方没有给出我们自己想要的验证规则的情况下，自定义验证规则在于自己定义方法自己调用从而实现匹配自己定义的规则
    /*
      自定义验证规则实现的流程
      首先我们在开头就已经调用了Vlidate类  
      进而继承了这个类，那么我们在自定义的时候就是相当于往这个类里面写入方法相当于帮助tp5构建自定义的验证器
    **/
    //但是自己定义的规则访问的权限为protected
    //自定义的验证规则必须有参数传入以便于实验对于数据的验证
    //$value    需要验证参数的值
    //$rule     验证的规则
    //$data     传输的数据
    //$filed    验证的字段
    protected function Z_verif($value,$rule='',$data='',$field='')
    {
        //编写具体的验证规则
        if(is_numeric($value) && is_int($value) && ($value+0) >0 )
        {
            return true;
        }
        else
        {
            echo $field."参数存在问题";
        }
    }
}




?>