<?php
/* 
	TEMPLATE FOR INPUT FROM FILE 
	INPUT: au/logs/users.csv
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
		
	$fp = fopen('./au/logs/users.csv', 'r');
	$in='';
	$in= fgets($fp);
	while(!feof($fp)) {
		$in= fgets($fp);
		$in_=iconv('windows-1251','utf-8',$in);
		$in__=explode(";",$in_);
	
		$fio=explode(" ",$in__[3]);
		/*
		echo $in__[0].'<br/>';
		echo $fio[0].'-'.$fio[1].'-'.$fio[2];
		echo $in__[13].'<br/>';
		*/
		$transfer_mysql='INSERT INTO user
					(name,surname,father_name,email) 
					VALUES
					("'.$fio[1].'","'.$fio[0].'","'.$fio[2].'","'.$in__[13].'")';
								
		$answsqlnext=mysqli_query($db_server,$transfer_mysql);
							
		if(!$answsqlnext) die("INSERT into TABLE failed: ".mysqli_error($db_server));
		$last_id=mysqli_insert_id($db_server);
		$sap_mysql='INSERT INTO sap
					(user_id,sap_id) 
					VALUES
					("'.$last_id.'","'.$in__[0].'")';
								
	$answsqlnext=mysqli_query($db_server,$sap_mysql);
							
	if(!$answsqlnext) die("INSERT into TABLE failed: ".mysqli_error($db_server));
	
	
	}
	//fwrite($fp, $txt);
//echo $fp." FILE HANDLE";
	fclose($fp);
?>