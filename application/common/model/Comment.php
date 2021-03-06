<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Comment extends Model
{
    // 软删除
    use SoftDelete;
    // 关联文章
    public function article()
    {
        return $this->belongsTo('Article', 'article_id', 'id');
    }
    // 关联会员
    public function member()
    {
        return $this->belongsTo('Member', 'member_id', 'id');
    }

    public function comment($data)
    {
        $validate = new \app\common\validate\Comment();
        if (! $validate->scene('comment')->check($data))
        {
            return $validate->getError();
        }
        $result = $this->allowField(TRUE)->save($data);
        if ($result) {
            return 1;
        } else {
            return '评论失败';
        }
    }
}
