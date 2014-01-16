<?php
namespace Home\Controller;
use Think\Controller;
class MissionController extends Controller {
	public function _initialize(){
		$index=A('Index');
		$index->isLogin();
	}

	public function addm(){
		//获取团队成员
		$team=session("userteam");
		$user=M('userbase');
		$select['team']=$team;
		$re=$user->where($select)->select();
		$this->assign("oneteamusers",$re);
		//获取今日添加列表
		$Mission=M('mission');
		$select['poster']=session("username");
		$select['posttime']=array('gt',date("Y-m-d"));
		$re=$Mission->where($select)->order("posttime desc")->select();

		$this->assign("newmlist",$re);

	}
	//添加计划
	public function addMission(){
		$Mission=M('mission');
                     
		$content=I('post.content');
		$finishtime=I('post.finishtime');
		if($content==""){
			$this->ajaxReturn("content is null");
			return;
		}
		if($finishtime==""){
			$this->ajaxReturn("date is null");
			return;
		}

		$add['content']=$content;
		$add['poster']=I('post.poster');
		$add['finisher']=I('post.finisher');
		$add['posttime']=date('Y-m-d H:i:s');
		$add['finishtime']=$finishtime;
		$add['state']="new";

		$re=$Mission->add($add);
		if($re){
			$this->ajaxReturn("success");
		}else{
			$this->error("error");
		}
	}
	//待做任务
	public function todaym(){
		$Mission=M('mission');
		$user=session("username");
		//任务序列
		$select['state']="new";
		$select['finisher']=$user;
		$todaym=$Mission->where($select)->order("finishtime,posttime")->select();
		$this->assign("mlist",$todaym);
		//今日已完成序列
		unset($select);

		$select['finisher']=$user;
		$select['finishtime']=date("Y-m-d");
		$select['state']="done";
		$todaydm=$Mission->where($select)->order("posttime desc")->select();
		$this->assign("dmlist",$todaydm);
	}
	//任务标记为完成
	public function doneMission(){
		$id=I('post.id');

		$select['id']=$id;
		$save['state']="done";
		$save['finishtime']=date("Y-m-d");
		$Mission=M('mission');
		$re=$Mission->where($select)->save($save);
		$this->ajaxReturn($re);
	}
	//完毕任务界面
	public function donem(){
		$Mission=M('mission');
		$select['finisher']=session("username");
		$select['state']="done";
		$re=$Mission->where($select)->order("finishtime desc")->select();

		$this->assign("donem",$re);	

	}
	//删除任务by post.id
	public function delMission(){
		$id=I('post.id');
		$Mission=M('mission');
		$select['id']=$id;
		$re=$Mission->where($select)->delete();
		if($re){
			$this->ajaxReturn("success");
		}else{
			$this->ajaxReturn("error");
		}
		
	}
}