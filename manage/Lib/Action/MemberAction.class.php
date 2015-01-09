<?php
class MemberAction extends BasicAdvancedAction{
	/*会员管理*/
	public function member_list(){

		$page_id=I("page_id","1");
		$page_size=C("PAGE_SIZE");
		$db=M("member");
		$cnt=$db->count("id");
		$page_num=ceil($cnt/$page_size);
		$params=array("page_id"=>$page_id);
		$page=page($page_id,$page_num,"Member/member_list",$params);
		$this->assign("page",$page);
		$this->assign("freshURL",U("Member/member_list",$params));
		$info=$db->order("sort desc")->limit(($page_id-1)*$page_size,$page_size)->select();
		$this->assign("info",$info);
		$this->assign("page_id",$page_id);
		$this->display("Advanced/member_list");
	}
	public function member_edit(){
		$page_id=I("page_id","1");
		$id=I("id");
		$db=M("member");
		if(!empty($id)){
			$info=$db->where("id={$id}")->find();
		}else{
			$info['sort']=$db->max("sort")+10;
		}
		$levels=array(
			"0"=>"普通用户",
			"1"=>"初级会员",
			"2"=>"中级会员",
			"3"=>"高级会员"
			);
		$this->assign("levels",$levels);
		$this->assign("info",$info);
		$this->assign("page_id",$page_id);
		$this->display("Advanced/member_edit");
	}
	public function member_update(){
		$page_id=I("page_id","1");
		$id=I("id");
		$user_name=I("user_name");
		if(empty($user_name)){
			$msg=base64_encode("用户名不能为空");
			U("System/info",array("msg"=>$msg),"",true);
		}
		$db=M("member");
		$data=array(
			"sort"=>I("sort"),
			"user_name"=>$user_name,
			"level"=>I("level"),
			"real_name"=>I("real_name"),
			"phone"=>I("phone"),
			"email"=>I("email"),
			"sex"=>I("sex"),
			"job"=>I("job"),
			"address"=>I("address"),
			"remark"=>I("remark")
		);
		if(empty($id)){
			$data['create_time']=time();
			$data['id']=$db->max("id")+1;
			$password=I("password");
			if(empty($password)){
				$msg=base64_encode("密码不能为空");
				U("System/info",array("msg"=>$msg),"",true);
			}
			$data['password']=$password;
			$rst=$db->add($data);
		}else{
			$rst=$db->where("id={$id}")->save($data);
		}
		
		if($rst!==false){
			U("Member/member_list",array("page_id"=>$page_id),"",true);
		}else{
			$msg=base64_encode("新增/编辑失败");
			U("System/info",array("msg"=>$msg),"",true);
		}
	}
	public function member_delete(){
		if(!$this->isPost()){
			$this->display("Public/error");
			exit;
		}
		$page_id=I("page_id","1");
		$ids=I("ids");
		if(empty($ids)){
			$params=array(
    			"msg"=>base64_encode("非法操作"),
    			);
			U("System/info",$params,"",true);
			exit;
		}
		$db=M("member");
		$condition['id']  = array('in',$ids);
		$rst=$db->where($condition)->delete();
		$returnURL=U("Member/member_list",array("page_id"=>$page_id));
		if($rst!==false){
			$params=array(
    			"msg"=>base64_encode("删除成功"),
    			"url"=>base64_encode($returnURL)
    			);
		}else{
			$params=array(
    			"msg"=>base64_encode("删除失败")
    			);
		}
		U("System/info",$params,"",true);
	}
	public function member_down(){
		
	}

}
?>