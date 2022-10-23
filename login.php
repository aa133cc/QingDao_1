<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
if(isset($_POST['submit'])){
include_once 'check_login.inc.php';
$_POST=escape($link,$_POST);
$query="select * from sfk_manage where name='{$_POST['name']}' and pw=('{$_POST['pw']}')";
$result=execute($link, $query);
if(mysqli_num_rows($result)==1){
    skip('father_module.php', 'ok', '用户名或密码填写OK！');
}else{
    skip('login.php', 'error', '用户名或密码填写错误！');
}
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html ">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<div id="main">
<div class="title">登陆</div>
<form method="post">
<label>用户名   <input class="text" type="text" name="name" /></label><br>
<label> 密码  <input class="text" type="password" name="pw" /></label><br>
<label>  验证码 <input class="text" type="text" name="vcode" /></label><br>
<label>   <img class="vcode" src="show_code.php" /></label>
<label>   <input class="submit" type="submit" name="submit" value="登陆"></label>
</body>
</html>