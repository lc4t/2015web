<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>prompt(1) to win - 0x0</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Loading Bootstrap -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
  <div class="container">
    <a href="http://prompt.ml" class="logo navbar-brand">prompt(1) to win</a>    <div class="pagination pull-right">
    <div class="container">
    <div class="flat-window-container">
      <div class="flat-window-header">
        <div class="flat-window-button-group flat-window-middle">
          <div class="flat-window-button flat-window-button-close"></div>
          <div class="flat-window-button flat-window-button-minimize"></div>
          <div class="flat-window-button flat-window-button-maximize"></div>
        </div>
        <div class="flat-window-title-bar flat-window-middle text-center">
          <span>Text Viewer</span>
        </div>
      </div>
      <div class="flat-window-body">
        <script id="unsafe-script">
function escape(input) {
    // warm up
    // script should be executed without user interaction
    return '<input type="text" value="' + input + '">';
}        </script>
        <pre class="source-code">
        </pre>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <input id="name" type="text" class="form-control" placeholder="Your name" />
          <span class="input-icon fui-user"></span>
        </div>
        <div class="form-group">
          <textarea id="input" placeholder="Enter input" class="form-control" rows="3"></textarea>
          <span id="input-character-count" class="input-icon">0</span>
        </div>
        <pre title="HTML" id="injected-html">
        </pre>
      </div>
      <div class="col-sm-6">
        <div class="flat-window-container flat-browser">
          <div class="flat-window-header">
            <div class="flat-window-button-group flat-window-middle">
              <div class="flat-window-button flat-window-button-close"></div>
              <div class="flat-window-button flat-window-button-minimize"></div>
              <div class="flat-window-button flat-window-button-maximize"></div>
              <button id="refresh" type="button"><span aria-hidden="true"><i class="fa fa-refresh"></i></span></button>
            </div>
            <div class="flat-window-title-bar flat-window-middle text-right">
              <div class="flat-browser-address-bar flat-window-middle">
                <span>http://sandbox.prompt.ml</span>
                <button id="toggleView" type="button" class="close"><span aria-hidden="true"><i class="fa fa-eye"></i></span></button>
              </div>
            </div>
          </div>
          <div id="sandbox-frame" class="flat-window-body">
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="container text-center">
    <a href="http://prompt.ml/about">About</a>  </div>
  <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="http://prompt.ml/js/script.js"></script>
</body>
</html>