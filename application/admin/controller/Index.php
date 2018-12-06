<?php

namespace app\admin\controller;

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
                $this->success('注册成功', 'admin/index/login');
            } else {
                $this->error($result);
            }
        }
        return view();
    }
}
