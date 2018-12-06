<?php
/**
 * Created by PhpStorm.
 * User: mint
 * Date: 2018/12/5
 * Time: 22:20
 */

namespace app\common\validate;


use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'username|管理员名称' => 'require',
        'password|密码' => 'require',
        'password2|确认密码' => 'require|confirm:password',
        'nickname|昵称' => 'require',
        'email' => 'require|email'
    ];

    // 登录验证场景
    public function sceneLogin()
    {
        return $this->only(['username', 'password']);
    }

    // 注册验证场景
    public function sceneRegister()
    {
        return $this->only(['username', 'password', 'password2', 'nickname', 'email']);
    }
}