<?php
require(dirname(__FILE__) . "/init.php");
require(dirname(__FILE__) . "/isadmin.php");
require(dirname(__FILE__) . "/config.php");
require(dirname(__FILE__) . "/uploadImg.php");


$class_id		= trim($_GET["class_id"]);
$select_class	= empty($_GET["select_class"]) ? $class_id : trim($_GET["select_class"]);
$page			= (int)$_GET["page"] > 0 ? (int)$_GET["page"] : 1;
$select_state	= (int)$_GET["select_state"];
$keyword		= urlencode(trim($_GET["keyword"]));
$id				= (int)$_GET["id"];
if (empty($class_id) || !checkClassID($class_id, 2))
{
	info("指定了错误的分类！");
}

if (strlen($select_class) % CLASS_LENGTH != 0 && !checkClassID($select_class, strlen($select_class) / CLASS_LENGTH))
{
	info("选择了错误的分类！");
}

//权限检查
if ($session_admin_grade != ADMIN_HIDDEN && $session_admin_grade != ADMIN_SYSTEM && $session_admin_grade != ADMIN_ADVANCED && hasInclude($session_admin_popedom, substr($class_id, 0, CLASS_LENGTH)) != true && hasInclude($session_admin_popedom, $class_id) != true)
{
	info("没有权限！");
}


$listUrl = "product_list.php?class_id=$class_id&select_class=$select_class&select_state=$select_state&keyword=$keyword&page=$page";
$editUrl = "product_edit.php?class_id=$class_id&select_class=$select_class&select_state=$select_state&keyword=$keyword&page=$page&id=$id";


//连接数据库
$db = new onlyDB($config["db_host"], $config["db_user"], $config["db_pass"], $config["db_name"]);


//查询顶级分类的记录设置
$baseClassID = substr($class_id, 0, CLASS_LENGTH);
$sql = "select hasViews, hasState, hasPic, hasAnnex, hasIntro, hasContent, hasWebsite, hasAuthor, hasSource, hasKeyword from info_class where id='$baseClassID'";
$rst = $db->query($sql);
if ($row = $db->fetch_array($rst))
{
	$hasViews	= $row["hasViews"];
	$hasState	= $row["hasState"];
	$hasPic		= $row["hasPic"];
	$hasAnnex	= $row["hasAnnex"];
	$hasIntro	= $row["hasIntro"];
	$hasContent	= $row["hasContent"];
	$hasWebsite	= $row["hasWebsite"];
	$hasAuthor	= $row["hasAuthor"];
	$hasSource	= $row["hasSource"];
	$hasKeyword	= $row["hasKeyword"];
	$imagelist	= $row['imagelist'];
	$hasShare	= $row["hasShare"];
	$hasSelect	= $db->getTableFieldValue("info_class", "has_sub", "where id='$class_id'");
}
else
{
	$db->close();
	info("指定的分类不存在！");
}
//提交表单
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$sortnum = (int)$_POST["sortnum"];
	if ($hasState == 1)
	{
		$state = (int)$_POST["state"];
	}
	else
	{
		$state = 1;
	}
	$share = (int)$_POST["share"];

	//权限 普通管理员只能发表未审核的信息
	if ($session_admin_grade == ADMIN_COMMON)
	{
		$state = 0;
	}

	$title	= htmlspecialchars(trim($_POST["title"]));
	$series	= htmlspecialchars(trim($_POST["series"]));
	$classcol	= htmlspecialchars(trim($_POST["classcol"]));
	$title2	= htmlspecialchars(trim($_POST["title2"]));

	if ($hasSelect == 1)
	{
		$info_class = trim($_POST["info_class"]);
	}
	else
	{
		$info_class = $class_id;
	}

	if ($hasAuthor == 1)
	{
		$author = htmlspecialchars(trim($_POST["author"]));
	}
	else
	{
		$author = "";
	}

	if ($hasSource == 1)
	{
		$source = htmlspecialchars(trim($_POST["source"]));
	}
	else
	{
		$source = "";
	}

	if ($hasWebsite == 1)
	{
		$website = htmlspecialchars(trim($_POST["website"]));
	}
	else
	{
		$website = "";
	}

	if ($hasPic == 1)
	{
		$pic_file	= &$_FILES["pic"];
		$pic		= uploadImg($pic_file, "gif,jpg,png,swf,fla,wmv");			//上传图片
		$del_pic	= (int)$_POST["del_pic"];
	}
	else
	{
		$pic = "";
	}

	if ($hasAnnex == 1)
	{
		$annex_file	= &$_FILES["annex"];
		$annex		= uploadImg($annex_file, "pdf,doc,xls,ppt,rar,zip,flv");	//上传附件
		$del_annex	= (int)$_POST["del_annex"];
		
		$annex_file2	= &$_FILES["annex2"];
		$annex2		= uploadImg($annex_file2, "pdf,doc,xls,ppt,rar,zip,flv");	//上传附件
		$del_annex2	= (int)$_POST["del_annex2"];
		
		$annex_file3	= &$_FILES["annex3"];
		$annex3		= uploadImg($annex_file3, "pdf,doc,xls,ppt,rar,zip,flv");	//上传附件
		$del_annex3	= (int)$_POST["del_annex3"];
	}
	else
	{
		$annex = "";
		$annex2 = "";
		$annex3 = "";
	}

	if ($hasKeyword == 1)
	{
		$keyword = htmlspecialchars(trim($_POST["keyword"]));
	}
	else
	{
		$keyword = "";
	}

	if ($hasIntro == 1)
	{
		$intro = $_POST["intro"];
	}
	else
	{
		$intro = "";
	}

	if ($hasContent == 1)
	{
		$content = $_POST["content"];
		$files	 = $_POST["content_files"];
	}
	else
	{
		$content = "";
		$files	 = "";
	}

	$create_time	= formatDate("Y-m-d H:i:s", $_POST["create_time"]);
	$now			= date("Y-m-d H:i:s");
	$charac			= $_POST["charac"];
	$parameter		= $_POST["parameter"];
	$details		= $_POST["details"];
	$imagelist		=$_POST['imagelist'];
	
	if (empty($title))
	{
		$db->close();
		info("填写的参数错误！");
	}

	if ($id < 1)
	{
		$aid	= $db->getMax("info", "id", "") + 1;
		$sortnum = $db->getMax("info", "sortnum", "class_id='$info_class'") + 10;
		$sql = "insert into info(id, sortnum, title, title2, admin_id, class_id, author, source, website, pic, annex,annex2,annex3, keyword, intro, content, files, views, create_time, modify_time, state, share, series, classcol,charac,parameter,details,imagelist) values(" . ($db->getMax("info", "id", "") + 1) . ", $sortnum, '$title', '$title2', $session_admin_id, '$info_class', '$author', '$source', '$website', '$pic', '$annex','$annex2','$annex3', '$keyword', '$intro', '$content', '$files', 0, '$create_time', '$now', $state, $share, '$series', '$classcol','$charac','$parameter','$details','$imagelist')";
	}
	else
	{
		//权限 普通管理员只能修改自己发表但未审核的信息
		if ($session_admin_grade == ADMIN_COMMON && ($db->getTableFieldValue("info", "state", "where id=$id") == 1 || $db->getTableFieldValue("info", "admin_id", "where id=$id") != $session_admin_id))
		{
			info("没有权限！");
		}

		if ((!empty($pic) || $del_pic == 1) && (!empty($annex) || $del_annex == 1)&& (!empty($annex2) || $del_annex2 == 1)&& (!empty($annex3) || $del_annex3 == 1))
		{
			$oldPic		= $db->getTableFieldValue("info", "pic", "where id=$id");
			$oldAnnex	= $db->getTableFieldValue("info", "annex", "where id=$id");
			$oldAnnex2	= $db->getTableFieldValue("info", "annex2", "where id=$id");
			$oldAnnex3	= $db->getTableFieldValue("info", "annex3", "where id=$id");
			$sql = "update info set sortnum=$sortnum, title='$title', title2='$title2', class_id='$info_class', author='$author', source='$source', website='$website', pic='$pic', annex='$annex',annex2='$annex2',annex3='$annex3', keyword='$keyword', intro='$intro', content='$content', files='$files', create_time='$create_time', modify_time='$now', series='$series', classcol='$classcol', state=$state, share=$share,charac='$charac',parameter='$parameter',details='$details',imagelist='$imagelist' where id=$id";
		}
		else if (!empty($pic) || $del_pic == 1)
		{
			$oldPic		= $db->getTableFieldValue("info", "pic", "where id=$id");
			$oldAnnex	= "";
			$sql = "update info set sortnum=$sortnum, title='$title', title2='$title2', class_id='$info_class', author='$author', source='$source', website='$website', pic='$pic', keyword='$keyword', intro='$intro', content='$content', files='$files', create_time='$create_time', modify_time='$now', series='$series', classcol='$classcol', state=$state, share=$share,charac='$charac',parameter='$parameter',details='$details',imagelist='$imagelist'where id=$id";
		}
		else if (!empty($annex) || $del_annex == 1)
		{
			$oldPic		= "";
			$oldAnnex	= $db->getTableFieldValue("info", "annex", "where id=$id");
			$sql = "update info set sortnum=$sortnum, title='$title', title2='$title2', class_id='$info_class', author='$author', source='$source', website='$website', annex='$annex', keyword='$keyword', intro='$intro', content='$content', files='$files', create_time='$create_time', modify_time='$now', series='$series', classcol='$classcol', state=$state, share=$share,charac='$charac',parameter='$parameter',details='$details',imagelist='$imagelist' where id=$id";
		}
		else if (!empty($annex2) || $del_annex2 == 1)
		{
			$oldPic		= "";
			$oldAnnex	= $db->getTableFieldValue("info", "annex", "where id=$id");
			$sql = "update info set sortnum=$sortnum, title='$title', title2='$title2', class_id='$info_class', author='$author', source='$source', website='$website', annex2='$annex2', keyword='$keyword', intro='$intro', content='$content', files='$files', create_time='$create_time', modify_time='$now', series='$series', classcol='$classcol', state=$state, share=$share,charac='$charac',parameter='$parameter',details='$details',imagelist='$imagelist' where id=$id";
		}
		else if (!empty($annex3) || $del_annex3 == 1)
		{
			$oldPic		= "";
			$oldAnnex	= $db->getTableFieldValue("info", "annex", "where id=$id");
			$sql = "update info set sortnum=$sortnum, title='$title', title2='$title2', class_id='$info_class', author='$author', source='$source', website='$website', annex3='$annex3', keyword='$keyword', intro='$intro', content='$content', files='$files', create_time='$create_time', modify_time='$now', series='$series', classcol='$classcol', state=$state, share=$share,charac='$charac',parameter='$parameter',details='$details',imagelist='$imagelist' where id=$id";
		}
		else
		{
			$sql = "update info set sortnum=$sortnum, title='$title', title2='$title2', class_id='$info_class', author='$author', source='$source', website='$website', keyword='$keyword', intro='$intro', content='$content', files='$files', create_time='$create_time', modify_time='$now', series='$series', classcol='$classcol', state=$state, share=$share,charac='$charac',parameter='$parameter',details='$details',imagelist='$imagelist' where id=$id";
		}
	}

	$rst = $db->query($sql);
	$db->close();

	if ($rst)
	{
		//修改成功后删除老图片、附件
		if ($id > 0)
		{
			deleteFile($oldPic, 1);
			deleteFile($oldAnnex, 1);
			deleteFile($oldAnnex2, 1);
			deleteFile($oldAnnex3, 1);
		}

		header("Location: $listUrl");
		exit;
	}
	else
	{
		//添加或修改失败后 删除上传的图片、附件
		deleteFile($pic, 1);
		deleteFile($annex, 1);
		deleteFile($annex2, 1);
		deleteFile($annex3, 1);
		//添加失败还要删除编辑器内上传的图片
		if ($id < 1)
		{
			deleteFiles($files, 2);
		}

		info("添加/编辑信息失败！");
	}
}


if ($id < 1)
{
	$sortnum	 = $db->getMax("info", "sortnum", "class_id like '$class_id%'") + 10;
	$select_id	 = $select_class;
	$state		 = 1;
	$share		 = 0;
	$create_time = date("Y-m-d H:i:s");
}
else
{
	$sql = "select * from info where id=$id";
	$rst = $db->query($sql);
	if ($row = $db->fetch_array($rst))
	{
		$sortnum		= $row["sortnum"];
		$title			= $row["title"];
		$title2			= $row["title2"];
		$select_id		= $row["class_id"];
		$author			= $row["author"];
		$source			= $row["source"];
		$website		= $row["website"];
		$pic			= $row["pic"];
		$annex			= $row["annex"];
		$annex2			= $row["annex2"];
		$annex3			= $row["annex3"];
		$keyword		= $row["keyword"];
		$intro			= $row["intro"];
		$content		= $row["content"];
		$files			= $row["files"];
		$state			= $row["state"];
		$share			= $row["share"];
		$create_time	= $row["create_time"];
		$series			= $row["series"];
		$classcol		= $row["classcol"];
		$charac			= $row["charac"];
		$parameter		= $row["parameter"];
		$details		= $row["details"];
		$imagelist		=$row['imagelist'];
	}
	else
	{
		$db->close();
		info("指定的记录不存在！");
	}
}
?>


<html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta http-equiv="Expires" content="-1000">
		<link href="images/admin.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="images/common.js"></script>
		<script charset="utf-8" src="kindeditor/kindeditor.js"></script>
		<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
		<script>
			KindEditor.ready(function(K) {
				var editor = K.create('textarea[name="content"]', {
					uploadJson : 'kindeditor/php/upload_json.php',
					fileManagerJson : 'kindeditor/php/file_manager_json.php',
					width : '700px',
					height : '300px',
					pasteType : 1,
					allowFileManager : true,
					afterCreate : function() {
						var self = this;
						K.ctrl(document, 13, function() {
							self.sync();
							K('form[name=form1]')[0].submit();
						});
						K.ctrl(self.edit.doc, 13, function() {
							self.sync();
							K('form[name=form1]')[0].submit();
						});
					}
				});
				var editor2 = K.create('textarea[name="charac"]', {
					uploadJson : 'kindeditor/php/upload_json.php',
					fileManagerJson : 'kindeditor/php/file_manager_json.php',
					width : '700px',
					height : '300px',
					pasteType : 1,
					allowFileManager : true,
					afterCreate : function() {
						var self = this;
						K.ctrl(document, 13, function() {
							self.sync();
							K('form[name=form1]')[0].submit();
						});
						K.ctrl(self.edit.doc, 13, function() {
							self.sync();
							K('form[name=form1]')[0].submit();
						});
					}
				});
				var editor3 = K.create('textarea[name="parameter"]', {
					uploadJson : 'kindeditor/php/upload_json.php',
					fileManagerJson : 'kindeditor/php/file_manager_json.php',
					width : '700px',
					height : '300px',
					pasteType : 1,
					allowFileManager : true,
					afterCreate : function() {
						var self = this;
						K.ctrl(document, 13, function() {
							self.sync();
							K('form[name=form1]')[0].submit();
						});
						K.ctrl(self.edit.doc, 13, function() {
							self.sync();
							K('form[name=form1]')[0].submit();
						});
					}
				});
				var editor4 = K.create('textarea[name="details"]', {
					uploadJson : 'kindeditor/php/upload_json.php',
					fileManagerJson : 'kindeditor/php/file_manager_json.php',
					width : '700px',
					height : '300px',
					pasteType : 1,
					allowFileManager : true,
					afterCreate : function() {
						var self = this;
						K.ctrl(document, 13, function() {
							self.sync();
							K('form[name=form1]')[0].submit();
						});
						K.ctrl(self.edit.doc, 13, function() {
							self.sync();
							K('form[name=form1]')[0].submit();
						});
					}
				});
				var editor5 = K.create('textarea[name="imagelist"]', {
					uploadJson : 'kindeditor/php/upload_json.php',
					fileManagerJson : 'kindeditor/php/file_manager_json.php',
					width : '700px',
					height : '300px',
					pasteType : 1,
					items : ['source',"image"],
					allowFileManager : true,
					afterCreate : function() {
						var self = this;
						K.ctrl(document, 13, function() {
							self.sync();
							K('form[name=form1]')[0].submit();
						});
						K.ctrl(self.edit.doc, 13, function() {
							self.sync();
							K('form[name=form1]')[0].submit();
						});
					}
				});
				var editor1 = K.create('textarea[name="intro"]', {
					width : '700px',
					height : '200px',
					pasteType : 1,
					items : [
							'source', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
							'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
							'insertunorderedlist', '|', 'link'],
					afterCreate : function() {
						var self = this;
						K.ctrl(document, 13, function() {
							self.sync();
							K('form[name=form1]')[0].submit();
						});
						K.ctrl(self.edit.doc, 13, function() {
							self.sync();
							K('form[name=form1]')[0].submit();
						});
					}
				});
			});
		</script>
		<script type="text/javascript">
			function check(form)
			{
				if (form.sortnum.value.match(/\D/))
				{
					alert("请输入合法的序号！");
					form.sortnum.focus();
					return false;
				}

				if(form.title.value == "")
				{
					alert("请填入标题名称!");
					form.title.focus();
					return false;
				}

				<?php
				if ($hasPic == 1)
				{
				?>
					if (form.pic.value != "")
					{
						var ext = form.pic.value.substr(form.pic.value.length - 3).toLowerCase();

						if (ext != "gif" && ext != "jpg" && ext != "png" && ext != "swf" && ext != "wmv")
						{
							alert("图片必须是GIF、JPG或PNG格式！");
							return false;
						}
					}
				<?php
				}
				?>

				<?php
				if ($hasAnnex == 1)
				{
				?>
					if (form.annex.value != "")
					{
						var ext = form.annex.value.substr(form.annex.value.length - 3).toLowerCase();

						if (ext != "pdf" && ext != "doc" && ext != "xls" && ext != "ppt" && ext != "zip" && ext != "rar" && ext != "flv")
						{
							alert("附件必须是PDF、DOC、XLS、PPT、ZIP、RAR或FLV格式！");
							return false;
						}
					}
				<?php
				}
				?>

				return true;
			}
		</script>
	</head>
	<body>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr class="position">
				<td class="position">当前位置: 管理中心 -&gt; <?php echo $db->getTableFieldValue("info_class", "name", "where id='$class_id'")?> -&gt; 新增/编辑</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo $listUrl?>">[返回列表]</a>
				</td>
			</tr>
		</table>

		<form name="form1" action="" method="post" enctype="multipart/form-data" onSubmit="return check(this);">
			<table width="100%" border="0" cellSpacing="1" cellPadding="0" align="center" class="editTable">
				<tr class="editHeaderTr">
					<td class="editHeaderTd" colSpan="2">修改资料</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">排列序号</td>
					<td class="editRightTd">
						<input type="text" name="sortnum" value="<?php echo $sortnum?>" maxlength="10" size="5">
					</td>
				</tr>
				<?php
				if ($hasState == 1 && $session_admin_grade != ADMIN_COMMON)
				{
				?>
					<tr class="editTr">
						<td class="editLeftTd">状态</td>
						<td class="editRightTd">
							<select name="state" style="width:80px;">
								<option value="0"<?php if ($state == 0) echo "selected";?>>未审核</option>
								<option value="1"<?php if ($state == 1) echo "selected";?>>正常</option>
								<option value="2"<?php if ($state == 2) echo "selected";?>>最新产品</option>
							</select>
						</td>
					</tr>
				<?php
				}
				?>

				<tr class="editTr">
					<td class="editLeftTd">是否分享</td>
					<td class="editRightTd">
						<input type="radio" name="share" value="1"<?php if ($share == 1) echo " checked"?>>是
						<input type="radio" name="share" value="0"<?php if ($share == 0) echo " checked"?>>否
						　（注：启用后打开页面较慢，请根据实际需求启用！）
					</td>
				</tr>

				<tr class="editTr">
					<td class="editLeftTd">发表时间</td>
					<td class="editRightTd"><input type="text" name="create_time" value="<?php echo $create_time?>" maxlength="20" size="24"> 时间格式为2009-01-01 00:00:00</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">标题名称</td>
					<td class="editRightTd"><input type="text" value="<?php echo $title?>" name="title" maxlength="100" size="50"></td>
				</tr>

				<?php
				if ($hasSelect == 1)
				{
				?>
					<tr class="editTr">
						<td class="editLeftTd">文章类别</td>
						<td class="editRightTd">
							<select name="info_class" style="width:50%;">
								<?php
								$sql = "select id, name from info_class order by id asc";
								$rst = $db->query($sql);
								while ($row = $db->fetch_array($rst))
								{
									$id_str=(string)$row["id"];
									$class_name=$row['name'];
									if(strlen($id_str)==12)
									{
										$lab="|——————";
									}
									else if(strlen($id_str)==9)
									{
										$lab="|————";
									}
									else if(strlen($id_str)==6)
									{
										$lab="|——";
									}
									
									else if(strlen($id_str)==3)
									{
										$lab="|";
									}
									if($id_str==(string)$select_id)
									{
										echo "<option value='" . $id_str . "' selected>$lab".$row['name'];
									}
									else
									{
										echo "<option value='" . $id_str . "' >$lab".$row['name'];
									}
								}
								?>
							</select>
						</td>
					</tr>
				<?php
				}

				if ($hasAuthor == 1)
				{
				?>
					<tr class="editTr">
						<td class="editLeftTd">作者</td>
						<td class="editRightTd">
							<input type="text" value="<?php echo $author?>" name="author" maxlength="50" size="30">
						</td>
					</tr>
				<?php
				}

				if ($hasSource == 1)
				{
				?>
					<tr class="editTr">
						<td class="editLeftTd">来源</td>
						<td class="editRightTd">
							<input type="text" value="<?php echo $source?>" name="source" maxlength="50" size="30">
						</td>
					</tr>
				<?php
				}

				if ($hasWebsite == 1)
				{
				?>
					<tr class="editTr">
						<td class="editLeftTd">链接网址</td>
						<td class="editRightTd"><input type="text" value="<?php echo $website?>" name="website" maxlength="300" size="50"></td>
					</tr>
				<?php
				}

				if ($hasPic == 1)
				{
				?>
					<tr class="editTr">
						<td class="editLeftTd">缩略图</td>
						<td class="editRightTd">
							<input type="file" name="pic" size="40">
							<?php
							if ($pic != "")
							{
							?>
								<input type="checkbox" name="del_pic" value="1"> 删除现有图片
							<?php
							}
							?>
						</td>
					</tr>
				<?php
				}

				if ($hasAnnex == 1)
				{
				?>
					<tr class="editTr">
						<td class="editLeftTd">产品说明书</td>
						<td class="editRightTd">
							<input type="file" name="annex" size="40">
							<?php
							if ($annex != "")
							{
							?>
								<input type="checkbox" name="del_annex" value="1"> 删除现有附件
							<?php
							}
							?>
						</td>
					</tr>
					
					<tr class="editTr">
						<td class="editLeftTd">操作方法</td>
						<td class="editRightTd">
							<input type="file" name="annex2" size="40">
							<?php
							if ($annex2 != "")
							{
							?>
								<input type="checkbox" name="del_annex2" value="1"> 删除现有附件
							<?php
							}
							?>
						</td>
					</tr>
					
					<tr class="editTr">
						<td class="editLeftTd">血压记录表</td>
						<td class="editRightTd">
							<input type="file" name="annex3" size="40">
							<?php
							if ($annex3 != "")
							{
							?>
								<input type="checkbox" name="del_annex3" value="1"> 删除现有附件
							<?php
							}
							?>
						</td>
					</tr>
				<?php
				}

				if ($hasKeyword == 1)
				{
				?>
					<tr class="editTr">
						<td class="editLeftTd">版本号</td>
						<td class="editRightTd">
							<input type="text" value="<?php echo $keyword?>" name="keyword" maxlength="50" size="46">
						</td>
					</tr>
				<?php
				}



				if ($hasIntro == 1)
				{
				?>
					<tr class="editTr">
						<td class="editLeftTd">简介</td>
						<td class="editRightTd"><textarea name="intro"><?php  echo $intro; ?></textarea></td>
					</tr>
				<?php
				}

				if ($hasContent == 1)
				{
				?>
					<tr class="editTr">
						<td class="editLeftTd">产品简介</td>
						<td class="editRightTd"><textarea name="content"><?php  echo $content; ?></textarea></td>
					</tr>
				<?php
				}
				?>
				<tr class="editTr">
						<td class="editLeftTd">产品图片</td>
						<td class="editRightTd"><textarea name="imagelist"><?php  echo $imagelist; ?></textarea></td>
					</tr>
				<tr class="editTr">
						<td class="editLeftTd">相似产品</td>
						<td class="editRightTd"><textarea name="charac"><?php  echo  $charac; ?></textarea></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">功能参数</td>
					<td class="editRightTd"><textarea name="parameter"><?php  echo $parameter; ?></textarea></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">产品详情</td>
					<td class="editRightTd"><textarea name="details"><?php  echo $details; ?></textarea></td>
				</tr>
				<tr class="editFooterTr">
					<td class="editFooterTd" colSpan="2">
						<input type="submit" value=" 确 定 ">
						<input type="reset" value=" 重 填 ">
					</td>
				</tr>
			</table>
		</form>
		<script type="text/javascript">document.form1.title.focus();</script>
		<?php
		$db->close();
		?>
	</body>
</html>
