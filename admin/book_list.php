<?php
require(dirname(__FILE__) . "/init.php");
require(dirname(__FILE__) . "/isadmin.php");
require(dirname(__FILE__) . "/config.php");


//高级管理权限
if ($session_admin_grade != ADMIN_HIDDEN && $session_admin_grade != ADMIN_SYSTEM && hasInclude($session_admin_advanced, MESSAGE_ADVANCEDID) == false)
{
	info("没有权限！");
}


$page = (int)$_GET["page"] > 0 ? (int)$_GET["page"] : 1;


$listUrl = "book_list.php?page=$page";
$viewUrl = "book_view.php?page=$page";


//连接数据库
$db = new onlyDB($config["db_host"], $config["db_user"], $config["db_pass"], $config["db_name"]);


//删除
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$id_array = $_POST["ids"];
	if (!is_array($id_array))
	{
		$id_array = array($id_array);
	}

	$db->query("begin");

	$sql = "delete from active where id in (" . implode(",", $id_array) . ")";
	$rst = $db->query($sql);

	if ($rst)
	{
		$db->query("commit");
		$db->close();
		header("Location: $listUrl");
		exit();
	}
	else
	{
		$db->query("rollback");
		$db->close();
		info("删除预约失败！");
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
	</head>
	<body>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr class="position">
				<td class="position">当前位置: 管理中心 -&gt; 高级管理 -&gt; 在线预约</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo $listUrl?>">[刷新列表]</a>&nbsp;
					<a href="javascript:reverseCheck(document.form1.ids);">[反向选择]</a>&nbsp;
					<a href="javascript:if(delCheck(document.form1.ids)) {document.form1.submit();}">[删除]</a>&nbsp;
				</td>
				<td align="right">
					<?php
					//设置每页数
					$page_size = DEFAULT_PAGE_SIZE;
					//总记录数
					$sql = "select count(*) as cnt from active";
					$rst = $db->query($sql);
					$row = $db->fetch_array($rst);
					$record_count = $row["cnt"];
					$page_count = ceil($record_count / $page_size);

					$page_str = page($page, $page_count, $pageUrl);
					echo $page_str;
					?>
				</td>
			</tr>
		</table>
		<table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="listTable">
			<form name="form1" action="" method="post">
				<tr class="listHeaderTr">
					<td width="3%"></td>
					<td width="8%">序号</td>
					<td>预约人姓名</td>
					<td>预约活动</td>
					<td width="15%">电话</td>
					<td width="15%">城市</td>.
					<td width="15%">小区</td>
					<td width="8%">预约时间</td>
					
				</tr>
				<?php
				$sql = "select * from active order by sortnum desc";
				$sql .= " limit " . ($page - 1) * $page_size . ", " . $page_size;
				$rst = $db->query($sql);
				while ($row = $db->fetch_array($rst))
				{
					$css = ($css == "listTr") ? "listAlternatingTr" : "listTr";
				?>
					<tr class="<?php echo $css?>">
						<td><input type="checkbox" id="ids" name="ids[]" value="<?php echo $row["id"]?>"></td>
						<td><?php echo $row["sortnum"]?></td>
						<td><a href="<?php echo $viewUrl?>&id=<?php echo $row["id"]?>"><?php echo $row["user_name"]?></a></td>
						<td><?php echo $row["product_name"]?></td>
						<td><?php echo $row["phone"]?></td>
						<td><?php echo $row["city"]?></td>
						<td><?php echo formatDate("Y-m-d", $row["create_time"])?></td>
						<td><?php echo $row["area"]?></td>
					  
					</tr>
				<?php
				}
				?>
				<tr class="listFooterTr">
					<td colspan="10"><?php echo $page_str?></td>
				</tr>
			</form>
		</table>
		<?php
		$db->close();
		?>
	</body>
</html>
