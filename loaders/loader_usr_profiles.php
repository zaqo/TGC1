<?php
/* 
	TEMPLATE FOR INPUT FROM FILE 
	INPUT: au/logs/USER_ROLES.csv
	OUTPUT:  profile_reg TABLE
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
		
	$fp = fopen('./au/logs/USER_ROLES.csv', 'r');
	if($fp)
	{
			$in='';
			$in= fgets($fp);
			//echo $in;
			//$in_=iconv('windows-1251','utf-8',$in);
			$in__=explode(";",$in);
			//foreach($in__ as $value)
			//	echo $value.'<br/>';
			$user_id=0;
			$profile_id=0;
			while(!feof($fp))
			{
				$flag=1;
				$in= fgets($fp);
				//$in_=iconv('windows-1251','utf-8',$in);
				$in__=explode(";",$in);
				
				$profile=$in__[0];
				$usr=$in__[1];
				$time_st=$in__[2]." ".trim($in__[3]);
				
			//echo $time_st.'<br/>';
				$get_that_user='SELECT user_id FROM sap WHERE sap_id LIKE "'.$usr.'"';
				$answsqlnext=mysqli_query($db_server,$get_that_user);
				if(!$answsqlnext) die("SELECT FROM user TABLE failed: ".mysqli_error($db_server));
				$row = mysqli_fetch_row($answsqlnext);
				if($row)	$user_id=$row[0];
				else 
				{	
					echo 'NO USER RECORD FOUND FOR: '.$usr.'<br/>';
					$flag=0;
				}
				$get_that_prof='SELECT id FROM profile WHERE name LIKE "'.$profile.'"';
				$answsqlnext=mysqli_query($db_server,$get_that_prof);
				if(!$answsqlnext) die("SELECT FROM profile_reg TABLE failed: ".mysqli_error($db_server));
				$row = mysqli_fetch_row($answsqlnext);
				if($row)	$profile_id=$row[0];
				else
				{	
					echo 'NO PROFILE RECORD FOUND FOR'.$profile.' <br/>';
					$flag=0;
				}
				//var_dump($time_st);
				$dtime = DateTime::createFromFormat("d.m.Y H:i:s",$time_st);
				//var_dump($dtime);
				$timestamp = $dtime->getTimestamp();
				$transfer_mysql='INSERT INTO profile_reg
					(user_id,profile_id,reg_date,isValid) 
					VALUES
					("'.$user_id.'","'.$profile_id.'",FROM_UNIXTIME('.$timestamp.'),1)';
				if($flag)
				{
					$answsql=mysqli_query($db_server,$transfer_mysql);
							
					if(!$answsql) die("INSERT into TABLE failed: ".mysqli_error($db_server));
				}
			}
		}
		else echo "NOT FOR END USERS. TESTING ONLY!!!";
	
	mysqli_close($db_server);
	
	fclose($fp);
?>