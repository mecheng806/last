<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\User;
use think\Session;
use think\Cache;
class Users extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return $this->fetch('register');

    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function login(Request $request)
    {   
        if($request->post()){
            $login = $request->post();
            //检查账号
            $user = new User();
            $userinfo = $user->getUserInfo($login['username']);
            if(empty($userinfo)){
                $this->error('用户名不存在');
            }else{
                if($userinfo['password'] != $login['password']){
                    $this->error('密码错误');
                }else{
                    //存储用户的数据
                    Session::set('userinfo',$userinfo);
                    return '登录成功';
                }
            }
        }else{
            return $this->fetch('login');
        }
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = input('post.');
        if(empty($data['username']) || empty($data['password'])){
            $this->error('用户或密码为空');
        }else{
            $user = new User();
            //判断用户名是否重复
            $userinfo = $user->getUserInfo($data['username']);
            if($userinfo){
                $this->error('用户名已存在');
            }else{
               //保存数据
                if($user->saveData($data)){
                    return '添加数据成功';
                }else{
                    $this->error('添加数据失败');
                } 
            }
            
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read(Request $request)
    {
        //使用redis
        return Cache::store('redis')->get('what');
        //return 123;
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
