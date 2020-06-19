<?php
namespace app\index\controller;
use think\Controller;
use think\facade\Session;

class Base extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $info = Session::get("adminInfo");
        if (Session::has("adminInfo")) {

        } else {
            return $this->error("没有登陆",url("login/index"));
        }
    }
}