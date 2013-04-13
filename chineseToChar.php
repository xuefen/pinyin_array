<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
error_reporting(0);
/**
 * 
 * 
 * Copyright (c) 2012 Xuefen Tong
 * @author Xuefen.Tong
 * @date 2012-2-15
 * @version 1.0
 */
function getfirstchar ($s0)
{
    $fchar = ord($s0{0});
    if ($fchar >= ord("A") and $fchar <= ord("z"))
        return strtoupper($s0{0});
    $s1 = iconv("UTF-8", "gb2312", $s0);
    $s2 = iconv("gb2312", "UTF-8", $s1);
    if ($s2 == $s0) {
        $s = $s1;
    } else {
        $s = $s0;
    }
    $asc = 65536 - ord($s{0}) * 256 - ord($s{1});
    $asc_map = array(
			        "A" => array(20319, 20284),
			        "B" => array(20283, 19776),
			        "C" => array(19775, 19219),
			        "D" => array(19218, 18711),
			        "E" => array(18710, 18527),
			        "F" => array(18526, 18240),
			        "G" => array(18239, 17923),
			        "H" => array(1, 1), //other
			        "I" => array(17922, 17418),   
			        "J" => array(17417, 16475),
			        "K" => array(16474, 16213),
			        "L" => array(16212, 15641),
			        "M" => array(15640, 15166),
			        "N" => array(15165, 14923),
			        "O" => array(14922, 14915),
			        "P" => array(14914, 14631),
			        "Q" => array(14630, 14150),   
			        "R" => array(14149, 14091),
			        "S" => array(14090, 13319),
			        "T" => array(13318, 12839),
			        "U" => array(1, 1),//other
			        "V" => array(1, 1),//other
			        "W" => array(12838, 12557),
			        "X" => array(12556, 11848),
			        "Y" => array(11847, 11056),   
			        "Z" => array(11055, 10247),
                );
      
      foreach ($asc_map as $key => $value)
          if ($asc >= $value[0]  && $asc <= $value[1])
            return $key;
      return null;
}
function pinyin1 ($zh)
{
    $ret = "";
    $s1 = iconv("UTF-8", "gb2312", $zh);
    $s2 = iconv("gb2312", "UTF-8", $s1);
    if ($s2 == $zh) {
        $zh = $s1;
    }
    for ($i = 0; $i < strlen($zh); $i ++) {
        $s1 = substr($zh, $i, 1);
        $p = ord($s1);
        if ($p > 160) {
            $s2 = substr($zh, 
            $i ++, 2);
            $ret .= getfirstchar(
            $s2);
        } else {
            $ret .= $s1;
        }
    }
    return $ret;
}
echo "这是中文字符串<br/>";
echo pinyin1('这是中文字符串');