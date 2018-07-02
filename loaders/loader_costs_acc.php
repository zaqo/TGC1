<?php
/* 
	TEMPLATE FOR INPUT FROM FILE 
	INPUT: au/logs/cska.csv
	OUTPUT:  cost TABLE
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
		
	$fp = fopen('./au/logs/costs_by_acc.csv', 'r');
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
				//$in_=iconv('windows-1251','utf-8',$in);
				$in__=explode(";",$in);
				$account=$in__[0];
				$cost_type=$in__[1];
				$cost_type=trim($cost_type);
				
				//GET ACCOUNT ID
				$get_account='SELECT id FROM account WHERE code="'.$account.'" AND isValid=1';
				$answsql=mysqli_query($db_server,$get_account);
							
				if(!$answsql) die("SELECT FROM account TABLE failed: ".mysqli_error($db_server));
				$row = mysqli_fetch_row( $answsql );
				if($row) $acc_id=$row[0];
				else
				{
					echo 'WARNING: ACCOUNT '.$account.'NOT FOUND! <br/>';
					$flag=0;
				}
				//GET cost ID
				$get_cost='SELECT id FROM cost WHERE code="'.$cost_type.'" AND isValid=1';
				$answsql=mysqli_query($db_server,$get_cost);
							
				if(!$answsql) die("INSERT FROM cost TABLE failed: ".mysqli_error($db_server));
				$row_c = mysqli_fetch_row( $answsql );
				if($row_c) $cost_id=$row_c[0];
				else
				{
					echo 'WARNING: COST '.$cost_type.'NOT FOUND! <br/>';
					$flag=0;
				}
				// NOW FIX IT!
				if($flag)
				{
					$transfer_mysql='INSERT INTO costs_by_acc
					(account_id,cost_id,isValid) 
					VALUES
					("'.$acc_id.'","'.$cost_id.'",1)';
				//echo $transfer_mysql.'<br/>';				
					$answsql=mysqli_query($db_server,$transfer_mysql);
							
					if(!$answsql) die("INSERT into  costs_by_acc TABLE failed: ".mysqli_error($db_server));
				}
			}
		}
		else echo "FILE NOT FOUND!!!";
		echo "FILE COMPLETED!";
	
	
	fclose($fp);
?>