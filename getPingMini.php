<?php

 /**
  * Copyright (c) 2012 Xuefen Tong
  * @author Xuefen.Tong
  * @date 2012-2-15
  * @version 1.0
  */
function getPing($word)
{
	static $ping_arr = array();
    $order = getOrd($word);
    $type = substr($order."",0,-4);
    if(!isset($ping_arr[$type]) && is_file("pings_mini/$type.php"))
    {
       $ping_arr[$type] = include_once("pings_mini/$type.php");
    }
    return $ping_arr[$type][$order];
}
function getOrd($word)
{
  return ord($word{2})*256*256+ord($word{1})*256+ord($word{0});
}
function getPings($word)
{
	$pings = "";
	while ($word!="") 
    {
    	$w = mb_substr($word,0,1,"UTF-8");
    	$word = mb_substr($word,1,strlen($word)-1,"UTF-8");
    	$p = getPing($w);
    	$pings .= ($p==""?$w:"&nbsp;".$p."&nbsp;");
    }
    return $pings;
}