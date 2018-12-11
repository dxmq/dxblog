<?php
/**
 * Created by PhpStorm.
 * User: mint
 * Date: 2018/12/8
 * Time: 16:57
 */

namespace app\common\validate;


use think\Validate;

class Article extends Validate
{
    protected $rule = [
        'title|文章标题' => 'require|unique:article',
        'author|作者' => 'require',
        'tags|标签' => 'require',
        'cate_id|栏目' => 'require|number',
        'desc|文章概要' => 'require',
        'content|内容' => 'require',
        'is_top|推荐' => 'require',
        'id' => 'require|number'
    ];

    // 添加时的验证场景
    public function sceneAdd()
    {
        return $this->only(['title', 'author', 'tags', 'cate_id', 'desc', 'content']);
    }

    // 推荐时的验证场景
    public function sceneTop()
    {
        return $this->only(['is_top']);
    }

    // 编辑时的验证场景
    public function sceneEdit()
    {
        return $this->only(['title', 'author', 'tags', 'cate_id', 'desc', 'content', 'id']);
    }
}