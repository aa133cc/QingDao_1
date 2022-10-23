<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/manage_tool.inc.php';
$link=connect();
if(!$member_id=is_login($link)){
    skip('youke_login.php', 'error', '请登录管理员');
}
if(isset($_POST['submit'])){
	$link=connect();
	//验证用户填写的信息
	$check_flag='add';
	include 'inc/check_father_module.inc.php';
	$query="insert into sfk_father_module(module_name,sort) values('{$_POST['module_name']}',{$_POST['sort']})";
	execute($link,$query);
	if(mysqli_affected_rows($link)==1){
		skip('father_module.php','ok','恭喜你，添加成功！');
	}else{
		skip('faher_module_add.php','error','对不起，添加失败，请重试！');
	}
}

$template['title']='景点资讯添加页';
$template['css']=array('style/publicold.css','style/father_module_add.css');
?>
<?php include 'inc/header.inc.php'?>
<div id="main">
	<div class="title" style="margin-bottom:20px;">发布新闻</div>
	<form method="post">
		<table class="au">
			<tr>
				<td>新闻内容</td>
				<td><input name="module_name" type="text" /></td>
				<td>
					新闻内容不得为空，最大不得超过66个字符
				</td>
			</tr>
			<tr>
				<td>排序</td>
				<td><input name="sort" value="0" type="text" /></td>
				<td>
					填写一个数字即可
				</td>
			</tr>
		</table>
		<input style="margin-top:20px;cursor:pointer;" class="btn" type="submit" name="submit" value="添加" />
	</form>
</div>
<?php include 'inc/footer.inc.php'?>