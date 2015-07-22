<?php
    if(preg_match_all("/index\.php/i",$_SERVER['HTTP_REFERER']) == 0)
    {
        print "back!";
        exit();
    }

    if($_COOKIE["user"] == "admin")
    {
        echo '<a href="flag_is_here.php">flag is here</a>';
    }