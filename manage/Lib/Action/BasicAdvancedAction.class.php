<?php
class BasicAdvancedAction extends Action {
	public $uid;
	public $uname;
	public $grade;
	
    public function _initialize(){
    	$uid	=session("ADMIN_ID");
    	$uname	=session("ADMIN_NAME");
    	$grade	=session("ADMIN_GRADE");
    	if(empty($uid)||empty($uname)||empty($grade)){
    		U("Index/index","","",true);
    		exit;
    	}else{
    		$this->uid=$uid;
    		$this->uname=$uname;
    		$this->grade=$grade;

    	}
        if($grade<=6){
          U("Index/info",array("msg"=>base64_encode("抱歉您的管理权限不够")),"",true);  
        }
    }
    function _empty(){
        header("HTTP/1.0 404 Not Found");
        $this->display('Public:error');
     }
}