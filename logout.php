<?php

if (array_key_exists("logout", $_GET)) {
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['oauth_provider']);
    unset($_SESSION['fb_APPID_user_id']);
    session_destroy();
    
    setcookie("fbsr_1374799492774805",'',time()-10);
    
   header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
