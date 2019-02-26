<?php

namespace app\index\model;

use think\Model;
use think\Db;
class Data extends Model
{
    function get_data(){
    	$data = Db::name('data')->where('id','>',2)->select();
    	return $data;
    }
}

