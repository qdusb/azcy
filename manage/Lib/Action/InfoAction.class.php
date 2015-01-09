<?php
class InfoAction extends BasicAction{
	public function index(){

	}

	/*信息列表*/
	public function infolist(){
		$class_id=I("class_id");
		$page_id=I("page_id","1");
		$select_state=I("select_state","1");
		
		if(empty($class_id)){
			$this->display("Public/error");
			exit;
		}
		/*信息列表页的基本信息*/
		$this->assign("class_id",$class_id);
		$this->assign("page_id",$page_id);
		$this->assign("select_state",$select_state);
		$this->assign("state_label",array('未审核','正常','推荐'));
		$this->assign("class_name",M("info_class")->where("id={$class_id}")->getfield('name'));
		
		/*跳转链接 新增、刷新*/
		$params=array("class_id"=>$class_id,"page_id"=>$page_id,"select_state"=>$select_state);

		$addURL=U("Info/edit",$params);
		$freshURL=U("Info/infolist",$params);

		$this->assign("addURL",$addURL);
		$this->assign("freshURL",$freshURL);

		$condition=array(
			"class_id"=>array("like", "%".$class_id),
			"state"=>$select_state
			);
		if($this->grade==5){
			$condition['admin_id']=$this->uid;
		}

		$page_size=C("PAGE_SIZE");
		$db=M("info");
		$cnt=$db->where($condition)->count("id");
		$page_num=ceil($cnt/$page_size);
		$page=page($page_id,$page_num,"Info/infolist",$params);
		$this->assign("page",$page);

		$start_record=($page_id-1)*$page_size;
		$record=$db->where($condition)->order("state desc,sort desc,create_time desc")->limit($start_record,$page_size)->select();
        
        if(count($record)<=0&&$page_id>1){
            $params=array_merge($params,array("page_id"=>$page_id-1));
            U("Info/infolist",$params,"",true);
        }
        
		foreach($record as $key=>&$val){
			$params=array_merge($params,array("id"=>$val['id']));
			$val['url']=U("Info/edit",$params);
		}
		$this->assign("record",$record);
		$this->display("info_list");
	}
	/*信息编辑页面*/
	public function edit()
	{
		$id=I("id");
		$class_id=I("class_id");
		$page_id=I("page_id");
		$select_state=I("select_state","1");
		$params=array("class_id"=>$class_id,"page_id"=>$page_id,"select_state"=>$select_state);

		if(empty($class_id)){
			$this->display("Public/error");
			exit;
		}
		/*返回列表链接*/
		$returnURL=U("Info/infolist",$params);

		$db=M("info");
		if(empty($id)){
			$info=array();
			$sort=$db->where("class_id={$class_id}")->max("sort");
			$info['sort']=$sort+10;
			$info['state']=1;
			$info['create_time']=date("Y-m-d H:i:s",time());
			
		}else{
			$info=$db->where("id={$id}")->find();
			$info['content']=con_filter($info['content']);
		}

		$info['class_name']=M("info_class")->where("id={$class_id}")->getfield("name");
		$info['page_id']=$page_id;
		$info['class_id']=$class_id;
		$info['select_state']=$select_state;

		$this->assign("info",$info);
		$this->assign("returnURL",$returnURL);
		$this->display("info_edit");
	}
	/*数据更新 包括新增和修改*/
	public function update(){
        
		if(!$this->isPost()){
			$this->display("Public/error");
			exit;
		}
		$class_id=I("class_id");
		$page_id=I("page_id","1");
		$select_state=I("select_state","1");
		$title=I("title","","htmlspecialchars");
		$params=array("class_id"=>$class_id,"page_id"=>$page_id,"select_state"=>$select_state);

		if(empty($title)){
			$params=array(
    			"msg"=>base64_encode("标题不能为空")
    			);
			U("System/info",$params,"",true);
			exit;
		}
		$returnURL=U("Info/infolist",$params);
		$id=I("id");
		$db=M("info");
		$data=array(
			"sort"=>(int)I("sort","10"),
			"title"=>$title,
			"class_id"=>$class_id,
			"admin_id"=>$this->uid,
			"author"=>I("author"),
			"level"=>I("level"),
			"source"=>I("source"),
			"website"=>I("website"),
			"keyword"=>I("keyword"),
			"intro"=>I("intro"),
			"content"=>I("content","","htmlspecialchars"),
			"views"=>I("views"),
			"modify_time"=>date("Y-m-d H:i:s"),
			"state"=>(int)I("state"),
            "create_time"=>I("create_time")
		);
        if(!empty($_FILES)){
            $data_folder=date("Ymd");
            $upload = getUpload();
            if (!$upload->upload()) {
                $this->error($upload->getErrorMsg());
            } else {
                $uploadList = $upload->getUploadFileInfo();
            }
            foreach($uploadList as $list){
                if($list['key']=="img"){
                    $data["pic"]=$data_folder."/".$list['savename'];
                }else{
                    $data["annex"]=$data_folder."/".$list['savename'];
                }
            }
        }
        if(empty($id)){
			$id=$db->max("id");
			$data['id']=$id+1;
			if($this->grade==5){
				$data['state']=0;
			}
			$rst=$db->add($data);
		}else{
			$rst=$db->where("id={$id}")->save($data);
		}
        var_dump($uploadList);
        exit;
		if($rst !== false){
			U("Info/infolist",$params,"",true);
		}else{
			$params=array(
    			"msg"=>base64_encode("信息保存失败")
    			);
			U("System/info",$params,"",true);
		}	
	}
	public function search(){
		if(!$this->isPost()){
			$this->display("Public/error");
			exit;
		}
	}
	public function delete(){
		if(!$this->isPost()){
			$this->display("Public/error");
			exit;
		}
		$ids=I("ids");
		$db=M("info");
		$condition['id']  = array('in',$ids);
        foreach($ids as $id){
            $class_id=$db->where("id={$id}")->field("class_id")->find();
            $class_id=$class_id['class_id'];
            $db->where("id={$id}")->save(array("o_class_id"=>$class_id));
        }
		$rst=$db->where($condition)->save(array("class_id"=>"-1"));

		$class_id=I("class_id");
		$page_id=I("page_id","1");
        
		$returnURL=U("Info/infolist",array("class_id"=>$class_id,"page_id"=>$page_id));
		if($rst==true){
			$params=array(
    			"msg"=>base64_encode("信息删除成功"),
    			"url"=>base64_encode($returnURL)
    			);
		}else{
			$params=array(
    			"msg"=>base64_encode("信息删除失败")
    			);
		}
		U("System/info",$params,"",true);
	
	}
}
?>