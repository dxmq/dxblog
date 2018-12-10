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
        'email|邮箱' => 'require|email',
        'code|验证码' => 'require|number',
        'id|管理员id' => 'require|number',
        'status|管理员状态' => 'require|number'
    ];

    // 登录验证场景
    public function sceneLogin()
    {
        return $this->only(['username', 'password']);
    }

    // 注册验证场景
    public function sceneRegister()
    {
        return $this->only(['username', 'password', 'password2', 'nickname', 'email'])->append('username', 'unique:admin');
    }

    // 发送邮箱时的验证
    public function sceneSendCode()
    {
        return $this->only(['email']);
    }

    // 重置密码时的验证
    public function sceneReset()
    {
        return $this->only(['email', 'code']);
    }

    // 管理员添加时的验证
    public function sceneAdd()
    {
        return $this->only(['username', 'password', 'password2', 'nickname', 'email'])->append('username', 'unique:admin');
    }

    // 管理员编辑时的验证
    public function sceneEdit()
    {
        return $this->only(['username', 'password', 'nickname', 'email', 'id'])->append('username', 'unique:admin');
    }

    // 管理员状态的验证
    public function sceneStatus()
    {
        return $this->only(['id', 'status']);
    }
}