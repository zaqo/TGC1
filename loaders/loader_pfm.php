<?php
/* 
	TEMPLATE FOR INPUT FROM FILE 
	INPUT: au/logs/fmfctr.csv
	OUTPUT:  pfm TABLE
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
	$counter=1;	
	$fp = fopen('./au/logs/fmfctr.csv', 'r');
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
				$flag=1;
				$in= fgets($fp);
				$in_=iconv('windows-1251','utf-8',$in);
				$in__=explode(";",$in_);
				$code=$in__[0];
				$s_desc=$in__[1];
				$s_desc=trim($s_desc);
				$s_desc=htmlentities($s_desc, ENT_QUOTES, "UTF-8");
				$desc1=$in__[2];
				$desc1=trim($desc1);
				$desc1=htmlentities($desc1, ENT_QUOTES, "UTF-8");
				
				
				// FIX
					$transfer_mysql='INSERT INTO pfm
					(code,description,short_desc,isValid) 
					VALUES
					("'.$code.'","'.$desc1.'","'.$s_desc.'",1)';
				//echo $transfer_mysql.'<br/>';				
					$answsql=mysqli_query($db_server,$transfer_mysql);
							
					if(!$answsql) die("INSERT into fin_pos TABLE failed: ".mysqli_error($db_server));
					else $counter+=1;
				
			}
		}
		else echo "FILE NOT FOUND!!!";
		echo "FILE COMPLETED! $counter records inserted.";
	
	
	fclose($fp);
?>