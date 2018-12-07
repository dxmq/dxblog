<?php

namespace app\admin\controller;

use think\captcha\Captcha;
use think\Controller;

class Index extends Controller
{
    // 后台登录
    public function login()
    {
        // 如果是ajax请求
        if ($this->request->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
            ];
            $result = model('admin')->login($data);
            if ($result == 1) {
                $this->success('登录成功', 'admin/home/index');
            } else {
                $this->error($result);
            }
        }
        return view();
    }

    // 后台注册
    public function register()
    {
        if ($this->request->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'password2' => input('post.password2'),
                'nickname' => input('post.nickname'),
                'email' => input('post.email'),
            ];
            $result = model('admin')->register($data);
            if ($result == 1) {
                // 注册成功
                $info = sendMail($data['email'], '注册成功', '注册成功!');
                $this->success('注册成功', 'admin/index/login', $info);
            } else {
                $this->error($result);
            }
        }
        return view();
    }

    // 忘记密码
    public function reset()
    {
        if ($this->request->isAjax()) {
            $data = [
                'email' => input('post.email')
            ];
            $result = model('admin')->sendCode($data);
            if ($result ==1) {
                $this->success('验证码已发送，请填写', 'admin/index/reset');
            } else {
                $this->error($result);
            }
        }
        return view();
    }

    // 重置密码
    public function resetPassword()
    {
        if ($this->request->isAjax()) {
            $data = [
                'email' => input('post.email'),
                'code' => input('post.code')
            ];
            $result = model('admin')->resetPassword($data);
            if ($result == 1) {
                $this->success('重置密码成功，新的密码已发送至您的邮箱', 'admin/index/login');
            } else {
                $this->error($result);
            }
        }
    }
}
