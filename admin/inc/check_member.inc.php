<?php
if(empty($_POST['name'])){
    skip('member_add.php','error','用户名称不得为空！');
}
if(mb_strlen($_POST['name'])>66){
    skip('member_add.php','error','版块名称不得多余66个字符！');
}
if(mb_strlen($_POST['pw'])<6){
    skip('member_add.php','error','密码不能少于6位');
}
$_POST=escape($link,$_POST);
$query="select * from sfk_member where name='{$_POST['name']}'";
$result=execute($link,$query);



if(mysqli_num_rows($result)){
    skip('member_add.php','error','这个用户已经有了！');
}
?>