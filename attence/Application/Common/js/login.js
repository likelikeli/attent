// 登录按钮
var loginin = document.getElementsByClassName("loginin")[0];
// 注册按钮
var regester = document.getElementsByClassName("regester")[0];
// 登录
loginin.onclick=function(){
	var name = document.getElementsByClassName("name")[0].value;
	var psd = document.getElementsByClassName("psd")[0].value;
	var url = "logins?name=" + name + "&psd=" + psd;
	ajaxGet(url,function(data){
		if(data.stats==1){
			window.location.href = "../index";
		}else{
			alert("请输入正确的用户名和密码");
			document.getElementsByClassName("zz")[0].innerHTML= "请注册";
		}
	})
}
// 注册
regester.onclick=function(){
	var name = document.getElementsByClassName("name")[0].value;
	var psd = document.getElementsByClassName("psd")[0].value;
	var url = "regester?name=" + name + "&psd=" + psd;
	ajaxGet(url,function(data){
		if(data.stats==1){
			alert("注册成功");
			document.getElementsByClassName("zz")[0].innerHTML = "快速登录";
		}else if(data.stats==2){
			alert("用户名已经存在，请更换");
		}else{
			alert("注册失败");
		}
	});
}
// get方式发送ajax
	function ajaxGet(url,call){
		var xhr = new XMLHttpRequest();
		xhr.onload = function(){
			if(xhr.responseText){
				var data = JSON.parse(xhr.responseText);
				call && call(data);
			}
		}
		xhr.open("get",url,false);
		xhr.send();
	}