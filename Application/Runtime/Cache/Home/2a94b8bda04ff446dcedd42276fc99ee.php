<?php if (!defined('THINK_PATH')) exit();?> <!doctype html>
 <html>
 <head>
 	<meta charset="UTF-8">
<script src="/ulttor/Public/js/jquery-1.7.2.min.js"></script>
<script src="/ulttor/Public/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="/ulttor/Public/css/bootstrap.css">
<style>
	body{
		font-family:微软雅黑;
		font-size:15px;
	}
</style>
 	<title>ULTTOR团队协作平台</title>
 </head>
 
 <body style="background:#efefef;">
 	<div class="container">
 		<div class="col-md-4 col-md-offset-4">
 			<div class="login" style="margin-top:40%">
	<form action="/ulttor/index.php/User/Index/dologin" method="post" class="text-center">
		<input type="text" class="form-control input-lg" placeholder="用户名" name="name"> 
		<br>
		<input type="password" class="form-control input-lg" placeholder="密码" name="pwd">
		<br>
		<input type="submit" class="btn btn-primary btn-lg" value="登录">
 	</form>
 	<a href="/ulttor/index.php/User/Index/register">注册</a>
</div>
			
 		</div>
 	</div>
 </body>
 </html>