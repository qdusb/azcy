<?php
class CategoryAction extends BasicAdvancedAction{
	public function base_list(){
		$db=M("info_class");
		$classes=$db->where("id like '___'")->order("sortnum asc")->select();
		$this->assign("classes",$classes);
		
		$this->display("base_list");
	}
	public function base_edit(){
		$id=I("id");
		$db=M("info_class");
		if(!empty($id)){
			$info=$db->where("id={$id}")->find();
		}else{
			$count=$db->where("id like '___'")->count("id");
			$info=array(
			"id"=>$count+101,
			"sortnum"=>($count+1)*10,
            "state"=>1
			);
		}
		$this->assign("info",$info);
		$info_states=array(
			"content"=>"内容模式",
			"pic"=>"图片列表",
			"list"=>"新闻列表",
			"pictxt"=>"图文模式",
			"custom"=>"自定义"
		);
		$this->assign("info_states",$info_states);
		$this->display("base_edit");
	}
	public function base_update(){
		$id=I("id");
		if(empty($id)){
			$params=array(
    			"msg"=>base64_encode("非法操作"),
    			"url"=>base64_encode(U("Category/base_list"))
    			);
			U("Index/info",$params,"",true);
			exit;
		}
		$db=M("info_class");
		$data=array(
		"id"=>$id,
		"sortnum"=>I("sortnum"),
		"name"=>I("name"),
		"en_name"=>I("en_name"),
		"content"=>I("content"),
		"state"=>I("state","1"),
		"sub_content"=>I("sub_content"),
		"sub_pic"=>I("sub_pic"),
		"max_level"=>I("max_level","2"),
		"info_state"=>I("info_state","custom"),
		"hasViews"=>I("hasViews"),
		"hasState"=>I("hasState"),
		"hasAuthor"=>I("hasAuthor"),
		"hasSource"=>I("hasSource"),
		"hasKeyword"=>I("hasKeyword"),
		"hasPic"=>I("hasPic"),
		"hasAnnex"=>I("hasAnnex"),
		"hasIntro"=>I("hasIntro"),
		"hasContent"=>I("hasContent"),
		"hasWebsite"=>I("hasWebsite"),
		"hasLevel"=>I("hasLevel"),
		"hasShare"=>I("hasShare")
		);
		$count=$db->where("id ={$id}")->count("id");
		if($count==1){
			$rst=$db->where("id={$id}")->save($data);
		}else{
			$data['create_time']=time();
			$rst=$db->add($data);
		}
		if($rst!==false){
			U("Category/base_list","","",true);
		}else{
			U("Index/info",array("msg"=>base64_encode("编辑/新增失败")),"",true);
		}
	}
	public function class_delete(){
		$id=I("id");
		if(empty($id)){
			$params=array(
    			"msg"=>base64_encode("非法操作")
    			);	
		}
		$db=M("info_class");
		$count=$db->where("id like '{$id}___'")->count("id");
		if($count>0){
			$msg=base64_encode("所删除类别含有子栏目，不能删除");
		}else{
			$count=M("info")->where("class_id = {$id}")->count("id");
			if($count>0){
				$msg=base64_encode("所删除类别含有信息，不能删除");
			}else{
				$rst=$db->delete($id);
				if($rst!==false){
					$msg=base64_encode("删除成功");
				}else{
					$msg=base64_encode("删除失败");
				}	
			}
		}
		U("Index/info",array("msg"=>$msg),"",true);
	}
	public function manage_list(){
		$id=I("id");
		if(empty($id)){
			U("Index/info",array("msg"=>base64_encode("非法操作")),"",true);
		}
		$db=M("info_class");
		$base=$db->where("id={$id}")->find();

		$info=$db->where("id like '{$id}___'")->order('sortnum asc')->select();

		$this->assign("freshURL",U("Category/manage_list",array("id"=>$id)));
		$this->assign("addURL",U("Category/manage_edit",array("pid"=>$id)));
		if(strlen($id)>3){
			$pid=substr($id,0,strlen($id)-3);
			$this->assign("returnURL",U("Category/manage_list",array("id"=>$pid)));
		}else{
			$this->assign("returnURL","false");
		}
		$this->assign("info",$info);
		$this->assign("id",$id);
		$this->assign("base",$base);
		$this->display("class_list");
	}
	public function manage_edit(){
		$id=I("id");
		$pid=I("pid");
		if(empty($pid)){
			$pid=substr($id,0,strlen($id)-3);
		}
		$db=M("info_class");
		if(!empty($id)){
			$info=$db->where("id={$id}")->find();
		}else{
			$info['sortnum']=$db->where("id like '{$pid}___'")->max("sortnum")+10;
            $info['state']=1;
		}
		$info['pid']=$pid;
		$class_name=$db->where("id={$id}")->getfield("name");

		$info_states=array(
			"content"=>"内容模式",
			"pic"=>"图片列表",
			"list"=>"新闻列表",
			"pictxt"=>"图文模式",
			"custom"=>"自定义"
		);
		$this->assign("info_states",$info_states);

		$this->assign("returnURL",U("Category/manage_list",array("id"=>$pid)));
		$this->assign("class_name",$class_name);
		$this->assign("info",$info);
		$this->display("class_edit");
	}
	public function manage_update(){
		$id=I("id");
		$pid=I("pid");
		$name=I("name");
		if(empty($name)){
			U("Index/info",array("msg"=>base64_encode("分类名称不能为空")),"",true);
			exit;
		}
		$db=M("info_class");
		if(empty($id)){
			$cnt=$db->where("id like '{$pid}___'")->count("id");
			$cid=$cnt+101;
			$id=$pid.$cid;
		}
		$data=array(
			"id"=>$id,
			"sortnum"=>I("sortnum"),
			"name"=>$name,
			"en_name"=>I("en_name"),
			//"model"=>I("model"),
			//"action"=>I("action"),
			"state"=>I("state"),
			"has_sub"=>I("has_sub"),
			"info_state"=>I("info_state","content"),
			"content"=>I("content")
		);
		$count=$db->where("id ={$id}")->count("id");
		if($count==1){
			$rst=$db->where("id={$id}")->save($data);
		}else{
			$rst=$db->add($data);
		}
		if($rst!==false){
			U("Category/manage_list",array("id"=>$pid),"",true);
		}else{
			U("Index/info",array("msg"=>base64_encode("编辑/新增失败")),"",true);
		}
	}
}
?>