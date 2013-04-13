<?php $start=microtime(true);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php 
  include("pingTmp/pinyin_array.php");
function getPing($word)
{
	static $pings = null;
	if($pings===null)
	{
		$pings = include("pingTmp/pinyin_array.php");
	}
	return $pings[$word];
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
?>
<div><?php if($_GET['w']!=""){?><?=$_GET['w']?>（<?php echo getPings($_GET['w']);?>）<?php }?></div>
<form action="index_slow.php">
<textarea rows="5" cols="40" name="w"><?=$_GET['w']?></textarea>
<input type="submit" value="查询">
</form>
</body>
</html>
<?php $end=microtime(true);echo $end-$start;?>