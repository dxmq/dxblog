<?php

namespace app\admin\controller;


class Article extends Base
{
    // 文章列表
    public function lst()
    {
        $articles = model('Article')->with('cate')->order(['is_top' => 'desc', 'create_time' => 'desc'])->paginate('10');
        $viewData = [
            'articles' => $articles,
        ];
        $this->assign($viewData);
        return view();
    }

    // 文章添加
    public function add()
    {
        if ($this->request->isAjax()) {
            $data = [
                'title' => input('post.title'),
                'desc' => input('post.desc'),
                'tags' => input('post.tags'),
                'content' => input('post.content'),
                'is_top' => input('post.is_top', 0),
                'cate_id' => input('post.cate_id')
            ];
            $result = model('Article')->add($data);
            if ($result == 1) {
                $this->success('文章添加成功', 'admin/article/lst');
            } else {
                $this->error($result);
            }
        }
        $cateInfo = model('cate')->select();
        $viewData = [
            'cateInfo' => $cateInfo
        ];
        $this->assign($viewData);
        return view();
    }

    // 文章推荐
    public function top()
    {
        $data = [
            'is_top' => input('post.is_top') ? 0 : 1,
            'id' => input('post.id'),
        ];
        $result = model('Article')->top($data);
        if ($result == 1) {
            $this->success('操作成功', 'admin/article/lst');
        } else {
            return $result;
        }
    }

    // 文章编辑
    public function edit($id)
    {
        if ($this->request->isAjax()) {
            $data = [
                'id' => input('post.id'),
                'title' => input('post.title'),
                'desc' => input('post.desc'),
                'tags' => input('post.tags'),
                'content' => input('post.content'),
                'is_top' => input('post.is_top'),
                'cate_id' => input('post.cate_id')
            ];
            $result = model('Article')->edit($data);
            if ($result == 1) {
                $this->success('文章编辑成功', 'admin/article/lst');
            } else {
                $this->error($result);
            }
        }
        // 文章信息
        $articleInfo = model('Article')->find($id);
        // 导航信息
        $cates = model('Cate')->select();
        $viewData = [
            'articleInfo' => $articleInfo,
            'cates' => $cates
        ];
        $this->assign($viewData);
        return view();
    }

    // 文章删除
    public function del()
    {
        $articleInfo = model('Article')->find(input('post.id'));
        $ret = $articleInfo->delete();
        if ($ret) {
            $this->success('文章删除成功');
        } else {
            $this->error('文章删除失败');
        }
    }
}
