<?php
class BasicAdvancedAction extends BasicAction {

    public function _initialize(){
        $uid    =session("ADMIN_ID");
        $uname  =session("ADMIN_NAME");
        $grade  =session("ADMIN_GRADE");
        if(empty($uid)||empty($uname)||empty($grade)){
            U("Login/index","","",true);
            exit;
        }else{
            $this->uid=$uid;
            $this->uname=$uname;
            $this->grade=$grade;
        }
        if($grade<=6){
          U("System/info",array("msg"=>base64_encode("{$grade}抱歉您的管理权限不够")),"",true);  
        }
    }
}