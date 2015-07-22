<?php
header("Content-type: text/html; charset=utf-8");
        print $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
        if ($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"] == "127.0.0.1")
        {
            //301
            header("flag.php");
        }
        else
        {
            print $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];

            print "只允许本地测试";
        }
        print "123";
