<?php
/**
*
*/
class DB {
	static $_connect = null;

	static function connect() {
		if (!self::$_connect) {
			$conn = mysql_connect(DB_HOST, DB_USER, DB_PWD);
			if ($conn) {
				mysql_select_db(DB_NAME, $conn);
				mysql_query("set names 'utf8'");	
				self::$_connect = $conn;
			} else {
				exit('database error');
			}
		}

		return self::$_connect;
	}

	static function cleanSql($sql) {
		return mysql_real_escape_string($sql);
		return $sql;
	}

	static function close() {
		if (self::$_connect) {
			mysql_close(self::$_connect);
		}
	}
}