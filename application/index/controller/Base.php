<?php

namespace app\index\controller;

use think\Controller;

class Base extends Controller
{
    public function initialize()
    {
        // 取出所有的栏目, 使用共享视图
        $cates = model('Cate')->order('sort')->select();
        // 版权信息
        $webInfo = model('System')->find();
        // 推荐文章
        $topArticle = model('Article')
            ->where('is_top', 1)
            ->order('create_time', 'desc')
            ->limit(10)
            ->select();
        $viewData = [
            'cates' => $cates,
            'webInfo' => $webInfo,
            'topArticle' => $topArticle
        ];
        $this->view->share($viewData);
    }
}
