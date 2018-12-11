<?php
namespace app\index\controller;

class Index extends Base
{
    // 前台首页
    public function index()
    {
        $where = [];
        $catename = null;
        if (input('id')) {
            $where = [
                'cate_id' => input('id')
            ];
            $catename = model('Cate')->where('id', input('id'))->value('catename');
        }
        // 取出文章
        $articles = model('Article')->where($where)->order('create_time', 'desc')->paginate(2);
        $viewData = [
            'articles' => $articles,
            'catename' => $catename
        ];
        $this->assign($viewData);
        return view();
    }

    // 注册
    public function register()
    {
        if ($this->request->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'password2' => input('post.password2'),
                'nickname' => input('post.nickname'),
                'email' => input('post.email'),
                'verify' => input('post.verify'),
            ];
            $result = model('Member')->register($data);
            if ($result == 1) {
                $this->success('注册成功', 'index/index/login');
            } else {
                $this->error($result);
            }
        }
        return view();
    }

    // 登录
    public function login()
    {
        if ($this->request->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'verify' => input('post.verify')
            ];
            $result = model('Member')->login($data);
            if ($result == 1) {
                $this->success('登录成功', 'index/index/index');
            } else {
                $this->error($result);
            }
        }
        return view();
    }

    // 退出
    public function logout()
    {
        session(null);
        if (! session('?index.id')) {
            $this->success('退出成功', 'index/index/index');
        } else {
            $this->error('退出失败');
        }
    }

    // 搜索
    public function search()
    {
        $keywords = input('keywords');
        $where[] = ['title', 'like', '%'.$keywords.'%'];
        $articles = model('Article')->where($where)->order('create_time', 'desc')->paginate('2');
        $viewData = [
            'articles' => $articles,
            'cates' => $keywords
        ];
        $this->assign($viewData);
        return view('index');
    }
}
