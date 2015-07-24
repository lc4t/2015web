<?php
require_once '../inc/_CnSs_db.php';

$id = 0;
$title = '';
$content = '';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

$conn = mysql_connect( $mysql_host, $mysql_user, $mysql_pass );

//LIMIT clause injection. But not applicable on 5.6.x version
$query = mysql_db_query( $mysql_db, "SELECT title, content FROM sqli1_articles LIMIT 1 OFFSET $id" );

if( $query ) {
    $row = mysql_fetch_assoc( $query );
    $title = $row['title'];
    $content = $row['content'];
} else {
    echo mysql_error();
}

mysql_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <title>论如何精通C++</title>
    <meta charset="utf-8">
</head>
<body>
<h1><?php echo $title; ?></h1>
<p>
    <?php echo $content; ?>
</p>

</body>
</html>
<!-- <?php echo "id=$id"; ?> -->