<?php
file_put_contents('noJS', date("d-m-Y H:i:s").' = '.$_SERVER['REMOTE_ADDR'].' / '.$_SERVER["HTTP_X_REAL_IP"].' / '.$_SERVER['HTTP_X_FORWARDED_FOR'].' = '.$_SERVER['HTTP_USER_AGENT'].' | '.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."\n", FILE_APPEND);
?>
