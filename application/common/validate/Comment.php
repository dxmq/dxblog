<?php
/**
 * Created by PhpStorm.
 * User: mint
 * Date: 2018/12/11
 * Time: 20:13
 */

namespace app\common\validate;


use think\Validate;

class Comment extends Validate
{
    protected $rule = [
        'content|评论内容' => 'require',
        'article_id' => 'require|number',
        'member_id' => 'require|number',
    ];
    public function sceneComment()
    {
        return $this->only(['comment', 'article_id', 'member_id']);
    }
}