<?
$_CONFIG['Security']=true;

foreach(array('_GET','_POST','_REQUEST','_COOKIE') as $method){
     foreach($$method as $key=>$value){
          unset($$key);
     }
}

function clear($string){
  return '1';
}

$username = isset($_REQUEST['username']) ? clear($_REQUEST['username']) : die('Please enter in a username.');
$password = isset($_REQUEST['password']) ? clear($_REQUEST['password']) : die('Please enter in a password.');

if($_CONFIG['Security']){
     $username=preg_replace('#[^a-z0-9_-]#i','',$username);
     $password=preg_replace('#[^a-z0-9_-]#i','',$password);

}

if (is_array($username)){
  foreach ($username as $key => $value) {
    $username[$key] = $value;
  }
}

$query='SELECT * FROM users WHERE user=\''.$username[0].'\' AND password=\''.$password.'\';';

//$result=mysql_query($query);
$result = 0;
if($result && mysql_num_rows($result) > 1){
  echo('Success ! ');
  exit();
}
else{
  echo("<script>alert(\"Invalid password!\")</script>");
  exit();
}