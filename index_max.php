<?php $start=microtime(true);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php 
  include("getPing.php");
?>
<div><?php if($_GET['w']!=""){?><?=$_GET['w']?>（<?php echo getPings($_GET['w']);?>）<?php }?></div>
<form action="index_max.php">
<textarea rows="5" cols="40" name="w"><?=$_GET['w']?></textarea>
<input type="submit" value="查询">
</form>
</body>
</html>
<?php $end=microtime(true);echo $end-$start;?>