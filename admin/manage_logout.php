<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/manage_tool.inc.php';
$link=connect();
$member_id=is_login($link);
if(!$member_id){
    skip('qingdao.php','error','你没有登录，不需要退出！');
}
setcookie('sfk[name]','',time()-3600);
setcookie('sfk[pw]','',time()-3600);
skip('login.php','ok','退出成功！');




?>