<?php
class AdverAction extends BasicAdvancedAction{
	public function adver_list(){
		$page_id=I("page_id","1");
		$page_size=C("PAGE_SIZE");
		$db=M("adver");

		$cnt=$db->count("id");
		$page_num=ceil($cnt/$page_size);
		$params=array("page_id"=>$page_id);
		$page=page($page_id,$page_num,"Adver/adver_list",$params);
		$this->assign("page",$page);
		$this->assign("freshURL",U("Adver/adver_list",$params));
		$info=$db->limit(($page_id-1)*$page_size,$page_size)->select();
		$this->assign("info",$info);
		$this->assign("page_id",$page_id);
		$this->display("Advanced/adver_list");
	}
	public function adver_edit(){
		$page_id=I("page_id","1");
		$id=I("id");
		$db=M("adver");
		if(!empty($id)){
			$info=$db->where("id={$id}")->find();
		}else{
			$info['sort']=$db->max("sort")+10;
		}
		$mods=array(
			"popup"=>"弹出广告",
			"float"=>"漂浮广告",
			"hangL"=>"左侧门帘",
			"hangR"=>"右侧门帘",
			"hangLR"=>"左右门帘",
			"bigScreen"=>"拉屏广告"
			);
		$this->assign("mods",$mods);
		$this->assign("info",$info);
		$this->assign("page_id",$page_id);
		$this->display("Advanced/adver_edit");
	}
	
	public function adver_update (){
		
		$page_id=I("page_id","1");
		$id=I("id");
		$title=I("title");
		if(empty($title)){
			$msg=base64_encode("标题不能为空");
			U("System/info",array("msg"=>$msg),"",true);
		}
		
		$db=M("adver");
		$data=array(
			"sort"=>I("sort"),
			"title"=>$title,
			"state"=>I("state"),
			"mode"=>I("mode","popup"),
			"url"=>I("url"),
			"width"=>I("width"),
			"height"=>I("height"),
			"time"=>I("time")
		);
		if(empty($id)){
			$data['create_time']=time();
			$data['id']=$db->max("id")+1;
			$rst=$db->add($data);
		}else{
			$rst=$db->where("id={$id}")->save($data);
		}	
		if($rst!==false){
			U("Adver/adver_list",array("page_id"=>$page_id),"",true);
		}else{
			$msg=base64_encode("新增/编辑失败");
			U("System/info",array("msg"=>$msg),"",true);
		}
	}
	public function adver_delete (){
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
		$db=M("adver");
		$condition['id']  = array('in',$ids);
		$rst=$db->where($condition)->delete();
		$returnURL=U("Adver/adver_list",array("page_id"=>$page_id));
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