<?php
class AdminAction extends BasicAdvancedAction{
	public function admin_list(){
		$db=M("admin");
		$info=$db->order("grade desc")->select();
		$db=M("admin_login");
		foreach($info as $key=>$v){
			$id=$v['id'];
			$info[$key]['login_count']=$db->where("admin_id={$id}")->count("id");
		}
		
		
		$this->assign("info",$info);
		$this->display("admin_list");	
	}
	public function admin_edit(){
		$id=I("id");
		$info=array();
		if(!empty($id)){
			$info=M("Admin")->where("id ={$id}")->find();
		}else{
			$info['state']=1;
			$info['grade']=5;
		}
		$grade=array(
			"5"=>"普通管理员",
			"6"=>"审核管理员",
			"7"=>"高级管理员",
			"8"=>"系统管理员"
		);
		$advanced=M("advanced")->where("state=1")->select();
		$db=M("info_class");
		$category=array();
		$base_category=$db->where("id like '___'")->order('sort desc')->select();
		foreach($base_category as $base){
			$base_id=$base['id'];
			$sub=$db->where("id like '{$base_id}___'")->order("sort asc")->select();
			$sub_category=array(
			"base"=>$base,
			"sub"=>$sub
			);
			array_push($category,$sub_category);
		}
		$this->assign("category",$category);
		$this->assign("advanced",$advanced);
		$this->assign("grade",$grade);
		$this->assign("info",$info);
		$this->display("admin_edit");
	}
	public function admin_update(){
		$id=I("id");
		$pass=I("pass");
		$pass2=I("pass2");
		$name=I("name");
		$data=array(
		"name"=>I("name"),
		"realname"=>I("realname"),
		"grade"=>I("grade","5"),
		"state"=>I("state"),
		//"class_id"=>I("class_id"),
		//"advanced_id"=>I("advanced_id")
		);
		if(empty($name)){
			U("Index/info",array("msg"=>base64_encode("用户名不能为空")),"","true");
			exit;
		}
		if(empty($id)){
			if(empty($pass)||empty($pass2)){
				U("Index/info",array("msg"=>base64_encode("密码不能为空")),"","true");
				exit;
			}
		}
		if(!empty($pass)||!empty($pass2)){
			if($pass!=$pass2){
				U("Index/info",array("msg"=>base64_encode("两次输入的密码不一致")),"","true");
				exit;
			}
			if(strlen($pass)<8){
				U("Index/info",array("msg"=>base64_encode("密码不能小于8位")),"","true");
				exit;
			}
			$data['pass']=md5($pass);
		}
		$db=M("admin");
		if(empty($id)){
			$data['id']=$db->max("id")+1;
			$rst=$db->add($data);
		}else{
			$rst=$db->where("id={$id}")->save($data);
		}
		if($rst!==false){
			U("Admin/admin_list","","",true);
		}else{
			U("Index/info",array("msg"=>base64_encode("保存错误")),"","true");
			exit;
		}
	}
	public function change_pass(){
		$uid    =session("ADMIN_ID");
        $info=M("admin")->where("id={$uid}")->find();
        $this->assign("info",$info);
    	$this->display("change_pass");
	}
	public function pass_update(){
		$oldpass=I("oldpass","","trim");
		$newpass=I("newpass","","trim");
		$newpass2=I("newpass2","","trim");
		if(empty($oldpass)||empty($newpass)||empty($newpass2)){
			U("Index/info",array("msg"=>base64_encode("密码不能为空")),"","true");
		}
		if($oldpass==$newpass){
			U("Index/info",array("msg"=>base64_encode("新旧密码不能一致")),"","true");
		}
		if(strlen($newpass)<8){
			U("Index/info",array("msg"=>base64_encode("密码不能小于8位")),"","true");
			exit;
		}
		if($newpass2!=$newpass){
			U("Index/info",array("msg"=>base64_encode("两次输入的密码不一致")),"","true");
		}
		$uid    =session("ADMIN_ID");
        $info=M("admin")->where("id={$uid}")->find();
        if(md5($oldpass)!=$info["pass"]){
			U("Index/info",array("msg"=>base64_encode("原始密码不正确")),"","true");
		}
		$data=array(
			"pass"=>md5($newpass),
			"modify_time"=>time()
			);
		$rst=M("admin")->where("id={$uid}")->save($data);
		if($rst!==false){
			U("Index/info",array("msg"=>base64_encode("密码修改成功")),"","true");
		}else{
			U("Index/info",array("msg"=>base64_encode("密码修改失败")),"","true");
		}
	}
}
?>