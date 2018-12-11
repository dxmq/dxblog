<?php

namespace app\admin\controller;


class Member extends Base
{
    //会员列表
    public function lst()
    {
        $members = model('Member')->order('id')->paginate('10');
        $viewData = [
            'members' => $members
        ];
        $this->assign($viewData);
        return view();
    }

    // 会员添加
    public function add()
    {
        if ($this->request->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'nickname' => input('post.nickname'),
                'email' => input('post.email'),
            ];
            $result = model('Member')->add($data);
            if ($result == 1) {
                $this->success('会员添加成功', 'admin/member/lst');
            } else {
                $this->error($result);
            }
        }
        return view();
    }

    // 会员编辑
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
            $result = model('Member')->edit($data);
            if ($result == 1) {
                $this->success('会员编辑成功', 'admin/member/lst');
            } else {
                $this->error($result);
            }
        }
        $members = model('Member')->find($id);
        $viewData = [
            'members' => $members
        ];
        $this->assign($viewData);
        return view();
    }

    // 会员删除
    public function del()
    {
        $members = model('Member')->with('comments')->find(input('post.id'));
        $result = $members->together('comments')->delete();
        if ($result) {
            $this->success('会员删除成功');
        } else {
            $this->error('会员删除失败');
        }
    }
}
