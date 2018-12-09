<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Cate extends Model
{
    use SoftDelete;

    // 关联模型
    public function article()
    {
        return $this->hasMany('Article', 'cate_id', 'id');
    }
    // 栏目添加
    public function add($data)
    {
        $validate = new \app\common\validate\Cate();
        if (! $validate->scene('add')->check($data)) {
            return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if ($result) {
            return 1;
        } else {
            return '栏目添加失败';
        }
    }

    // 栏目列表
    public function lst()
    {
        $data= $this->order('sort', 'asc')->paginate('10');
        return $data;
    }

    // 栏目排序
    public function sort($data)
    {
        $validate = new \app\common\validate\Cate();
        if (! $validate->scene('sort')->check($data)) {
            return $validate->getError();
        }
        $cateInfo = $this->find($data['id']);
        $cateInfo->sort = $data['sort'];
        $ret = $cateInfo->save();
        if ($ret) {
            return 1;
        } else {
            return '栏目排序失败';
        }
    }

    // 栏目修改
    public function edit($data)
    {
        $validate = new \app\common\validate\Cate();
        if (! $validate->scene('edit')->check($data)) {
            return $validate->getError();
        }
        $cateInfo = $this->find($data['id']);
        if (! $cateInfo['catename'] == $data['catename']) {
            $cateInfo->catename = $data['catename'];
            $ret = $cateInfo->save();
        } else {
            return '1';
        }
        if ($ret) {
            return 1;
        } else {
            return '栏目修改失败';
        }
    }
}
