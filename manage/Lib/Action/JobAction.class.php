<?php
class JobAction extends BasicAdvancedAction{
	/*招聘职位*/
	public function job_list(){
		$db=M("job");
		$page_id=I("page_id","1");
		$page_size=C("PAGE_SIZE");
		$cnt=$db->count("id");
		$page_num=ceil($cnt/$page_size);
		$params=array("page_id"=>$page_id);
		$page=page($page_id,$page_num,"Job/job_list",$params);
		$this->assign("page",$page);
		
		$this->assign("freshURL",U("Job/job_list",$params));
		
		$info=$db->order("sort desc")->limit(($page_id-1)*$page_size,$page_size)->select();
		$this->assign("info",$info);
		$this->assign("page_id",$page_id);
		$this->display("Advanced/job_list");
	}
	public function job_edit(){
		$page_id=I("page_id","1");
		$id=I("id");
		if(empty($id)){
			U("System/info",array("msg"=>base64_encode("非法操作")),"",true);
			exit;
		}
		$info=M("job")->where("id={$id}")->find();
		$this->assign("info",$info);
		$this->assign("page_id",$page_id);
		$this->display("Advanced/job_edit");
	}
	public function job_update(){
		$id=I("id");
		$name=I("name");
		if(empty($name)){
			U("System/info",array("msg"=>base64_encode("职位名称不能为空")),"",true);
			exit;
		}
		$db=M("job");
		$data=array(
		"sort"=>I("sort","10"),
		"name"=>$name,
		"state"=>I("state",1),
		"num"=>I("num"),
		"email"=>I("email"),
		"publishdate"=>I("publishdate"),
		"deadline"=>I("deadline"),
		"content"=>I("content"),
		"content2"=>I("content2"),
		);
		if(empty($id)){
			$data['id']=$db->max("id")+1;
			$data['create_time']=time();
			$rst=$db->add($data);
		}else{
			$rst=$db->where("id={$id}")->save($data);
		}
		if($rst!==false){
			U("Job/job_list","","",true);
		}else{
			U("System/info",array("msg"=>base64_encode("编辑/新增失败")),"",true);

		}
	}
	public function job_delete(){
		$id=I("id");
		if(empty($id)){
			U("System/info",array("msg"=>base64_encode("非法操作")),"",true);
			exit;
		}
		$db=M("job");
		$rst=$db->where("id ={$id}")->delete();
		if($rst!==false){
			U("Job/job_list","","",true);
		}else{
			U("System/info",array("msg"=>base64_encode("删除失败")),"",true);
		}
	}
	/*应聘人员*/
	public function jobseeker_list(){
		$db=M("job_apply");
		$page_id=I("page_id","1");
		$page_size=C("PAGE_SIZE");
		$cnt=$db->count("id");
		$page_num=ceil($cnt/$page_size);
		$params=array("page_id"=>$page_id);
		$page=page($page_id,$page_num,"Job/jobseeker_list",$params);
		$this->assign("page",$page);
		
		$this->assign("freshURL",U("Job/jobseeker_list",$params));
		
		$info=$db->order("sort desc")->limit(($page_id-1)*$page_size,$page_size)->select();
		foreach($info as $key=>$v){
			$job_id=$v['job_id'];
			$info[$key]['job_name']=M("job")->where("id =$job_id")->getfield("name");
		}
		$this->assign("info",$info);
		$this->assign("page_id",$page_id);
		$this->display("Advanced/jobseeker_list");
	}
	public function jobseeker_edit(){
		$page_id=I("page_id","1");
		$id=I("id");
		if(empty($id)){
			U("System/info",array("msg"=>base64_encode("非法操作")),"",true);
			exit;
		}
		$info=M("job_apply")->where("id={$id}")->find();
		if($info['state']==0){
			M("job_apply")->where("id={$id}")->setField("state",1);
		}
		$job_id=$info['job_id'];
		$info['job_name']=M("job")->where("id =$job_id")->getfield("name");
		$this->assign("returnURL",U("Job/jobseeker_list",array("page_id"=>$page_id)));
		$this->assign("info",$info);
		$this->assign("page_id",$page_id);
		$this->display("Advanced/jobseeker_edit");
	}

	public function jobseeker_delete (){
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
		$db=M("job_apply");
		$condition['id']  = array('in',$ids);
		$rst=$db->where($condition)->delete();
		$returnURL=U("Job/jobseeker_list",array("page_id"=>$page_id));
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
}
?>