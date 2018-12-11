<?php
/**
 * Created by PhpStorm.
 * User: mint
 * Date: 2018/12/10
 * Time: 23:08
 */

namespace app\common\validate;


use think\Validate;

class System extends Validate
{
    protected $rule = [
        'webname|网站标题' => 'require',
        'copyright|版权信息' => 'require'
    ];
}