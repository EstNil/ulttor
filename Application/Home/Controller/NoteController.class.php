<?php
namespace Home\Controller;
use Think\Controller;
class NoteController extends Controller {
	public function _initialize(){
		$index=A('Index');
		$index->isLogin();

	}


	//我的记事内容
	public function mynote(){
		$Note=M('notes');
		$select['poster']=session("username");
		$re=$Note->where($select)->limit(6)->order("posttime desc")->select();
		$this->assign("notelist",$re);

	} 

	//添加新的记事内容
	public function doAddNote(){
		//构造添加数组
		$content=I('post.content');
		if($content==""){
			$this->ajaxReturn("null:content");
			return;
		}
		$add['poster']=session("username");
		$add['type']=I('post.type');
		$add['content']=$content;
		$add['posttime']=date("Y-m-d H:i:s");
		$Note=M('notes');
		$re=$Note->add($add);
		if($re){
			$this->ajaxReturn("success");
		}else{
			$this->ajaxReturn("failed");
		}
	}
	//更新记事内容post[id&content]
	public function doSaveNote(){
		$Note=M('notes');
		$select['id']=I('post.id');

		$save['content']=I('post.content');
		$re=$Note->where($select)->save($save);
		if($re){
			$this->ajaxReturn("success");
		}else{
			$this->ajaxReturn("failed");
		}
		
	}
	//删除记事内容post[id]
	public function doDelNote(){
		$Note=M('notes');
		$select['id']=I('post.id');
		$re=$Note->where($select)->delete();
		if($re){
			$this->ajaxReturn("success");
		}else{
			$this->ajaxReturn("failed");
		}
	}
}

?>
