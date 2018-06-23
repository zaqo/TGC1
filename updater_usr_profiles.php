<?php
/* 
	PROGRAM FOR UPDATE FROM FILE 
	INPUT: au/logs/USER_ROLES_def_1C.csv
	OUTPUT:  profiles TABLE
	(c) 2018 TGC-1 project
	flag = 1 - for inserting new records
*/
require_once 'login_tgc1.php';
include ("header.php");
set_time_limit(0);
//Set up mySQL connection
			$db_server = mysqli_connect($db_hostname, $db_username,$db_password);
			$db_server->set_charset("utf8");
			If (!$db_server) die("Can not connect to a database!!".mysqli_connect_error($db_server));
			mysqli_select_db($db_server,$db_database)or die(mysqli_error($db_server));
		
	$fp = fopen('./au/logs/USER_ROLES_def_1C.csv', 'r');
	if($fp)
	{
			$in='';
			$in= fgets($fp);
			//echo $in;
			//$in_=iconv('windows-1251','utf-8',$in);
			$in__=explode(";",$in);
			foreach($in__ as $value)
				echo $value.'<br/>';
			$count_all=0;
			$count_notfound=0;
			while(!feof($fp))
			{
				$flag=0;
				$in= fgets($fp);
				//$in_=iconv('windows-1251','utf-8',$in);
				$in__=explode(";",$in);
				
				$desc=$in__[0];
				$profile_name=trim($in__[1]);
				
				
				$get_that_profile='SELECT id FROM profile WHERE name LIKE "'.$profile_name.'"';
				$answsqlnext=mysqli_query($db_server,$get_that_profile);
				if(!$answsqlnext) die("SELECT FROM profile TABLE failed: ".mysqli_error($db_server));
				$row = mysqli_fetch_assoc($answsqlnext);
				if($row)	$profile_id=$row;
				else 
				{	
					echo 'NO PROFILE RECORD FOUND FOR: '.$profile_name.'<br/>';
					$count_notfound+=1;
					$flag=1;
				}
				
				$transfer_mysql='INSERT INTO profile
					(name,description,isValid) 
					VALUES
					("'.$profile_name.'","'.$desc.'",1)';
				
				if($flag)
				{
					$answsql=mysqli_query($db_server,$transfer_mysql);
							
					if(!$answsql) die("INSERT into TABLE failed: ".mysqli_error($db_server));
				}
				$count_all+=1;
			}
		}
		else echo "FILE NOT FOUND! THIS SCRIPT IS NOT FOR END USERS. TESTING ONLY!!!";
		echo " NOT FOUND: $count_notfound out of TOTAL: $count_all <br/>";
	
	mysqli_close($db_server);
	
	fclose($fp);
?>