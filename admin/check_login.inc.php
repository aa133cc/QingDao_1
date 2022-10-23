<?php
if(empty($_POST['name'])){
    skip('login.php','error','管理员名称不得为空！');
}
if(mb_strlen($_POST['name'])>66){
    skip('login.php','error','版块名称不得多余66个字符！');
}
if(mb_strlen($_POST['pw'])<6){
    skip('login.php','error','密码不能少于6位');
}
if(strtolower($_POST['vcode'])!=strtolower($_SESSION['vcode'])){
    skip('login.php', 'error','验证码输入错误！');
}




?>