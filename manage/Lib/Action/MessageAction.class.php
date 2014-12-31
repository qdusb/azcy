<?php
class MessageAction extends BasicAdvancedAction{
		/*留言管理*/
	public function message_list(){
		$db=M("message");
		$page_id=I("page_id","1");
		$page_size=C("PAGE_SIZE");
		$cnt=$db->count("id");
		$page_num=ceil($cnt/$page_size);
		$params=array("page_id"=>$page_id);
		$page=page($page_id,$page_num,"Message/message_list",$params);
		$this->assign("page",$page);
		
		$this->assign("freshURL",U("Message/message_list",$params));
		
		$info=$db->order("sortnum desc")->limit(($page_id-1)*$page_size,$page_size)->select();
		$this->assign("info",$info);
		$this->assign("page_id",$page_id);
		$this->display("Advanced/message_list");
	}
	public function message_edit(){
		$page_id=I("page_id","1");
		$id=I("id");
		if(empty($id)){
			U("Index/info",array("msg"=>base64_encode("非法操作")),"",true);
			exit;
		}
		$info=M("message")->where("id={$id}")->find();
		if($info['state']==0){
			M("message")->where("id={$id}")->setField("state",1);
		}
		$this->assign("info",$info);
		$this->assign("page_id",$page_id);
		$this->display("Advanced/message_edit");
	}
	public function message_update(){
		$page_id=I("page_id","1");
		$id=I("id");
		if(empty($id)||$this->isPost()==false){
			$params=array(
    			"msg"=>base64_encode("非法操作"),
    			);
			U("Index/info",$params,"",true);
			exit;
		}
		$db=M("message");
		$data=array(
			"sortnum"=>I("sortnum"),
			"state"=>I("state"),
			"reply"=>I("reply"),
		);
		$rst=$db->where("id={$id}")->save($data);
		if($rst!==false){
			U("Message/message_list",array("page_id"=>$page_id),"",true);
		}else{
			$msg=base64_encode("编辑失败");
			U("Index/info",array("msg"=>$msg),"",true);
		}
	}
	public function message_delete(){
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
			U("Index/info",$params,"",true);
			exit;
		}
		$db=M("message");
		$condition['id']  = array('in',$ids);
		$rst=$db->where($condition)->delete();
		$returnURL=U("Message/message_list",array("page_id"=>$page_id));
		if($rst!==false){
			$params=array(
    			"msg"=>base64_encode("信息删除成功"),
    			"url"=>base64_encode($returnURL)
    			);
		}else{
			$params=array(
    			"msg"=>base64_encode("信息删除失败")
    			);
		}
		U("Index/info",$params,"",true);
	}
}
?>