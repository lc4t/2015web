<?php
    error_reporting(E_ALL^E_NOTICE^E_WARNING);
    header("Content-type: text/html; charset=utf-8");
    if (preg_match("/127\.0\.0\.1/i", $_SERVER['HTTP_X_FORWARDED_FOR']))
    {

        print "Bingo!<br \>";
        echo '<a href="flag_lalala.php">flag is here!</a>';
        exit();
    }
    else
    {
        print "Only allow local access :)";
    }
?>