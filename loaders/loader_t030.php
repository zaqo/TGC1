<?php
/* 
	TEMPLATE FOR INPUT FROM FILE 
	INPUT: au/logs/t030.csv
	OUTPUT:  t030 TABLE
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
	$fp = fopen('./au/logs/t030.csv', 'r');
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
				$mc=$in__[0];
				$val_cl=$in__[1];
				
				$cost_type1=$in__[2];
				$cost_type1=trim($cost_type1);
				$cost_type2=$in__[3];
				$cost_type2=trim($cost_type2);
				
				//GET cost 1 ID
				$get_cost='SELECT id FROM cost WHERE code LIKE "'.$cost_type1.'" AND isValid=1';
				$answsql=mysqli_query($db_server,$get_cost);
							
				if(!$answsql) die("SELECT FROM cost TABLE failed: ".mysqli_error($db_server));
				$row = mysqli_fetch_row( $answsql );
				if($row) $cost1_id=$row[0];
				else
				{
					echo 'WARNING: COST '.$cost_type1.' NOT FOUND! <br/>';
					$flag=0;
				}
				//GET cost 2 ID
				$get_cost='SELECT id FROM cost WHERE code LIKE "'.$cost_type2.'" AND isValid=1';
				//echo $get_cost."<br/>";
				$answsql=mysqli_query($db_server,$get_cost);
							
				if(!$answsql) die("SELECT FROM cost TABLE failed: ".mysqli_error($db_server));
				$row_c = mysqli_fetch_row( $answsql );
				if($row_c) $cost2_id=$row_c[0];
				else
				{
					echo 'WARNING: COST '.$cost_type2.' NOT FOUND! <br/>';
					$flag=0;
				}
				// NOW FIX IT!
				if($flag)
				{
					$transfer_mysql='INSERT INTO t030
					(mc,valuation_class,cost_type1,cost_type2,isValid) 
					VALUES
					("'.$mc.'","'.$val_cl.'","'.$cost1_id.'","'.$cost2_id.'",1)';
				//echo $transfer_mysql.'<br/>';				
					$answsql=mysqli_query($db_server,$transfer_mysql);
							
					if(!$answsql) die("INSERT into t030 TABLE failed: ".mysqli_error($db_server));
					else $counter+=1;
				}
			}
		}
		else echo "FILE NOT FOUND!!!";
		echo "FILE COMPLETED! $counter records inserted.";
	
	
	fclose($fp);
?>