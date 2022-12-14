<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/manage_tool.inc.php';
$link=connect();
if(!$member_id=is_login($link)){
    skip('youke_login.php', 'error', '请登录管理员');
}
$template['title']='景点资讯-修改';
$template['css']=array('style/publicold.css');
$link=connect();
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	skip('father_module.php','error','id参数错误！');
}
$query="select * from sfk_father_module where id={$_GET['id']}";
$result=execute($link,$query);
if(!mysqli_num_rows($result)){
	skip('father_module.php','error','这条版块信息不存在！');
}
if(isset($_POST['submit'])){
	//验证
	$check_flag='update';
	include 'inc/check_father_module.inc.php';
	$query="update sfk_father_module set module_name='{$_POST['module_name']}',sort={$_POST['sort']} where id={$_GET['id']}";
	execute($link,$query);
	if(mysqli_affected_rows($link)==1){
		skip('father_module.php','ok','修改成功！');
	}else{
		skip('father_module.php','error','修改失败,请重试！');
	}
}
$data=mysqli_fetch_assoc($result);
?>
<?php include 'inc/header.inc.php'?>
<div id="main">
	<div class="title" style="margin-bottom:20px;">修改景点新闻资讯- <?php echo $data['module_name']?></div>
	<form method="post">
		<table class="au">
			<tr>
				<td>新闻内容</td>
				<td><input name="module_name" value="<?php echo $data['module_name']?>" type="text" /></td>
				<td>
					版块名称不得为空，最大不得超过66个字符
				</td>
			</tr>
			<tr>
				<td>排序</td>
				<td><input name="sort" value="<?php echo $data['sort']?>" type="text" /></td>
				<td>
					填写一个数字即可
				</td>
			</tr>
		</table>
		<input style="margin-top:20px;cursor:pointer;" class="btn" type="submit" name="submit" value="修改" />
	</form>
</div>
<?php include 'inc/footer.inc.php'?>