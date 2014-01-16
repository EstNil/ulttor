<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
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
	<title>Ulttor</title>
	<style>
		.second_nav{
			background:#dedede;
			padding:0px;
			min-height:500px;
			border-radius: 3px 1px 1px 3px;
			margin-top:3px;
			margin-left:5px;
			box-shadow: 1px 1px 3px #111;
		}
		.show_content{
			background:#bcbcbc;
			padding:0px;
			min-height:600px;
			border-radius: 1px 3px 1px 2px;
			margin-top:3px;
			margin-left:5px;
			margin-right:-15px;
			box-shadow: 2px 2px 8px #111;
		}
		.logo{
			float:left;
			font-family: 微软雅黑;
			color:#dedede;
			text-shadow:2px 2px 5px black;
		}
		.info{
			float:right;
			margin-top:40px;
			height:20px;
			color:#eaeaea;
			line-height: 20px;
		}
	</style>
</head>
<body style="background:#555;">
	<div class="container">

		<div class="row">
			<div class="col-md-11 col-md-offset-1">
				<h1 class="logo">Ulttor 团队协作</h1>
				<h5 class="info"><span class="glyphicon glyphicon-user"></span> <?php echo (session('username')); ?> | <a href="logout">退出</a>	</h5>
			</div>
		</div>
		<div class="row">
			<!-- 左边一级导航 -->
			<div class="col-md-1" style="padding:0px;margin-top:10%">
				<html>
<head>
	<style>
		.nav_row{
			width:100%;
			height:40px;
			line-height: 40px;
			border:0px;
			box-shadow: 1px 1px 3px #222;
			margin-top:6px;
			border-radius: 1px 12px 1px 15px;
			background: #eaeaea;
			padding-left:4px;
			font-size:20px;
		}
		.nav_row:hover{
			background: #cdcdcd;
		}
		.nav_row a:hover{
			text-decoration: none;
		}
	</style>
</head>
<!-- 	<div class="nav_row">
		<span class="glyphicon glyphicon-home"></span>
		<a href="studio?menu=home">桌面:H</a>
	</div> -->
	<div class="nav_row">
		<span class="glyphicon glyphicon-calendar"></span> 
		<a href="studio?menu=mission"> 任务:M</a>
	</div>
	<div class="nav_row">
		<span class="glyphicon glyphicon-pencil"></span> 
		<a href="studio?menu=note" target="_blank"> 记事:N</a>
	</div>
	<div class="nav_row">
		<span class="glyphicon glyphicon-comment"></span> 
		<a href="studio?menu=discuss">讨论:D</a>
	</div>
	<div class="nav_row">
		<span class="glyphicon glyphicon-list-alt"></span> 
		<a href="studio?menu=project"> 项目:P</a>
	</div>
	<div class="nav_row">
		<span class="glyphicon glyphicon-cog"></span> 
		<a href="studio?menu=control">管理:C</a>
	</div>
</html>
			</div>
			<!-- 左边二级导航 -->
			<div class="second_nav col-md-2">
				<style>
	li {
		box-shadow:0px 1px 3px black;
		border-radius:1px 1px 6px 6px;
	}
	.badge{
		background: #D81F15;
	}
</style>
<ul class="nav nav-pills nav-stacked text-center">
 	<li><a href="studio?menu=mission&page=todaym">
 		待做任务<span class="badge "><?php echo ($num); ?></span>
 	</a></li>
 	<li><a href="studio?menu=mission&page=addm">添加任务</a></li>
 	<li><a href="studio?menu=mission&page=donem">完毕任务</a></li>
</ul>


			</div>
			<!-- 显示模块 -->
			<div class="show_content col-md-9">
				<!-- 根据不同链接载入不同页面 -->
				<!doctype html>
<html>
<head>
	 <link href="/ulttor/Public/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<style>
	
	.tx{
		resize:none;
		width:300px;
	}
	.addmission{
		font-size:17px;
		line-height: 17px;
		padding-top:20px;
		background: #ababab;
		padding:5px;
		box-shadow: 1px 1px 5px #111;
		border-radius: 2px 2px 2px 2px;
		width:100%;
	}
	.showlog{
		margin-top:5px;
		margin-left:auto;
		margin-right:auto;
		background: #eee;
		color:green;
		width:98%;
		min-height:400px;
		overflow: auto;
	}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		$('#addm').on('click', function(event) {
			var poster=$("input[name='poster']").val();
			var content=$("input[name='content']").val();
			var finisher=$("select[name='finisher']").val();
			var finishtime=$("input[name='finishtime']").val();


			if(content==""||finishtime==""){
				alert("内容或日期不可为空");
				return;
			}
			addm(poster,content,finisher,finishtime);
		});
	});
	function addm(poster,content,finisher,finishtime){
		$.ajax({
			url: '/ulttor/index.php/Home/Mission/addMission',
			type: 'post',
			data: {'content': content,'poster':poster,'finisher':finisher,'finishtime':finishtime},
		})
		.done(function(data) {
			console.log("success");
			if(data=="success"){
				$("input[name='content']").val("");
				location.reload();
			}else{
				alert("添加失败,请确认输入无误!");
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
			
		});
		
	}

</script>
</head>
<body>
<div class="addmission">
	<form class="text-center form-inline" action="" method="post">
		<input type="hidden" name="poster" value="<?php echo (session('username')); ?>">
		
		<div class="form-group">
			<label for="" class="sr-only"></label>
			向
			<select name="finisher" class="form-control">
				<?php if(is_array($oneteamusers)): $i = 0; $__LIST__ = $oneteamusers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["username"]); ?>"><?php echo ($vo["username"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

			</select>
		</div>
		<div class="glyphicon glyphicon-plus"></div>
		<div class="form-group">
			<label for="" class="sr-only"></label>
			 <input name="content" class="tx form-control" placeholder="任务内容">
		</div>

		<div class="form-group">
            <label for="dtp_input2" class=""></label>
            <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">

            <input class="form-control" size="10" type="text" name="finishtime" placeholder="日期" readonly>
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
			<input type="hidden" id="dtp_input2" value="" /><br/>
        </div>
		 &nbsp;&nbsp;
		<input type="button" id="addm" class="btn btn-primary" value="添加任务">
	</form>
</div>
<div class="showlog">
	<h4>今日添加记录</h4>
	<?php if(is_array($newmlist)): $i = 0; $__LIST__ = $newmlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>&nbsp;&nbsp;
		<?php echo (substr($vo["posttime"],11,17)); ?> : 
		<span class="text-warning"><?php echo ($vo["poster"]); ?></span> -> <span class="text-danger"><?php echo ($vo["finisher"]); ?></span> +任务 
		<span class="text-info">[<?php echo ($vo["content"]); ?>]</span>;
		<br><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<script type="text/javascript" src="/ulttor/Public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/ulttor/Public/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript">
	$('.form_date').datetimepicker({
        language:  'zh-CN',
        format:'yyyy-mm-dd',
        weekStart: 1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });

</script>
</body>
</html>



			</div>	

		</div>
	
	</div>
</body>
</html>