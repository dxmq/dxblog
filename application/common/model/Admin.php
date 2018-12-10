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
        $ret = $this->allowField(true)->save($data);
        if ($ret) {
            return 1;
        } else {
            return '注册失败';
        }
    }

    // 忘记密码
    public function sendCode($data)
    {
        $validate = new \app\common\validate\Admin();
        if (! $validate->scene('sendCode')->check($data)) {
            return $validate->getError();
        }
        // 查询数据库中是否有这个邮箱
        $ret = $this->where('email', $data['email'])->find();
        if ($ret) {
            $code = mt_rand(1000, 9999);
            session('code', $code);
            $title = '重置密码';
            $content = '用户：' . $ret['username'] . '，您的重置密码的验证码是' . $code;
            $result = sendMail($data['email'], $title, $content);
            if ($result) {
                return 1;
            } else {
                return '邮件验证码发送失败';
            }
        } else {
            return '邮箱不存在';
        }
    }

    // 重置密码
    public function resetPassword($data)
    {
        $validate = new \app\common\validate\Admin();
        if (! $validate->scene('reset')->check($data)) {
            return $validate->getError();
        }
        if ($data['code'] == session('code')) {
            $user = $this->where('email', $data['email'])->find();
            $password = mt_rand(10000, 99999);
            $user->password = $password;
            $ret = $user->save();
            if ($ret) {
                $title = '重置密码';
                $content = '用户：' . $user['username'] . "，您的新的密码是：" . $password;
                $result = sendMail($data['email'], $title, $content);
                if ($result) {
                    return 1;
                } else {
                    return '邮件发送失败，重置密码失败！';
                }
            } else {
                return '重置失败';
            }
        } else {
            return '验证码不正确';
        }
    }

    // 管理员添加
    public function add($data)
    {
        $validate = new \app\common\validate\Admin();
        if (! $validate->scene('add')->check($data)) {
            return $validate->getError();
        }
        $result = $this->allowField(TRUE)->save($data);
        if ($result) {
            return 1;
        } else {
            return '管理员添加失败';
        }
    }

    // 管理员编辑
    public function edit($data)
    {
        $validate = new \app\common\validate\Admin();
        if (! $validate->scene('edit')->check($data)) {
            return $validate->getError();
        }
        $adminInfo = $this->find($data['id']);
        if ($adminInfo['username'] == $data['username'] || $adminInfo['email'] == $data['email'])
            return 1;
        $adminInfo->username = $data['username'];
        $adminInfo->password = $data['password'];
        $adminInfo->nickname = $data['nickname'];
        $adminInfo->email = $data['email'];
        $result = $adminInfo->save();
        if ($result) {
            return 1;
        } else {
            return '管理员编辑失败';
        }
    }

    // 管理员状态
    public function status($data)
    {
        $validate = new \app\common\validate\Admin();
        if (! $validate->scene('status')->check($data)) {
            return $validate->getError();
        }
        $adminInfo = $this->find($data['id']);
        $adminInfo->status = $data['status'];
        $result = $adminInfo->allowField(TRUE)->save();
        if ($result) {
            return 1;
        } else {
            return '操作失败';
        }
    }
}
