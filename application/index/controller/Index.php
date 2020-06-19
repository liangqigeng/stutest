<?php
namespace app\index\controller;

use think\Db;
use think\facade\Session;

class Index extends Base
{
    public function index(){
        $info = Session::get("adminInfo");
        $this->assign([
            'username'=>$info['username'],
        ]);
        return $this->fetch();
    }

    public function welcome(){
        $admin =Db::name('admin')->count();
        $student =Db::name('user')->count();
        $grade =Db::name('grade')->count();
        $this->assign([
            'admin'=>$admin,
            'student'=>$student,
            'grade'=>$grade,
        ]);
        return $this->fetch();
    }
    public function loginOut(){
        session('adminInfo',null);
        $this->redirect(url('login/index'));
    }

}

