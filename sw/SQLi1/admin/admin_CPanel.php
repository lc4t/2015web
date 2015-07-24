<!DOCTYPE html>
<html>
<head>
    <title>Admin Control Panel</title>
    <meta charset="utf-8">
</head>
<body>

<?php
    $sess = $_GET['id'];
    if ( !file_exists( $sess ) ) {
        die( '我从未见过有如此厚颜无耻之人！' );
    }

    if ( strcmp( $_SERVER['REMOTE_ADDR'], '127.0.0.1' ) != 0 ) {
        echo '<p>Your remote address is not trusted.<br />';
        echo 'As a consequence, cellphone validation is required.</p>';
        echo '<hr />';
        echo '<p>Now a 10-dight validation code has been sent to your cell phone in the form of SMS.</p>';
        echo '<p>Please enter the vcode in the following textbox:</p>';
    } else {
        die('Flag: CNSS{Php_Is_TH3_B35T_L4nGU4G3_IN_The_W0LrD}');
    }

    if ( strcmp( $_GET['vcode'], '@#dsaVDS_G' ) == 0 ) {
        die('Flag: CNSS{Php_Is_TH3_B35T_L4nGU4G3_IN_The_W0LrD}');
    }
 ?>

 <form action="" method="get" accept-charset="utf-8">
     <input type="text" name="vcode" value="" placeholder="">
     <input type="hidden" name="id" value="<?php echo $sess ?>">
     <button type="submit">Submit</button>
 </form>

</body>
</html>

