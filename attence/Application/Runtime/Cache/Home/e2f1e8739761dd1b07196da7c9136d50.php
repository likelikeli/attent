<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>登录</title>
		<link rel="stylesheet" href="/1/Application/Common/css/reset.css">
		<link rel="stylesheet" href="/1/Application/Common/css/login.css">
		<link rel="stylesheet" href="/1/Application/Common/css/header.css">
		<link rel="stylesheet" href="/1/Application/Common/css/footer.css">
		<link rel="stylesheet" href="/1/Application/Common/css/bootstrap.min.css">
	</head>

	<body>
		<h1>注册</h1>
		<form class="form-horizontal">
			<div class="form-group">
				<label for="name" class="col-sm-2 col-xs-2 col-md-2 col-lg-2 control-label">用户名</label>
				<div class="col-sm-3 col-xs-3 col-md-3 col-lg-3">
					<input type="text" class="form-control name" id="name" placeholder="用户名">
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-2 col-xs-2 col-md-2 col-lg-2 control-label">密码</label>
				<div class="col-sm-3 col-xs-3 col-md-3 col-lg-3">
					<input type="password" class="form-control psd" id="password" placeholder="password">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 col-xs-2 col-md-2 col-lg-2 control-label">职务</label>
				<div class="col-xs-3 col-md-3 col-lg-3 col-sm-3">
					<select class="form-control stud" value="">
						<option >学生</option>
						<option >老师</option>
					</select>
				</div>
			
			</div>
			
		</form>
		<div class="col-sm-offset-2 col-xs-offset-2 col-lg-offset-2 col-md-offset-2 col-sm-3  col-xs-3 col-md-3 col-lg-3">
			<button class="btn btn-success regester">注册</button>
		</div>
	</body>
	<script src="/1/Application/Common/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
		// 注册按钮
		var regester = document.getElementsByClassName("regester")[0];
		// 注册
		regester.onclick=function(){
			var name = document.getElementsByClassName("name")[0].value;
			var psd = document.getElementsByClassName("psd")[0].value;
			var stud = document.getElementsByClassName("stud")[0].value;
			if(stud=='老师'){
				stud=1
			}else{
				stud=2
			}
			var url = "regesters?name=" + name + "&psd=" + psd + "&stud=" + stud;
			console.log(stud)
			console.log(stud)
			$.ajax({
				type:"get",
				url:url,
				async:true,
				success: function(data){
					data = data.split('{')[1].split('}')[0]
					data = data.split(':')[1]
					if(data==2){
						alert("用户名已存在")
					} else if(data==1)
					window.location.href = "../index/login";
				}
			});
		}
	</script>

</html>