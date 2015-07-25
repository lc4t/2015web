<?php
session_start();
if (!$_SESSION['admin']) {
	return false;
}

require '../config.php';
require '../mysql.class.php';

$id = $_POST['id'];


$delete_sql = 'delete from guestbook where id=' . $id ;
$connect = mysql_connect(DB_HOST, DB_USER, DB_PWD);
$db = mysql_select_db(DB_NAME, $connect) or die ("error to database");
$query = mysql_query($delete_sql, $connect) or die("sql error");
header('location:admin.php');
//id not empty and is_numeric
//if ((!empty($id) && is_numeric($id))) {
//	$delete_sql = 'UPDATE ' . GB_TABLE_NAME . 'SET status = 1 ' . 'WHERE id = ' . $id;
//	$delete_sql = 'delete from ' . GB_TABLE_NAME . 'where id=' . $id ;
//	$delete_status = mysql_query($delete_sql);
//	print $delete_sql;
//	if ($delete_status) {
//		echo '{"error":0, "msg":"delete success"}';
//	} else {
//		echo '{"error":1, "msg":"delete falure"}';
//	}
//} else {
//	echo '{"error":1, "msg":"id needed!"}';
//}

/**end**/