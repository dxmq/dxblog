<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class System extends Model
{
    // 软删除
    use SoftDelete;
    // 网站设置
    public function set($data)
    {
        $validate = new \app\common\validate\System();
        if (! $validate->check($data)) {
            return $validate->getError();
        }
        $webInfo = $this->find($data['id']);
        $webInfo->webname = $data['webname'];
        $webInfo->copyright = $data['copyright'];
        $result = $webInfo->save();
        if ($result) {
            return 1;
        } else {
            return '设置失败';
        }
    }
}
