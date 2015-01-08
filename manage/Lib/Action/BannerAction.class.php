<?php
class BannerAction extends BasicAdvancedAction{
	/*Banner 分类管理*/
	public function banner_class_list(){
		$info=M("banner_class")->select();
		
		$freshURL=U("Banner/banner_class_list");
		$addURL=U("Banner/banner_class_edit");
		$this->assign("freshURL",$freshURL);
		$this->assign("addURL",$addURL);
		$this->assign("info",$info);
		$this->display("Advanced/banner_class_list");
	}
	public function banner_class_edit(){
		$id=I("id");
		$db=M("banner_class");
		if(!empty($id)){
			$info=$db->where("id={$id}")->find();
		}else{
			$info=array(
			"sort"=>$db->max("sort")+10,
			);
		}
		$this->assign("info",$info);
		$this->display("Advanced/banner_class_edit");
	}
	public function banner_class_update(){
		$id=I("id");
		$name=I("name");
		if(empty($name)){
			U("Index/info",array("msg"=>base64_encode("Banner分类名称不能为空")),"",true);
			exit;
		}
			$db=M("banner_class");
		$data=array(
		"sort"=>I("sort","10"),
		"name"=>$name,
		"add_deny"=>I("add_deny",1),
		"delete_deny"=>I("delete_deny",1),
		);
		if(empty($id)){
			$data['id']=$db->max("id")+1;
			$rst=$db->add($data);
		}else{
			$rst=$db->where("id={$id}")->save($data);
		}
		
		if($rst!==false){
			U("Banner/banner_class_list","","",true);
		}else{
			U("Index/info",array("msg"=>base64_encode("编辑/新增失败")),"",true);
		}
	}
	public function banner_class_delete(){
		$id=I("id");
		if(empty($id)){
			U("Index/info",array("msg"=>base64_encode("非法操作")),"",true);
			exit;
		}
		$db=M("banner_class");
		$rst=$db->where("id ={$id}")->delete();
		if($rst!==false){
			U("Banner/banner_class_list","","",true);
		}else{
			U("Index/info",array("msg"=>base64_encode("删除失败")),"",true);
		}
	}
	/*Banner 管理*/
	public function banner_list(){
		$db=M("banner");
		$banner_class=M("banner_class")->order("sort asc")->select();
		if(count($banner_class)<=0){
			$params=array(
    			"msg"=>base64_encode("Banner分类尚未建立，请先建立链接分类"),
    			"url"=>base64_encode(U("Banner/banner_class_list"))
    			);
			U("Index/info",$params,"",true);
		}
		$class_id=I("class_id",$banner_class[0]['id']);
		if(empty($class_id)){
			$params=array(
    			"msg"=>base64_encode("非法操作")
    			);
			U("Index/info",$params,"",true);
			exit;
		}
		$freshURL=U("Banner/banner_list",array("class_id"=>$class_id));
		$addURL=U("Banner/banner_edit",array("class_id"=>$class_id));

		$info=$db->where("class_id={$class_id}")->order("sort asc")->select();

		$this->assign("class_id",$class_id);
		$this->assign("freshURL",$freshURL);
		$this->assign("addURL",$addURL);
		$this->assign("info",$info);
		$this->assign("banner_class",$banner_class);
		$this->display("Advanced/banner_list");
	}
	public function banner_edit(){
		$id=I("id");
		$class_id=I("class_id");
		if(empty($class_id)){
			U("Index/info",array("msg"=>base64_encode("非法操作")),"",true);
			exit;
		}
		$db=M("banner");
		if(!empty($id)){
			$info=$db->where("id={$id}")->find();
		}else{
			$info['sort']=$db->where("class_id={$class_id}")->max("sort")+10;
			$info['state']=1;
		}
		$returnURL=U("Banner/banner_list",array("class_id"=>$class_id));
		$this->assign("banner_name",M("banner_class")->where("id={$class_id}")->getfield("name"));
		$this->assign("returnURL",$returnURL);
		$this->assign("class_id",$class_id);
		$this->assign("id",$id);
		$this->assign("info",$info);
		$this->display("Advanced/banner_edit");
	}
	public function banner_update(){
		$id=I("id");
		$class_id=I("class_id");
		$title=I("title");
		if(empty($class_id)){
			U("Index/info",array("msg"=>base64_encode("非法操作")),"",true);
			exit;
		}
		if(empty($title)){
			U("Index/info",array("msg"=>base64_encode("Banner名称不能为空")),"",true);
			exit;
		}
		$db=M("banner");
		$data=array(
			"sort"=>I("sort"),
			"state"=>I("state",1),
			"title"=>$title,
			"url"=>I("url"),
			"content"=>I("content"),
			"width"=>I("width"),
			"height"=>I("height"),
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
			U("Banner/banner_list",array("class_id"=>$class_id),"",true);
		}else{
			U("Index/info",array("msg"=>base64_encode("新增/编辑失败")),"",true);
			exit;
		}
	}
	public function banner_delete(){
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
		$db=M("banner");
		$condition['id']  = array('in',$ids);
		$rst=$db->where($condition)->delete();
		$returnURL=U("Banner/banner_list",array("class_id"=>$class_id));
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