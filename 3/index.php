<?php
    require_once '../inc/_Cn55_web3_.php';

$id = 0;
$title = '';
$content = '';
if (isset($_GET['id']))
{
    $id = $_GET['id'];
}

$conn = mysql_connect($mysql_host, $mysql_user, $mysql_psw);

$query = mysql_db_query( $mysql_db, "SELECT title, content FROM sqli1_articles LIMIT 1 OFFSET $id");

if ($query)
{
    $row = mysql_fetch_assoc($query);
    $title = $row['title'];
    $content = $row['content'];
}
else
{
    echo mysql_error();
}
mysql_close($conn);

?>
