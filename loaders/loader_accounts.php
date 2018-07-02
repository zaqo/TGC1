<?php
/* 
	TEMPLATE FOR INPUT FROM FILE 
	INPUT: au/logs/shpz.csv
	OUTPUT:  account TABLE
	(c) 2018 TGC-1 project
*/
require_once 'login_tgc1.php';
include ("header.php");
set_time_limit(0);
//Set up mySQL connection
			$db_server = mysqli_connect($db_hostname, $db_username,$db_password);
			$db_server->set_charset("utf8");
			If (!$db_server) die("Can not connect to a database!!".mysqli_connect_error($db_server));
			mysqli_select_db($db_server,$db_database)or die(mysqli_error($db_server));
		
	$fp = fopen('./au/logs/shpz.csv', 'r');
	if($fp)
	{
			$in='';
			$in= fgets($fp);
			//echo $in;
			//$in_=iconv('windows-1251','utf-8',$in);
			$in__=explode(";",$in);
			//foreach($in__ as $value)
			//	echo $value.'<br/>';
			while(!feof($fp))
			{
				$in= fgets($fp);
				$in_=iconv('windows-1251','utf-8',$in);
				$in__=explode(";",$in_);
				$acc_id=$in__[0];
				$desc=$in__[1];
				$desc=trim($desc, '.');
				//$desc=trim($desc, '\'');
				$desc=htmlentities($desc, ENT_QUOTES, "UTF-8");
				
	
				$transfer_mysql='INSERT INTO account
					(code,description,isValid) 
					VALUES
					("'.$acc_id.'","'.$desc.'",1)';
				//echo $transfer_mysql.'<br/>';				
				$answsql=mysqli_query($db_server,$transfer_mysql);
							
				if(!$answsql) die("INSERT into TABLE failed: ".mysqli_error($db_server));
			}
		}
		else echo "FILE NOT FOUND!!!";
		echo "FILE COMPLETED!";
	
	
	fclose($fp);
?>