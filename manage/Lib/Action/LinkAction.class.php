<?php
class LinkAction extends BasicAdvancedAction{
	/*链接分类管理*/
	public function link_class_list(){
		$info=M("link_class")->select();
		$this->assign("info",$info);
		$this->display("Advanced/link_class_list");
	}
	public function link_class_edit(){
		$id=I("id");
		$db=M("link_class");
		if(!empty($id)){
			$info=$db->where("id={$id}")->find();
		}else{
			$info=array(
			"sortnum"=>$db->max("sortnum")+10,
			);
		}
		$this->assign("info",$info);
		$this->display("Advanced/link_class_edit");
		
	}
	public function link_class_update(){
		$id=I("id");
		$name=I("name");
		if(empty($name)){
			U("Index/info",array("msg"=>base64_encode("链接分类名称不能为空")),"",true);
			exit;
		}
			$db=M("link_class");
		$data=array(
		"sortnum"=>I("sortnum","10"),
		"name"=>$name,
		"haspic"=>I("haspic",0),
		);
		if(empty($id)){
			$data['id']=$db->max("id")+1;
			$rst=$db->add($data);
		}else{
			$rst=$db->where("id={$id}")->save($data);
		}
		
		if($rst!==false){
			U("Link/link_class_list","","",true);
		}else{
			U("Index/info",array("msg"=>base64_encode("编辑/新增失败")),"",true);

		}
	}
	public function link_class_delete(){
		$id=I("id");
		if(empty($id)){
			U("Index/info",array("msg"=>base64_encode("非法操作")),"",true);
			exit;
		}
		$db=M("link_class");
		$rst=$db->where("id ={$id}")->delete();
		if($rst!==false){
			U("Link/link_class_list","","",true);
		}else{
			U("Index/info",array("msg"=>base64_encode("删除失败")),"",true);
		}
	}
	/*链接管理*/
	public function link_list(){
		$db=M("link");

		$link_class=M("link_class")->order("sortnum asc")->select();
		if(count($link_class)<=0){
			$params=array(
    			"msg"=>base64_encode("链接分类尚未建立，请先建立链接分类"),
    			"url"=>base64_encode(U("Link/link_class_list"))
    			);
			U("Index/info",$params,"",true);
		}
		$class_id=I("class_id",$link_class[0]['id']);
		if(empty($class_id)){
			$params=array(
    			"msg"=>base64_encode("非法操作")
    			);
			U("Index/info",$params,"",true);
			exit;
		}
		$freshURL=U("Link/link_list",array("class_id"=>$class_id));
		$addURL=U("Link/link_edit",array("class_id"=>$class_id));

		$info=$db->where("class_id={$class_id}")->order("sortnum asc")->select();

		$this->assign("class_id",$class_id);
		$this->assign("freshURL",$freshURL);
		$this->assign("addURL",$addURL);
		$this->assign("info",$info);
		$this->assign("link_class",$link_class);
		$this->display("Advanced/link_list");
	}
	public function link_edit(){
		$id=I("id");
		$class_id=I("class_id");
		if(empty($class_id)){
			U("Index/info",array("msg"=>base64_encode("非法操作")),"",true);
			exit;
		}
		$db=M("link");
		if(!empty($id)){
			$info=$db->where("id={$id}")->find();
		}else{
			$info['sortnum']=$db->where("class_id={$class_id}")->max("sortnum")+10;
			$info['state']=1;
		}

		$returnURL=U("Link/link_list",array("class_id"=>$class_id));

		$this->assign("link_name",M("link_class")->where("id={$class_id}")->getfield("name"));
		$this->assign("returnURL",$returnURL);
		$this->assign("class_id",$class_id);
		$this->assign("id",$id);
		$this->assign("info",$info);
		$this->display("Advanced/link_edit");
	}
	public function link_update(){
		$id=I("id");
		$class_id=I("class_id");
		if(empty($class_id)){
			U("Index/info",array("msg"=>base64_encode("非法操作")),"",true);
			exit;
		}
		$db=M("link");
		$data=array(
			"sortnum"=>I("sortnum"),
			"state"=>I("state",1),
			"name"=>I("name"),
			"url"=>I("url"),
			"class_id"=>$class_id
		);
		if(empty($id)){
			$data['create_time']=time();
			$data['id']=$db->max("id")+1;
			$rst=$db->add($data);
		}else{
			$rst=$db->where("id={$id}")->save($data);
		}	
		if($rst!==false){
			U("Link/link_list",array("class_id"=>$class_id),"",true);
		}else{
			U("Index/info",array("msg"=>base64_encode("新增/编辑失败")),"",true);
			exit;
		}
	}
	public function link_delete(){
		if(!$this->isPost()){
			$this->display("Public/error");
			exit;
		}
		$class_id=I("class_id");
		$ids=I("ids");
		if(empty($ids)){
			U("Index/info",array("msg"=>base64_encode("非法操作")),"",true);
			exit;
		}
		$db=M("link");
		$condition['id']  = array('in',$ids);
		$rst=$db->where($condition)->delete();
		$returnURL=U("Link/link_list",array("class_id"=>$class_id));
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
		U("Index/info",$params,"",true);
	}
}
?>