<?php
namespace app\index\controller;


use think\Db;

class Grade extends Base
{
    public function index(){
        $grade = Db::query("SELECT * from (select b.gid,g_name,count(*)as c from `stu_user` as a left join `stu_grade` as b on a.gid = b.gid group by g_name UNION (select b.gid,g_name,count(*)=0 as c from `stu_grade` as b where not EXISTS (select gid from `stu_user` as a where a.gid = b.gid )group by g_name)) as new_tab order by new_tab.gid desc");
        $this->assign([
            'grade'=>$grade,
        ]);
        return $this->fetch();
    }

    public function add(){
        if(input('get.')){
            $g_name=input('get.grade');
            $grade = Db::name('grade')->where('g_name',$g_name)->find();
            if($grade){
                return ['code'=>0,'msg'=>'该班级已存在'];
            } else{
                $res = Db::name('grade')->insert(['g_name'=>$g_name]);
                if($res){
                    return ['code'=>1,'msg'=>'添加成功'];
                }else{
                    return ['code'=>0,'msg'=>'数据出错，请重试'];
                }
            }

        }
        return $this->fetch();
    }

    public function edit(){
        if(input('route.gid')){
            $gra = Db::name('grade')->where('gid',input('route.gid'))->value('g_name');
            $this->assign([
                'gra'=>$gra,
                'gid'=>input('route.gid')
            ]);
        }
        if(input('get.')){
            $g_name=input('get.g_name');
            $grade = Db::name('grade')->where('g_name',$g_name)->find();
            if($grade){
                return ['code'=>0,'msg'=>'该班级已存在'];
            } else{
                $res = Db::name('grade')->where('gid',input('get.gid'))->update(['g_name'=>input('get.g_name')]);
                if($res){
                    return ['code'=>1,'msg'=>'编辑成功'];
                }else{
                    return ['code'=>0,'msg'=>'数据出错，请重试'];
                }
            }

        }

        return $this->fetch();
    }
    public function delete(){
        $student = Db::name('user')->alias('a')
            ->join('stu_grade b','a.gid=b.gid')->where('a.gid',input('get.gid'))->find();
        if($student){
            return $this->error('请操作没有学生的班级');
        }else{
            $res = Db::name('grade')->where('gid',input('get.gid'))->delete();
            if($res){
                return $this->success('删除成功');
            }else{
                return $this->error('数据执行有误，请重试');
            }
        }
    }
}