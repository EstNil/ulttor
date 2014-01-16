<?php
namespace Home\Controller;
use Think\Controller;
class ControlController extends Controller {
	public function _initialize(){
		$index=A('Index');
		$index->isLogin();
	}
	//项目管理
	public function project(){
		$Project=M('project');
		$select['creater']=session("username");
		$re=$Project->where($select)->select();

		$this->assign("projectlist",$re);
	}
	//成员管理
	public function member(){
		//查询项目
		$Project=M('project');
		$select['creater']=session("username");
		$re=$Project->where($select)->select();

		$this->assign("projectlist",$re);
		
	}
	//添加项目[post.name&post.intro&post.finishtime]
	public function doAddProject(){
		$Project=M('project');
		//项目名称唯一性
		$select['name']=I('post.name');
		if($Project->where($select)->find()){
			$this->ajaxReturn("exist");
			return;
		}
		//添加创建者为项目成员
		$Member=M('member');
		$add['project']=I('post.name');
		$add['member']=session("username");
		$add['type']="creater";

		$re1=$Member->add($add);
		unset($add);

		//添加项目字段
		$add['name']=I('post.name');
		$add['introduce']=I('post.intro');
		$add['finishtime']=I('post.finishtime');
		$add['creater']=session("username");
		$add['state']="new";
		$add['creattime']=date("Y-m-d H:i:s");

		$re=$Project->add($add);
		if($re){
			$this->ajaxReturn("success");
		}else{
			$this->ajaxReturn("failed");
		}
	}
	//删除项目[post.id]
	public function doDelProject(){
		$Project=M('project');
		$select['id']=I('post.id');
		$re=$Project->where($select)->delete();
		$name=$Project->where($select)->getField('name');
		unset($select);
		//删除相应的项目成员
		$Member=M('member');
		$select['project']=$name;
		$re1=$Member->where($select)->delete();

		if($re){
			$this->ajaxReturn("success");
		}else{
			$this->ajaxReturn("failed");
		}
	}
	//添加项目成员[post.project&post.member&post.type]
	public function doAddMember(){
		$member=I('post.member');
		//查询该用户是否存在
		$UserBase=M('userbase');
		$select['username']=$member;
		$re=$UserBase->where($select)->find();
		if(!$re){
			$this->ajaxReturn("exist");
			return;
		}
		unset($select);
		//是否重复添加
		$Member=M('member');
		$select['member']=$member;
		$select['project']=I('post.project');
		$re=$Member->where($select)->find();
		if($re){
			$this->ajaxReturn("exist");
		}else{
			$select['type']=I('post.type');
			$re1=$Member->add($select);
			if($re1){
				$this->ajaxReturn("success");
			}else{
				$this->ajaxReturn("failed");
			}
		}
		
	}
	//获取某个项目的成员
	public function doGetMember(){
		$Member=M('member');
		$project=I('post.name');
		$select['project']=$project;
		$re=$Member->where($select)->select();
		if($re){
			$this->ajaxReturn($re);
		}else{
			$this->ajaxReturn("failed");
		}
	}
	//删除项目成员[post.project&post.member]
	public function doDelMember(){

		$member=I('post.member');
		if($member==session("username")){
			$this->ajaxReturn("creater");
			return;
		}
		$Member=M('member');
		$select['project']=I('post.project');
		$select['member']=$member;

		$re=$Member->where($select)->delete();
		if($re){
			$this->ajaxReturn("success");
		}else{
			$this->ajaxReturn("failed");
		}
	}
}

?>