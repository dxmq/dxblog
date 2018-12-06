<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Admin extends Model
{
    // 软删除
    use SoftDelete;

    // 登录校验
    public function login($data)
    {
        $validate = new \app\common\validate\Admin();
        if (! $validate->scene('login')->check($data)) {
            return $validate->getError();
        }
        $result = $this->where($data)->find();
        if ($result) {
            // 判断用户是否可用
            if ($result['status'] != 1) {
                return '此帐户被禁用了！';
            }
            // 1表示有这个用户
            $sessionData = [
                'id' => $result['id'],
                'nickname' => $result['nickname'],
                'is_super' => $result['is_super']
            ];
            session('admin', $sessionData);
            return 1;
        } else {
            return '用户名密码错误！';
        }
    }

    // 注册
    public function register($data)
    {
        $validate = new \app\common\validate\Admin();
        if (! $validate->scene('register')->check($data)) {
            return $validate->getError();
        }
        $data['create_time'] = time();
        $ret = $this->save($data);
        if ($ret) {
            return 1;
        } else {
            return '注册失败';
        }
    }
}
