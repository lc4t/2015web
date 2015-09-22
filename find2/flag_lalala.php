<?php
    error_reporting(E_ALL^E_NOTICE^E_WARNING);
    if(preg_match("/where_i5_flag\.php/",$_SERVER['HTTP_REFERER']) == 0)
    {
        print $_SERVER['HTTP_REFERER'];
        print "Where are you from?";
        exit();
    }

    if($_COOKIE["user"] == "admin")
    {
        echo '<a href="flag_is_here.php">flag is here</a>';
    }
    else
    {
        echo 'Only admin can visit';
    }
?>