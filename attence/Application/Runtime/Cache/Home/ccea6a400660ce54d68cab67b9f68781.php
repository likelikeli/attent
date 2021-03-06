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
		<h1>登录</h1>
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
			<button class="btn loginin btn-success">登录</button>
		</div>
	</body>
	<script src="/1/Application/Common/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
		// 登录按钮
		var loginin = document.getElementsByClassName("loginin")[0];
		// 登录
		loginin.onclick = function() {
			var name = document.getElementsByClassName("name")[0].value;
			var psd = document.getElementsByClassName("psd")[0].value;
			var stud = document.getElementsByClassName("stud")[0].value;
			if(stud=='老师'){
				stud=1
			}else{
				stud=2
			}
			var url = "logins?name=" + name + "&psd=" + psd+"&stud="+stud;
			$.ajax({
				type: "get",
				url: url,
				async: true,
				success: function(data) {
					data = data.split('{')[1].split('}')[0].split(',')
					data[0] = data[0].split(':')[1]
					if(data[0] == 1) {
						data[1] = data[1].split(':')[1].slice(1,2)
						window.location.href = "../index?stud=" + data[1];
					} else {
						alert("请输入正确的用户名和密码以及职位");
					}
				}
			});
		}
	</script>

</html>