<?php
/* 
	TEMPLATE FOR INPUT FROM FILE 
	INPUT: au/logs/fp_by_material.csv
	OUTPUT:  fin_pos TABLE
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
	$counter=0;	
	$fp = fopen('./au/logs/fp_by_material.csv', 'r');
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
				$cost_type=$in__[0];
				$fin_pos=$in__[1];
				
				$cost_type=trim($cost_type);
				//$s_desc=htmlentities($s_desc, ENT_QUOTES, "UTF-8");
				
				$fin_pos=trim($fin_pos);
				
				//GET FP ID
				$get_fp='SELECT id FROM fin_pos WHERE code="'.$fin_pos.'" AND isValid=1';
				$answsql=mysqli_query($db_server,$get_fp);
							
				if(!$answsql) die("SELECT FROM account TABLE failed: ".mysqli_error($db_server));
				$row = mysqli_fetch_row( $answsql );
				if($row) $fp_id=$row[0];
				else
				{
					echo 'WARNING: FP '.$fin_pos.'NOT FOUND! <br/>';
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
					$transfer_mysql='INSERT INTO mm_fp_material
					(fp_id,cost_id,isValid) 
					VALUES
					("'.$fp_id.'","'.$cost_id.'",1)';
				//echo $transfer_mysql.'<br/>';				
					$answsql=mysqli_query($db_server,$transfer_mysql);
							
					if(!$answsql) die("INSERT into  costs_by_acc TABLE failed: ".mysqli_error($db_server));
					else $counter+=1;
				}
				
			}
		}
		else echo "FILE NOT FOUND!!!";
		echo "FILE COMPLETED! $counter records inserted.";
	
	
	fclose($fp);
?>