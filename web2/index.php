<?php
        header("Content-type: text/html; charset=utf-8");
        if ($_SERVER['HTTP_X_FORWARDED_FOR'] == "127.0.0.0" &&
            getenv('HTTP_CLIENT_IP') == "127.0.0.0"
            )
        {

            print "Bingo!<br>";
            echo '<a href="flag.php">flag is here!</a>';
            exit();
        }
        else
        {
            print "只允许本地测试";
        }