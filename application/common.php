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