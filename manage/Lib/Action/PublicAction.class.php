<?php
class PublicAction extends BasicAction{
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
    public function menu(){
        /*栏目*/
    	$db=M("info_class");
    	$menus=array();
    	$bases=$db->where("id like '___' and state = 1")->order("sortnum asc")->select();
    	foreach($bases as $key=>$base){
    		$sid=$base['id'];
    		$subMenu=$db->where("id like '".$sid."___' and state = 1 ")->order("sortnum asc")->select();
    		foreach($subMenu as &$item){
    			$item['url']=getLinkURL($item['id']);
    		}
    		$sub=array("base"=>$base,"sub"=>$subMenu,"classifyURL"=>U("Advance/classify",array("id"=>$sid)));
    		array_push($menus, $sub);
    	}

        $this->assign("menus",$menus);

        /*高级管理*/
        $db=M("advanced");
        $advanced=$db->where("state=1")->order("sortnum asc")->select();
    	
        foreach($advanced as $key=>$val){
            $val['action']=empty($val['action'])?"index":$val['action'];
            $val['model']=empty($val['model'])?"Advanced":$val['model'];
            $advanced[$key]["url"]=U( $val['model']."/".$val['action']);
        }
        $grade  =session("ADMIN_GRADE");
        $this->assign("grade",$grade);
        $this->assign("advanced",$advanced);
    	$this->display("Public/menu");
    }
    public function main(){
        $uid    =session("ADMIN_ID");
        $info=M("admin")->where("id={$uid}")->find();
        $visit= M("admin_login")->where("admin_id = {$uid}")->order("id desc")->limit(1)->find();
        $info['login_time']=$visit["login_time"];
        $info['login_ip']=$visit["login_ip"];
        $info['login_count']=M("admin_login")->where("admin_id = {$uid}")->count("id");
        $this->assign("info",$info);
    	$this->display("Public/main");
    }
    public function header(){
    	$this->display("Public/header");
    }
}