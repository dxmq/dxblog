<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;
Route::group('admin', function () {
    Route::rule('/', 'admin/index/login', 'get|post');
    Route::rule('register', 'admin/index/register', 'get|post');
    Route::rule('reset', 'admin/index/reset', 'get|post');
    Route::rule('resetPassword', 'admin/index/resetPassword', 'post');
    Route::rule('index', 'admin/home/index', 'get');
    Route::rule('logout', 'admin/home/logout', 'post');
    Route::rule('catelst', 'admin/cate/lst', 'get');
    Route::rule('cateadd', 'admin/cate/add', 'get|post');
    Route::rule('catesort', 'admin/cate/sort', 'post');
    Route::rule('cateedit/[:id]', 'admin/cate/edit', 'get|post');
    Route::rule('catedelete', 'admin/cate/delete', 'post');
    Route::rule('articleadd', 'admin/article/add', 'get|post');
    Route::rule('articlelist', 'admin/article/lst', 'get');
    Route::rule('articletop', 'admin/article/top', 'post');
    Route::rule('articleedit/[:id]', 'admin/article/edit', 'get|post');
    Route::rule('articledelete', 'admin/article/del', 'post');
});
