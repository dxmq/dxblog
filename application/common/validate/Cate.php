<?php
/**
 * Created by PhpStorm.
 * User: mint
 * Date: 2018/12/8
 * Time: 12:49
 */

namespace app\common\validate;


use think\Validate;

class Cate extends Validate
{
    protected $rule = [
        'catename' => 'require|unique:cate',
        'sort' => 'require|number'
    ];

    protected $message = [
        'catename.require' => '栏目名称不能为空',
        'catename.unique' => '栏目已经存在',
        'sort.require' => '排序不能为空',
        'sort.number' => '排序必须是数字类型'
    ];
    // 添加栏目时的验证场景
    public function sceneAdd()
    {
        return $this->only(['catename', 'sort']);
    }

    // 栏目排序验证场景
    public function sceneSort()
    {
        return $this->only(['sort']);
    }

    // 栏目排序验证场景
    public function sceneEdit()
    {
        return $this->only(['catename']);
    }
}