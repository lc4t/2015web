<?php
setcookie('flag','CNSS{what_do_you_think_of_xss}');
$cookie_jar = dirname(__FILE__)."/pic.cookie";
$ch = curl_init();
$data = array('uname' => 'ddmin', 'password' => 'Xsser@lc4t');
curl_setopt($ch, CURLOPT_URL, 'http://pentest.atomsquare.com/xssGuestBook/admin/_login.php');
curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);
curl_setopt($ch, CURLOPT_HEADER,1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://pentest.atomsquare.com/xssGuestBook/admin/_admin.php');

curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);
// curl_setopt($ch, CURLOPT_HEADER,1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
print @curl_exec($ch);




?>