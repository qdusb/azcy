<?php
function getUpload(){
    import('ORG.Net.UploadFile');
    $data_folder=date("Ymd");
    $upload = new UploadFile();
    $upload->maxSize            = C("IMAGE_SIZE");
    $upload->allowExts          = explode(',', 'jpg,gif,png,jpeg,zip,ppt,doc,docx,xls,xlms');
    $upload->savePath           = C("UPLOAD_PATH").$data_folder."/";
    $upload->thumbRemoveOrigin  = false;
    return $upload; 
}
function deleteFile($file){
	if(file_exists($file)){
		$rst=@unlink ($file); 
	}
	return $rst;
}
function getImgUpload(){
    import('ORG.Net.UploadFile');
    $data_folder=date("Ymd");
    $upload = new UploadFile();
    $upload->maxSize            = C("IMAGE_SIZE");
    $upload->allowExts          = explode(',', 'jpg,gif,png,jpeg');
    $upload->savePath           = C("UPLOAD_PATH").$data_folder."/";
    $upload->thumbRemoveOrigin  = false;
    return $upload; 
}
function getAnnexUpload(){
    import('ORG.Net.UploadFile');
    $data_folder=date("Ymd");
    $upload = new UploadFile();
    $upload->maxSize            = C("IMAGE_SIZE");
    $upload->allowExts          = explode(',', 'zip,ppt,doc,docx,xls,xlms,pdf');
    $upload->savePath           = C("UPLOAD_PATH").$data_folder."/";
    $upload->thumbRemoveOrigin  = false;
    return $upload; 
}
function con_filter($str){
	return str_replace("\&quot;", "", $str);
}
function info($msg){
	echo "<script>alert('".$msg."');history.back(-1);</script>";
	exit;
}
function getLinkURL($class_id){
	/*if($class_id=="101101"){

	}*/
	return U("Info/infolist",array("class_id"=>$class_id));
}
/*分页*/
function page($page_id,$page_num,$url,$params)
{
	$page_num=(int)$page_num;
	$home_params=array_merge($params,array("page_id"=>1));
	$home=U($url,$home_params);
	$prev_id=max(1,$page_id-1);
	$next_id=min($page_id+1,$page_num);

	$prev_params=array_merge($params,array("page_id"=>$prev_id));
	$prev=U($url,$prev_params);

	$next_params=array_merge($params,array("page_id"=>$next_id));
	$next=U($url,$next_params);

	$end_params=array_merge($params,array("page_id"=>$page_num));
	$end=U($url,$end_params);

	$page=array();
	for($i=1;$i<=$page_num;$i++)
	{
		$spage_params=array_merge($params,array("page_id"=>$i));
		$spage=array(
			"url"=>U($url,$spage_params),
			"label"=>$i
			);
		array_push($page,$spage);
	}

	$pages=array(
		"home"=>$home,
		"end"=>$end,
		"prev"=>$prev,
		"next"=>$next,
		"page_num"=>$page_num,
		"page_id"=>$page_id,
		"page"=>$page
		);
	return $pages;
}
?>