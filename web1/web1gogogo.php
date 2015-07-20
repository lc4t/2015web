<?php
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($password == "" )
    {
        if ($username == "admin" || $username == "root" || $username == "system")
        {
            print "Yep, but I can't trust you...<br>";
        }
        else
        {
            print "Hey,don't hack me!<br>";
        }
    }

    else if ($username == "root" && $password == "toor")
    {
        print "Enn, you guess is right<br>";
        print "but there is no egg use";
        print "<br><br><br><br><br><br><br><br><br><br><br><br>";
        print "<br><br><br><br><br><br><br><br><br><br><br><br>";
        print "<br><br><br><br><br><br><br><br><br><br><br><br>";
        print "<br><br><br><br><br><br><br><br><br><br><br><br>";
        print "<br><br><br><br><br><br><br><br><br><br><br><br>";
        print "<br><br><br><br><br><br><br><br><br><br><br><br>";
        print "<br><br><br><br><br><br><br><br><br><br><br><br>";
        print "<br><br><br><br><br><br><br><br><br><br><br><br>";
        print "<br><br><br><br><br><br><br><br><br><br><br><br>";
        print "<br><br><br><br><br><br><br><br><br><br><br><br>";
        print "<br><br><br><br><br><br><br><br><br><br><br><br>";
        print "<br><br><br><br><br><br><br><br><br><br><br><br>";
        print "CNSS{Sooooo_easy}";
        print "<!-- 434E53537B49745F69735F456173797D -->";//CNSS{It_is_Easy}
    }

    else
    {
        print "Enn, you guess is not right<br>";
    }