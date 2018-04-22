<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
	$this->display("index");
    }
    public function login(){
				$this -> display("login");
		}
    public function logins(){
	// 登录
				$name = $_GET["name"];
				$psd = sha1($_GET["psd"]);
				$stud = $_GET["stud"];
				$user = M("user");
				$data = $user -> where("name='{$name}'") ->find();
				print_r($data);
				if($data && $data["psd"] == $psd && $data["stud"] == $stud){  //查询用户
					cookie('id',$data["id"],3600);  // 设置cookie 保用用户的唯一标识id
					$arr["stats"] = 1;
					$arr["stud"] = $stud;
					echo json_encode($arr);
				}else{
					$arr["stats"] = 0;
					echo json_encode($arr);
				}
    }
    public function regester(){
				$this -> display("regester");
		}
    public function regesters(){
			//注册
				$name = $_GET["name"];
				$user = M("user");
				$data = $user -> where("name='{$name}'") ->find();
				if($data){
					$arr["stats"] = 2;  //用户已经存在
					echo json_encode($arr);
				}else{
					$psd = sha1($_GET["psd"]);
					$stud = $_GET["stud"];
					$user = M("user");
					$data["name"] = $name;
					$data["psd"] = $psd;
					$data["stud"] = $stud;
					$judge = $user -> add($data);
					if($judge){  // 写入成功
						$arr["stats"] = 1;
						echo json_encode($arr);
					}else{
						$arr["stats"] = 0;
						echo json_encode($arr);
					}
				}
		}
}