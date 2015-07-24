<?php 
    require_once '../../inc/_CnSs_db.php';

    function return_message( $isok, $msg ) {
        if ( $isok ) {
            die(json_encode(array(
                'id' => $msg
            )));
        } else {
            die(json_encode(array(
                'error' => $msg
            )));
        }
    }

    if(isset($_POST['action'])) {

        $conn = mysql_connect( $mysql_host, $mysql_user, $mysql_pass );
        if ( !$conn ) {
            return_message( false, mysql_error() );
        }

        if ( !isset($_POST['username']) || !isset($_POST['password'] ) ) {
            return_message( false, 'Username or password is empty.' );
        }

        $username = mysql_real_escape_string( $_POST['username'] );
        $password = mysql_real_escape_string( $_POST['password'] ); 

        if( strlen( $password ) != 32 ) {
            return_message( false, 'Invalid password encoding format.' );
        }

        mysql_query( 'SET NAMES utf8' );

        $query = mysql_db_query( $mysql_db, "SELECT * FROM sqli1_users WHERE username='$username' AND password='$password'" );

        if ( !$query ) {
            return_message( false, 'Username or password error.' );
        } else {
            $rows = mysql_fetch_assoc( $query );

            if( intval($rows['is_admin']) == 0 ) {
                return_message( false, 'Access Denied.');
            }

            $r = rand();
            $sess = md5( "$username#".$r );

            $f = fopen($sess, 'w');
            fclose($f);
            
            return_message( true, $sess );
        }
    }
 ?>
