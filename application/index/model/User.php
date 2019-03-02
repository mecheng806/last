<?php

namespace app\index\model;

use think\Model;
use think\Db;
class User extends Model
{
    public function saveData($data){
    	$data['register_time'] = time();
    	return Db::table('user')->insert($data);
    }
    public function getUserInfo($username){
    	return Db::table('user')->where('username',$username)->find();
    }
}
