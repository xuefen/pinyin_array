<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
error_reporting(0);
set_time_limit(0);

$pinyin = include("pingTmp/pinyin_array.php");
$ping_ = array();
foreach ($pinyin as $key => $value) 
{
	$order = ord($key{2})*256*256+ord($key{1})*256+ord($key{0});
	$ping_[$order] = $value;
}
ksort($ping_);

//file_put_contents("pinyinOrd.php",preg_replace("/\s+/","",var_export($ping_,true)));

$pinyin = $ping_;

$ping = array();
foreach($pinyin as $key=>$value)
{
  $current_name = substr($key."",0,-5);
  if($current_name!=$last_name)
  {
	 if(!empty($ping))
	 {
	   @file_put_contents("pings/$last_name.php","<?php\n return ".var_export($ping,true).";");
	 }
     $ping = array();
  }
  $ping[$key] = $value;
  $last_name = $current_name;
}

@file_put_contents("pings/$last_name.php","<?php\n return ".var_export($ping,true).";");

echo "&nbsp;end &nbsp;";
