<?php
class AdvancedAction extends BasicAdvancedAction{
	public function index(){
		header("HTTP/1.0 404 Not Found");
        $this->display('Public:error');
	}
	public function advanced_list(){
		$info=M("advanced")->order("sort asc")->select();
		$this->assign("info",$info);
		$this->display();
	}
	public function advanced_edit(){
		$id=I("id");
		$db=M("advanced");
		if(!empty($id)){
			$info=$db->where("id={$id}")->find();
		}else{
			$info=array(
			"id"=>$db->max("id")+1,
			"sort"=>$db->max("sort")+10,
			"state"=>1,
			"model"=>"Anvanced"
			);
		}
		$this->assign("info",$info);
		$this->display("advanced_edit");
	}
	public function advanced_delete(){
		$id=I("id");
		if(empty($id)){
			$msg=base64_encode("非法操作");
		}
		$db=M("advanced");
		$rst=$db->delete($id);
		if($rst!==false){
			$msg=base64_encode("删除成功");
		}else{
			$msg=base64_encode("删除失败");
		}
		U("System/info",array("msg"=>$msg),"",true);
	}
	public function advanced_update(){
		$id=I("id");
		if(empty($id)){
			$params=array(
    			"msg"=>base64_encode("非法操作"),
    			);
			U("System/info",$params,"",true);
			exit;
		}
		$db=M("advanced");
		$data=array(
		"id"=>$id,
		"sort"=>I("sort"),
		"name"=>I("name"),
		"action"=>I("action"),
		"model"=>I("model"),
		"default_file"=>I("default_file"),
		"state"=>I("state","1"),
		"content"=>I("default_file"),
		);
		$count=$db->where("id ={$id}")->count("id");
		if($count==1){
			$rst=$db->where("id={$id}")->save($data);
		}else{
			$data['create_time']=time();
			$rst=$db->add($data);
		}
		if($rst!==false){
			U("Advanced/advanced_list","","",true);
		}else{
			$params=array(
    			"msg"=>base64_encode("编辑/新增失败"),
    			);
			U("System/info",$params,"",true);
		}
	}
	/*基本配置*/
	public function base_edit(){
		$info=M("config_base")->where("id=1")->find();
		$this->assign("info",$info);
		$this->display("base_edit");
	}	
	public function base_update(){
		$db=M("config_base");
		$data=array(
		"title"=>I("title"),
		"name"=>I("name"),
		"address"=>I("address"),
		"icp"=>I("icp"),
		"keyword"=>I("keyword"),
		"description"=>I("description"),
		"contact"=>I("contact"),
		"copyright"=>I("copyright"),
		"javascript"=>I("javascript"),
		);
		$rst=$db->where("id=1")->save($data);
		if($rst!==false){
			$msg=base64_encode("编辑成功");
		}else{
			$msg=base64_encode("编辑失败");
		}
		U("System/info",array("msg"=>$msg),"",true);
	}
}
?>