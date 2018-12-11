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
// 前台路由
Route::rule('cate/:id', 'index/index/index', 'get');
Route::rule('/', 'index/index/index', 'get');
Route::rule('article-<id>', 'index/article/info', 'get');
Route::rule('register', 'index/index/register', 'get|post');
Route::rule('login', 'index/index/login', 'get|post');
Route::rule('logout', 'index/index/logout', 'post');
Route::rule('search', 'index/index/search', 'get');
Route::rule('comment', 'index/article/comment', 'post');
// 后台路由
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
    Route::rule('memberlst', 'admin/member/lst', 'get');
    Route::rule('memberadd', 'admin/member/add', 'get|post');
    Route::rule('memberedit/[:id]', 'admin/member/edit', 'get|post');
    Route::rule('memberdelete', 'admin/member/del', 'post');
    Route::rule('adminlst', 'admin/admin/lst', 'get|post');
    Route::rule('adminadd', 'admin/admin/add', 'get|post');
    Route::rule('adminedit/[:id]', 'admin/admin/edit', 'get|post');
    Route::rule('adminstatus', 'admin/admin/status', 'post');
    Route::rule('admindelete', 'admin/admin/del', 'post');
    Route::rule('commentlst', 'admin/comment/lst', 'get');
    Route::rule('commentdel', 'admin/comment/del', 'post');
    Route::rule('systemset', 'admin/system/set', 'get|post');
});
