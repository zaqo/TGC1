<?php
/* 
	TEMPLATE FOR INPUT FROM FILE 
	INPUT: au/logs/activity.csv
	OUTPUT:  activity_reg TABLE
	(c) 2018 TGC-1 project
*/
require_once 'login_tgc1.php';
include ("header.php");
//Set up mySQL connection
			$db_server = mysqli_connect($db_hostname, $db_username,$db_password);
			$db_server->set_charset("utf8");
			If (!$db_server) die("Can not connect to a database!!".mysqli_connect_error($db_server));
			mysqli_select_db($db_server,$db_database)or die(mysqli_error($db_server));
		
	$fp = fopen('./au/logs/activity.csv', 'r');
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
				$time_st=$in__[1]." ".$in__[3];
			
				$usr_sap=$in__[4];
				$terminal=$in__[5];
				$trn=$in__[6];
				$prog=$in__[7];
				$about=$in__[8];
			//echo $time_st.'<br/>';
				$get_that_user='SELECT user_id FROM sap WHERE sap_id="'.$usr_sap.'"';
				$answsqlnext=mysqli_query($db_server,$get_that_user);
				if(!$answsqlnext) die("SELECT FROM user TABLE failed: ".mysqli_error($db_server));
				$row = mysqli_fetch_row($answsqlnext);
				if($row)	$user=$row[0];
					else echo 'NO USER RECORD FOUND <br/>';
	
				$get_that_trn='SELECT id FROM transactions WHERE code="'.$trn.'"';
				$answsqlnext=mysqli_query($db_server,$get_that_trn);
				if(!$answsqlnext) die("SELECT FROM user TABLE failed: ".mysqli_error($db_server));
				$row = mysqli_fetch_row($answsqlnext);
				if($row)	$trn=$row[0];
				else
				{	
					echo 'NO TRANSACTION RECORD FOUND <br/>';
					$insert_mysql='INSERT INTO transactions
					(code,area) 
					VALUES
					("'.$trn.'","99")'; //NEW TRANSACTION UNKNOWN
								
					$answsqlnext=mysqli_query($db_server,$insert_mysql);
							
					if(!$answsqlnext) die("INSERT into TRANSACTIONS TABLE failed: ".mysqli_error($db_server));
					$trn=mysqli_insert_id($db_server);
				}
				$dtime = DateTime::createFromFormat("d.m.Y H:i:s", $time_st);
				$timestamp = $dtime->getTimestamp();
				$transfer_mysql='INSERT INTO activity_reg
					(user_id,trn_id,date,prog,message,terminal) 
					VALUES
					("'.$user.'","'.$trn.'",FROM_UNIXTIME('.$timestamp.'),"'.$prog.'","'.$about.'","'.$terminal.'")';
								
				$answsql=mysqli_query($db_server,$transfer_mysql);
							
				if(!$answsql) die("INSERT into TABLE failed: ".mysqli_error($db_server));
			}
		}
		else echo "NOT FOR END USERS. TESTING ONLY!!!";
	//var_dump($timestamp);
	/*
	while(!feof($fp)) {
		$in= fgets($fp);
		$in_=iconv('windows-1251','utf-8',$in);
		$in__=explode(";",$in_);
	
		$fio=explode(" ",$in__[3]);
		
		echo $in__[0].'<br/>';
		echo $fio[0].'-'.$fio[1].'-'.$fio[2];
		echo $in__[13].'<br/>';
		
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
	
	
	}*/
	
	fclose($fp);
?>