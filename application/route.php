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
use think\Route;
Route::rule('blog/:id','index/Blog/read');
Route::get('/',function(){
	return 'hello,mei cheng';
});
Route::get('hello',function(){
	return 'I am a student!';
});
Route::rule('redis','index/Users/read');
Route::rule('show/:id','index/Blog/save');
Route::rule('register','index/Users/index');
Route::rule('login','index/Users/login');
//Route::rule('blog_save','index/Blog/save');
return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];

