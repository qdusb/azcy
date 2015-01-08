<?php
$config = require("config.php");
$array=array(
	'URL_ROUTER_ON'   => true,
	'SESSION_AUTO_START' =>true,
	'TMPL_PARSE_STRING' =>array(
		'__PUBLIC__' => __ROOT__.'/'.APP_NAME.'/Tpl/Public',
		),
	"PAGE_SIZE"=>12,
	"IMAGE_SIZE"=>1024*1024*3,
	"UPLOAD_PATH_FROM_ADMIN"=>'../upload/'
);
return array_merge($config,$array);
?>