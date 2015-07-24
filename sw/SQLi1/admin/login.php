<!DOCTYPE html>
<html>
<head>
    <title>Admin Control Panel</title>
    <script type="text/javascript" src="../../assets/js/inc.js"></script>
    <script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.js"></script>
    <script src="//cdn.bootcss.com/blueimp-md5/1.1.0/js/md5.js"></script>
    <script type="text/javascript">
        function __login__ (event) {
            event.preventDefault();
            postApi(
                './admin_valid.php',
                {
                    action: 'login',
                    username: $('#username').val(),
                    password: md5($('#password').val())
                },
                function(err, r) {
                    if (err) {
                        alert(err.error);
                    } else {
                        location.assign('./admin_CPanel.php?id=' + r.id);
                    }
                }
            );
        }
    </script>
</head>
<body>
   <form action="" method="post" accept-charset="utf-8">
       Username: <input type="text" id="username" name="username" value="" placeholder="">
       Password: <input type="password" id="password" name="password" value="" placeholder="">
       <input type="hidden" name="action" value="abcd">
       <button type="sumbit" onclick="__login__(event)">Submit!</button>&nbsp;
       <button type="reset">Reset</button>
   </form>
</body>
</html>