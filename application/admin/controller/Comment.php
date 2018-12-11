<?php

namespace app\admin\controller;

class comment extends Base
{
    // 评论列表
    public function lst()
    {
        $comments = model('Comment')->with('article,member')->order(['create_time' => 'desc'])->paginate('10');
        $viewData = [
            'comments' => $comments
        ];
        $this->assign($viewData);
        return view();
    }

    // 删除评论
    public function del()
    {
        $commentsInfo  = model('Comment')->find(input('post.id'));
        $result = $commentsInfo->delete();
        if ($result) {
            $this->success('删除评论成功');
        } else {
            $this->error('删除评论失败');
        }
    }
}
