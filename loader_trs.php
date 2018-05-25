<?php
/* 
	TEMPLATE FOR INPUT FROM FILE 
	INPUT: au/logs/trs.csv
	OUTPUT:  user TABLE
	(c) 2018 TGC-1 project
*/
require_once 'login_tgc1.php';
include ("header.php");
//Set up mySQL connection
			$db_server = mysqli_connect($db_hostname, $db_username,$db_password);
			$db_server->set_charset("utf8");
			If (!$db_server) die("Can not connect to a database!!".mysqli_connect_error($db_server));
			mysqli_select_db($db_server,$db_database)or die(mysqli_error($db_server));
		
	$fp = fopen('./au/logs/trs.csv', 'r');
	$in='';
	$in= fgets($fp);
	while(!feof($fp)) {
		
		$in= fgets($fp);
		$in_=iconv('windows-1251','utf-8',$in);
		$in__=explode(";",$in_);
	
		echo $in__[0].' ';
		echo $in__[1].' ';
		echo $in__[2].'<br/>';
	
	$transfer_mysql='INSERT INTO transactions
					(code,description,area) 
					VALUES
					("'.$in__[0].'","'.$in__[1].'","'.$in__[2].'")';
								
	$answsqlnext=mysqli_query($db_server,$transfer_mysql);
							
	if(!$answsqlnext) die("INSERT into TABLE failed: ".mysqli_error($db_server));
	
	}

	fclose($fp);
?>