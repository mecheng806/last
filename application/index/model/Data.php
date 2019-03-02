<?php

namespace app\index\model;

use think\Model;
use think\Db;
class Data extends Model
{
    function get_data($id){
    	$data = Db::name('data')->where('id','>',$id)->select();
    	return $data;
    }
}

