<?php
    header("Content-type: text/html; charset=utf-8");
    if(@isset($_POST['input']))
    {
        $input = $_POST['input'];
        if (stripos($input, 'http://') === 0)
        {
          $curlobj = curl_init($input);
          curl_setopt($curlobj, CURLOPT_HEADER, 0);
          curl_setopt($curlobj, CURLOPT_PROTOCOLS, CURLPROTO_HTTP);
          curl_setopt($curlobj, CURLOPT_CONNECTTIMEOUT, 10);
          curl_setopt($curlobj, CURLOPT_TIMEOUT, 5);
          $html = curl_exec($curlobj);
          curl_close($curlobj);
        }
        else if ($input === 'file:///etc/hosts')
        {
          $html = "127.0.0.1   localhost localhost.localdomain localhost4 localhost4.localdomain4
::1         localhost localhost.localdomain localhost6 localhost6.localdomain6
127.0.0.1   570d99e4c85914470d914170d1e95144.atomsquare.com
";
        }
        else if (stripos($input, 'file://') === 0)
        {
          $html = 'No permission, only one file has permission to load.';
        }
        @print $html;
    }
    else
    {
      @print<<<HTML
      <html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Where CMS is?</title>
  <script src="js/jquery.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.js"></script>

  </head>


  <body style="margin:300 auto;width:600px;">
    <form role="form" action = "index.php" method="POST">
      <div class="form-group">
        <label class="sr-only" for="name">to where?</label>
        <input type="text" style="width:50%" class="form-control" name="input" placeholder="To where?">
      </div>
    <button type="submit" class="btn btn-info">there</button>
  </body>
HTML;
    }
?>


                                                                                                                                            55,0-1        Bot
