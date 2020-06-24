<?php
namespace app\index\controller;

use think\Db;

class Student extends Base
{
    //显示数据
    public function index(){
            $list = Db::name('user')->field('uid,username,g_name')->alias('a')
                ->join('stu_grade b','b.gid=a.gid')->order('uid','desc')->select();
            $this->assign([
                'list'=>$list,
            ]);
        return $this->fetch();
    }

    public function lists(){
        if(request()->isGet()) {

        }

    }

    public function add(){
        $grades = Db::name('grade')->field('gid,g_name')->select();
        $this->assign([
            'grades'=>$grades,
        ]);
        if(input('get.')){
            $param = input('get.');
            $gid = $param['grade'];
            $grade = Db::name('grade')->where('gid',$param['grade'])->value('g_name');
            $username = Db::name('user')->field('username')->where('username',$param['username'])->find();
            if($grade == ''&&$username == ''){
                Db::transaction(function () {
                    $param = input('get.');
                    $grade = Db::name('grade')->where('gid',$param['grade'])->value('g_name');
                    $data = ['g_name'=>$grade];
                    Db::name('grade')->insert($data);
                    $data1 = ['username'=>$param['username'],'gid'=>$param['grade']];
                    Db::name('user')->insert($data1);
                });
//            $data = ['username'=>$param['username'],'g_name'=>$param['grade']];
//            Db::name('grade')->insert($data);
                return ['code'=>1,"msg"=>'添加学生、班级成功'];
            }
            else if($grade == ''||$username == ''){
                //return 1;die;
                if($grade == ''){
                    $data = ['g_name'=>$param['grade']];
                    Db::name('grade')->insert($data);
                    return ['code'=>1,"msg"=>'添加班级成功'];
                }else {
                    //return 2;die;
                    $data = ['username'=>$param['username'],'gid'=>$gid];
//                    return $data;die;
                    $res = Db::name('user')->insert($data);
                    if($res){
                        return ['code'=>1,"msg"=>'添加学生成功'];
                    }else{
//                        return 0;die;
                        return ['code'=>0,"msg"=>'数据有误'];
                    }

                }
            }
            else{
                return ['code'=>2,"msg"=>'学生已存在，为您展示所有数据'];
            }
        }

        return $this->fetch();
    }



    public function edit(){
        if(input('route.uid')) {
            $info = Db::name('user')->where('uid', input('route.uid'))->find();
            $grade = Db::name('grade')->where('gid', $info['gid'])->value('g_name');
            $grades = Db::name('grade')->select();
            $this->assign([
                'username' => $info['username'],
                'uid' => input('route.uid'),
                'grade' => $grade,
                'gid' => input('param.uid'),
                'grades' => $grades,
            ]);
        }
            if (input('get.')) {
                $data = array(
                    'username' => input('get.username'),
                    'gid' => input('get.grade')
                );
                $res = Db::name('user')->where('uid', input('get.uid'))->update($data);
                if ($res) {
                    return ['code' => 1, 'msg' => '修改成功'];
                } else {
                    return ['code' => 0, 'msg' => '数据出错，请重试'];
                }

             }

//        $this->error('非法页面请重试。。。');
        return $this->fetch();
    }

    public function delete(){
        $res = Db::name('user')->where('uid',input('get.id'))->delete();
        if($res){
            return ['code'=>1,'msg'=>'删除成功'];
        }else{
            return ['code'=>0,'msg'=>'数据执行有误，请重试'];
        }
    }

}
