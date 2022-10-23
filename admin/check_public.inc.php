<?php





if(mb_strlen($_POST['content'])>255){
    skip('public.php', 'error', '标题不得超过255个字符！');
}
?>