<html>
    <head>
        <title>I need password</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
    </head>
    <body bgcolor="#FFFFFF" text="#000000">
        <form method="POST" action="4.php">
            Input password: <input type = text name=password><br>
                            <input type = submit name = btn value=Send>
        </form>
    </body>
</html>

<?php

$value = "0xd131dd02c5e6eec4693d9a0698aff95c2fcab50712467eab4004583eb8fb7f8955ad340609f4b30283e4888325f1415a085125e8f7cdc99fd91dbd7280373c5bd8823e3156348f5bae6dacd436c919c6dd53e23487da03fd02396306d248cda0e99f33420f577ee8ce54b67080280d1ec69821bcb6a8839396f965ab6ff72a70";
setcookie("password",$value);
header('Hint: MD5');