<?php
    header("Content-type: text/html; charset=utf-8");
    if(isset($_POST['input']))
    {
        $input = $_POST['input'];
        $input = preg_replace ('/[a-z0-9]*/i', '', $input);
        echo '<html><body><script>' . $input . '</script></body></html>';
    }
?>


<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>TEST</title>
  <script src="js/jquery.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.js"></script>

</head>


<body style="margin:300 auto;width:600px;">
  <form role="form" action = "index.php" method="POST">
    <div class="form-group">
      <label class="sr-only" for="name">Code</label>
      <input type="text" style="width:50%" class="form-control" name="input" placeholder="Your code">
    </div>
  <button type="submit" class="btn btn-info">TEST</button>
</body>