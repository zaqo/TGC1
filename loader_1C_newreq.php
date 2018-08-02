<?php
/* 
	TEMPLATE FOR INPUT FROM FILE 
	INPUT: au/logs/USER_ROLES_1C.csv  
	OUTPUT:  profile_reg TABLE
	(c) 2018 TGC-1 project
	flag = 1 to eable insert
*/
require_once 'login_tgc1.php';
include ("header.php");
set_time_limit(0);
//Set up mySQL connection
			$db_server = mysqli_connect($db_hostname, $db_username,$db_password);
			$db_server->set_charset("utf8");
			If (!$db_server) die("Can not connect to a database!!".mysqli_connect_error($db_server));
			mysqli_select_db($db_server,$db_database)or die(mysqli_error($db_server));
		
	$fp = fopen('./au/logs/USER_ROLES_REQ_0108.csv', 'r');
	if($fp)
	{
			$in='';
			//$in= fgets($fp);
			//echo $in;
			//$in_=iconv('windows-1251','utf-8',$in);
			//$in__=explode(";",$in);
			//foreach($in__ as $value)
			//	echo $value.'<br/>';
			$flag=1;
			$name='';
			$fname='';
			$surname='';
			while(!feof($fp))
			{
				$in= fgets($fp);
				//$in_=iconv('windows-1251','utf-8',$in);
				$in__=explode(";",$in);
				//echo $in.'<br/>'.$in__[0];
				$sap_id=trim($in__[0]);
				//$email=trim($in__[1]);
				$role_id=trim($in__[1]);
				
				$check_prof='SELECT id FROM profile WHERE name LIKE "'.$role_id.'"';
				$answsql=mysqli_query($db_server,$check_prof);
				$res=mysqli_fetch_row($answsql);
				$check_user='SELECT user_id FROM sap WHERE sap_id LIKE "'.$sap_id.'"';
				$answsql_e=mysqli_query($db_server,$check_user);
				$res_e=mysqli_fetch_row($answsql_e);
				if ((!$res)||(!$res_e))
				{
					if (!$res) echo "WARNING: $role_id  not found!";
					if (!$res_e) 
					{	
						echo "WARNING: $sap_id not found!";
						// NEW USER CREATE 
						/*
						$in__=explode(" ",$fio);
						$surname=$in__[0];
						$name=$in__[1];
						if(isset($in__[2])) $fname=$in__[2];
						$user_mysql='INSERT INTO user
										(name,surname,father_name,email) 
										VALUES
										("'.$name.'","'.$surname.'","'.$fname.'","'.$email.'")';
						//echo $user_mysql.'<br/>';				
						if ($flag) $answsql=mysqli_query($db_server,$user_mysql);
						if(!$answsql) die("INSERT into user TABLE failed: ".mysqli_error($db_server));
						*/
					}
				}
				else
				{
					$transfer_mysql='INSERT INTO profile_reg
					(user_id,profile_id,status) 
					VALUES
					('.$res_e[0].','.$res[0].',2)';
					//echo $transfer_mysql.'<br/>';				
					if ($flag) $answsql=mysqli_query($db_server,$transfer_mysql);
							
				if(!$answsql) die("INSERT into TABLE failed: ".mysqli_error($db_server));
				}
			}
		}
		else echo "FILE NOT FOUND!!!";
		echo "FILE COMPLETED!";
	mysqli_close($db_server);
	
	fclose($fp);
?>