<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$this->display();
    }
    //主页工作页面显示
    public function studio(){
        if(!$this->isLogin()){
            return;
        }
        //获取二级菜单及显示页面
    	$menu=I('get.menu','default');
    	$page=I('get.page','default');

        switch ($menu) {
            case 'mission'://获取新的任务数
                $Mission=M('mission');
                $select['state']="new";
                $number=$Mission->where($select)->count();
                if($number==0){
                    $number="";
                }
                $this->assign("num",$number);
                break;
            
            default:
                # code...
                break;
        }


        $page=$menu."/".$page;//构造include页面路径
    	$menu=$menu."nav";//构造include二级导航页面路径
    	$this->assign("menu",$menu);
    	$this->assign("page",$page);
        //根据参数，获取相应的数据
        switch ($page) {
            case 'mission/addm':
                R('Mission/addm');
                break;
            case 'mission/todaym':
                R('Mission/todaym');
                break;
            case 'mission/donem':
                R('Mission/donem');
                break;
            case 'note/mynote':
                R('Note/mynote');
                break;
            case 'control/project':
                R('Control/project');
                break;
            case 'control/member':
                R('Control/member');
                break;
            default:
                
                # code...
                break;
        }
    	$this->display();
    }


    //登出
    public function logout(){
    	session(null);
    	$this->success("退出成功","index",1);
    }
    //是否登录
    public function isLogin(){
    	$key=session("username");
    	if($key==""||$key==null){
    		$this->error("请先登录","index",2);
    		return false;
    	}
    	return true;
    }
}