<?php

namespace app\admin\controller;

use think\Controller;

class Admin extends Controller
{
    // 管理员列表
    public function lst()
    {
        $data = model('Admin')->paginate(10);
        $page = $data->render();
        $page = replace($page);
        $data = $data->toArray()['data'];
        if ($this->request->isAjax()) {
            $data['page'] = $page;
            $data['status1'] = 1;
            return json($data); // 返回json数据
        }
        $this->assign('page', $page);
        $this->assign('data', $data);
        return view();
    }

    // 管理员添加
    public function add()
    {
        if ($this->request->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'password2' => input('post.password2'),
                'nickname' => input('post.nickname'),
                'email' => input('post.email'),
            ];
            $result = model('Admin')->add($data);
            if ($result == 1) {
                $this->success('管理员添加成功', 'admin/admin/lst');
            } else {
                $this->error($result);
            }
        }
        return view();
    }

    // 管理员编辑
    public function edit($id)
    {
        if ($this->request->isAjax()) {
            $data = [
                'id' => input('post.id'),
                'username' => input('post.username'),
                'password' => input('post.password'),
                'nickname' => input('post.nickname'),
                'email' => input('post.email'),
            ];
            $result = model('Admin')->edit($data);
            if ($result == 1) {
                $this->success('管理员编辑成功', 'admin/admin/lst');
            } else {
                $this->error($result);
            }
        }
        $admins = model('Admin')->find($id);
        $viewData = [
            'admins' => $admins
        ];
        $this->assign($viewData);
        return view();
    }

    // 管理员状态
    public function status()
    {
        $data = [
            'id' => input('post.id'),
            'status' => input('post.status') ? 0 :1,
        ];
        $result = model('Admin')->status($data);
        if ($result == 1) {
            $this->success('操作成功', 'admin/admin/lst');
        } else{
            $this->error($result);
        }
    }

    // 管理员删除
    public function del()
    {
        $adminInfo = model('Admin')->find(input('post.id'));
        $result = $adminInfo->delete();
        if ($result) {
            $this->success('管理员删除成功');
        } else {
            $this->error('管理员删除失败');
        }
    }
}
