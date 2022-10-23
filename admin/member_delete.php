<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    skip('member.php','error','id参数错误！');
}

$link=connect();
$query="delete from sfk_member where id={$_GET['id']}";
execute($link,$query);
if(mysqli_affected_rows($link)==1){
    skip('member.php','ok','恭喜你删除成功！');
}else{
    skip('member.php','error','对不起删除失败，请重试！');
}
?>
