<?php
class BasicAction extends Action {
	public $uid;
	public $uname;
	public $grade;
	
    public function _initialize(){
    	$uid	=session("ADMIN_ID");
    	$uname	=session("ADMIN_NAME");
    	$grade	=session("ADMIN_GRADE");
    	if(empty($uid)||empty($uname)||empty($grade)){
    		U("Login/index","","",true);
    		exit;
    	}else{
    		$this->uid=$uid;
    		$this->uname=$uname;
    		$this->grade=$grade;
    	}
    }
    function _empty(){
        header("HTTP/1.0 404 Not Found");
        $this->display('Public:error');
     }
}