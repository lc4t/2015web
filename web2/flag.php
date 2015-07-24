<?php
    if(preg_match_all("/where_i5_flag\.php/i",$_SERVER['HTTP_REFERER']) == 0)
    {
        print "back!";
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