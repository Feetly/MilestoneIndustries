<!DOCTYPE html>
<head><title>Dhruv Jain MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash of a four digit PIN and check all 10,0000 possible four digit PINs to determine the PIN.</p>
<?php
function getNo($i){
	if(strlen((string)$i)==1)	return "000".(string)$i;
	else if(strlen((string)$i)==2)	return "00".(string)$i;
	else if(strlen((string)$i)==3)	return "0".(string)$i;
	else	return "".(string)$i;
}
if(isset($_GET['md5'])){
	echo "<pre>\n";
	echo "Debug Output:\n";
    $md5=$_GET['md5'];
	$time_pre=microtime(true);
    for($i=0;$i<=10000;$i++){
		$tmp=getNo($i);
		$check=hash('md5', $tmp);
		if($i<15)	print "$check $tmp\n";
		if($check==$md5)	break;
    }
	if($tmp==(string)10000)	$tmp="Not Found"; 
    $time_post=microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
	echo "\n</pre>\n";
	echo "<p>Original PIN: $tmp</p>\n";
	echo "<p>MD5 used: $md5</p>\n";
}
?>
<form>
<input type="text" name="md5" size="60" required/>
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="index.php">Reset Cracker</a></li>
</ul>
</body>
</html>