<?php
namespace User\Model;
use Think\Model;
class UserbaseModel extends Model{
	protected $_map = array(
		'name' => 'username',	
		'email'=>'usermail',
		'pwd'=>'userpwd',
	);
	protected $_validate = array(
		array('userpwd','require','密码不能为空',1),
		array('usermail','require','密码不能为空',1),	
		array('username','require','密码不能为空',1),
		array('username','','用户名已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
		array('usermail','','邮箱已被注册',0,'unique',1),
		array('userpwd','6,32','密码长度不符(6-30)',3,'length'),
		array('username','2,16','用户名长度不符(2-16)',3,'length'),
		array('usermail','10,32','邮箱长度不符(10-32)',3,'length'),
		array('pwd','surepwd','两次密码输入不一样','confirm'),
	);
	protected $_auto = array(
		// 自动更新
		array('userpwd','encrypt',3,'callback'),
		array('regtime','getNowTime',3,'callback'),
		array('group','default'),
		array('team','default'),

	);
	public function encrypt($pwd){
		return md5(md5($pwd).$pwd);
	}

	public function getNowTime(){
		return date("Y-m-d H:i:s");
	}
}
?>
