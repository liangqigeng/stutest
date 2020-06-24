<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\facade\Session;

class Login extends Controller
{
    public function index(){
        return $this->fetch();
    }

    public function check()
    {
        if(input('post.')){
            $param = input('post.');
            $admin = Db::name('admin')->where('username', $param['username'])->find();
            $password = Db::name('admin')->where('username', $param['username'])->value('password');
            if ($admin) {
                if (md5($param['password']) == $password) {
                    Session::set("adminInfo", ["aid" => $admin['aid'], "username" => $admin['username']]);
                    return ["code" => 1, "msg" => "登录成功"];
                } else {
                    return ["code" => 0, "msg" => "账户或者密码错误"];
                }
            } else {
                return ["code" => 0, "msg" => "账号不存在"];
            }
        }

    }

}