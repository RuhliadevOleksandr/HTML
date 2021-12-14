<?php
    $lang=$_GET['lang'];
    setcookie("lang","en", time()+365*24*60*60);
    $_COOKIE['lang']=$lang;
    print_r($_COOKIE);


?>