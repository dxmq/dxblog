<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * 发送邮件
 */
use think\facade\Env;
function sendMail($to, $title, $content)
{
    // Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.163.com', 25))
        ->setUsername('13529565773@163.com')
        ->setPassword('ZC65773')
    ;

// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

// Create a message
    $message = (new Swift_Message($title))
        ->setFrom(['13529565773@163.com' => 'dxmq'])
        ->setTo($to)
        ->setBody($content)
    ;

// Send the message
    return $mailer->send($message);
}

// span 替换为 a
function replace($html) {
    return str_replace('span', 'a', $html);
}


/* 上传图片并生成缩略图
     * $name为表单上传的name值
     * $filePath为为保存在入口文件夹public下面uploads/下面的文件夹名称，没有的话会自动创建
     * $width指定缩略宽度
     * $height指定缩略高度
     * 自动生成的缩略图保存在$filePath文件夹下面的thumb文件夹里，自动创建
     * @return array 一个是图片路径，一个是缩略图路径，如下：
     * array(2) {
          ["img"] => string(57) "uploads/img/20171211\3d4ca4098a8fb0f90e5f53fd7cd71535.jpg"
          ["thumb_img"] => string(63) "uploads/img/thumb/20171211/3d4ca4098a8fb0f90e5f53fd7cd71535.jpg"
        }
     */
function uploadFile($name,$filePath,$width=100,$height=80)
{
    $file = request()->file($name);
    if($file){
        $filePaths = Env::get('root_path') . 'public' . '/uploads/' .$filePath;
        if(!file_exists($filePaths)){
            mkdir($filePaths,0777,true);
        }
        $info = $file->move($filePaths);
        if($info){
            $imgpath = 'uploads/'.$filePath.'/'.$info->getSaveName();
            $image = \think\Image::open($imgpath);
            $date_path = 'uploads/'.$filePath.'/thumb/'.date('Ymd');
            if(!file_exists($date_path)){
                mkdir($date_path,0777,true);
            }
            $thumb_path = $date_path.'/'.$info->getFilename();
            $image->thumb($width, $height)->save($thumb_path);
            $data['img'] = $imgpath;
            $data['thumb_img'] = $thumb_path;
            return $data;
        }else{
            // 上传失败获取错误信息
            return $file->getError();
        }
    }
}

// 字符串转数组
function strToArray($str)
{
    return explode('|', $str);
}