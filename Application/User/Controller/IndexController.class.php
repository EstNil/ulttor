<?php
namespace User\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->dispaly();
    }
    //登录方法
    public function dologin(){
        $userbase=M('userbase');
        $name=I('post.name');
        $pwd=I('post.pwd');

        $select['username']=$name;
        $select['userpwd']=md5(md5($pwd).$pwd);

        $re=$userbase->where($select)->find();

        if($re){
            session(null);
            session("username",$re['username']);
            session("usermail",$re['usermail']);
            session("usergroup",$re['group']);
            session("userteam",$re['team']);
            $this->success("登录成功",U('Home/Index/studio'),1);
        }else{
            $this->error("用户名或密码错误","",2);
        }
    }
    //注册界面显示
    public function register(){
        $this->display();
    }

    //注册方法
    public function doregister(){
        $reg=D('userbase');
        if($reg->create()){
            if($reg->add()){
                $this->success("注册成功",U("Home/Index/index"),2); 

            }else{
                $this->error("注册失败");
            }
        }else{
            $this->error($reg->getError());
        }
    }
}