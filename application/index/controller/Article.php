<?php

namespace app\index\controller;

class Article extends Base
{
    // 文章详情页
    public function info($id)
    {
        $articleInfo = model('Article')->with('comments,comments.member')->find($id);
        $articleInfo->setInc('click');
        $viewData = [
            'articleInfo' => $articleInfo
        ];
        $this->assign($viewData);
        return view();
    }


    // 评论
    public function comment()
    {
        $data = [
            'content' => input('post.content'),
            'article_id' => input('post.article_id'),
            'member_id' => input('post.member_id'),
        ];
        $result = model('Comment')->comment($data);
        if ($result == 1) {
            $this->success('评论成功');
        } else {
            $this->error($result);
        }
    }
}
