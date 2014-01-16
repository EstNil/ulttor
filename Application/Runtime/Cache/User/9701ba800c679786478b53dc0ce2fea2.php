<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="UTF-8">
<script src="/ulttor/Public/js/jquery-1.7.2.min.js"></script>
<script src="/ulttor/Public/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="/ulttor/Public/css/bootstrap.css">
<style>
	body{
		font-family: 微软雅黑;
	}
</style>
	<title>ULTTOR团队协作-注册</title>
</head>
<body style="background:#efefef;">
	<div class="container">
		<div class="col-md-4 col-md-offset-4">
			<div class="register" style="margin-top:30%">
				<legend>ULTTOR团队-用户注册</legend>
				<form action="doregister" method="post" class="text-center">
					<input type="text" class="form-control input-lg" placeholder="用户名" name="name"> 
					<input type="email" class="form-control input-lg" placeholder="邮箱地址" name="email">
					<input type="password" class="form-control input-lg" placeholder="密码" name="pwd">
					<input type="password" class="form-control input-lg" placeholder="确认密码" name="surepwd">
					<br>
					<input type="submit" class="btn btn-primary btn-lg" value="注册">
			 	</form>
			 	
			</div>		
		</div>

	</div>
	
</body>
</html>