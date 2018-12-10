<?php
/**
 * Created by PhpStorm.
 * User: mint
 * Date: 2018/12/9
 * Time: 14:01
 */

namespace app\common\validate;


use think\Validate;

class Member extends Validate
{
    protected $rule = [
        'username|会员名称' => 'require|unique:member',
        'password|密码' => 'require',
        'nickname|昵称' => 'require',
        'email|邮箱' => 'require|email|unique:member',
        'id|会员id' => 'require|number'
    ];

    // 添加会员时的验证规则
    public function sceneAdd()
    {
        return $this->only(['username', 'password', 'nickname', 'email']);
    }

    // 编辑会员时的验证规则
    public function sceneEdit()
    {
        return $this->only(['username', 'password', 'nickname', 'email', 'id']);
    }
}