<?php
if(empty($_POST['name'])){
	skip('manage_add.php','error','管理员名称不得为空！');
}
if(mb_strlen($_POST['name'])>66){
	skip('manage_add.php','error','版块名称不得多余66个字符！');
}
if(mb_strlen($_POST['pw'])<6){
	skip('manage_add.php','error','密码不能少于6位');
}
$_POST=escape($link,$_POST);
$query="select * from sfk_manage where name='{$_POST['name']}'";
$result=execute($link,$query);



if(mysqli_num_rows($result)){
	skip('manage_add.php','error','这个管理员已经有了！');
}
?>