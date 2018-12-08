<?php

namespace app\admin\controller;


class Cate extends Base
{
    // 栏目列表
    public function lst()
    {
        $cates = model('Cate')->lst();
        $viewData = [
            'cates' => $cates,
        ];
        $this->assign($viewData);
        return view();
    }

    // 栏目添加
    public function add()
    {
        if ($this->request->isAjax()) {
            $data = [
                'catename' => input('post.catename'),
                'sort' => input('post.sort')
            ];
            $result = model('cate')->add($data);
            if ($result == 1) {
                $this->success('栏目添加成功', 'admin/cate/lst');
            } else {
                $this->error($result);
            }
        }
        return view();
    }

    // 栏目排序
    public function sort()
    {
        $data = [
            'id' => input('post.id'),
            'sort' => input('post.sort')
        ];
        $result = model('cate')->sort($data);
        if ($result == 1) {
            $this->success('排序成功', 'admin/cate/lst');
        } else {
            $this->error($result);
        }
    }

    // 栏目修改
    public function edit()
    {
        if ($this->request->isAjax()) {
            $data = [
                'id' => input('post.id'),
                'catename' => input('post.catename'),
            ];
            $result = model('cate')->edit($data);
            if ($result == 1) {
                $this->success('栏目修改成功', 'admin/cate/lst');
            } else {
                $this->error($result);
            }
        }
        $cates = model('cate')->find(input('id'));
        // 模板数据
        $viewData = [
            'cates' => $cates,
        ];
        $this->assign($viewData);
        return view();
    }

    // 栏目删除
    public function delete()
    {
        $cateInfo = model('cate')->find(input('post.id'));
        $result = $cateInfo->delete();
        if ($result) {
            $this->success('栏目删除成功');
        } else {
            $this->error('栏目删除失败');
        }
    }
}
