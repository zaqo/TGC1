<?php
/* 
	TEMPLATE FOR INPUT FROM FILE 
	INPUT: au/logs/bpcj.csv
	OUTPUT:  bpcj TABLE
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
	$fp = fopen('./au/logs/bpcj.csv', 'r');
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
				$pfm=trim($in__[0]);
				$fin_pos=trim($in__[1]);
				
				//GET PFM ID
				$get_pfm='SELECT id FROM pfm WHERE code LIKE "'.$pfm.'" AND isValid=1';
				$answsql2=mysqli_query($db_server,$get_pfm);
							
				if(!$answsql2) die("INSERT FROM pfm TABLE failed: ".mysqli_error($db_server));
				$row_p = mysqli_fetch_row( $answsql2 );
				if($row_p) $pfm_id=$row_p[0];
				else
				{
					echo 'WARNING: PFM '.$pfm.'NOT FOUND! LINE: '.($counter+1).' <br/>';
					//fputs ($fout,$pfm.";<br/>");
					$flag=0;
				}
				//GET FP ID
				$get_fp='SELECT id FROM fin_pos WHERE code LIKE "'.$fin_pos.'" AND isValid=1';
				$answsql1=mysqli_query($db_server,$get_fp);
							
				if(!$answsql1) die("INSERT FROM fin_pos TABLE failed: ".mysqli_error($db_server));
				$row_p = mysqli_fetch_row( $answsql1 );
				if($row_p) $fp_id=$row_p[0];
				else
				{
					echo 'WARNING: FP '.$fin_pos.'NOT FOUND! LINE: '.($counter+1).' <br/>';
					//fputs ($fout,$pfm.";<br/>");
					$flag=0;
				}
				
				// FIX
				if($flag)
				{
					$transfer_mysql='INSERT INTO bpcj
					(pfm_id,fp_id,isValid) 
					VALUES
					("'.$pfm_id.'","'.$fp_id.'",1)';
				//echo $transfer_mysql.'<br/>';				
					$answsql=mysqli_query($db_server,$transfer_mysql);
							
					if(!$answsql) die("INSERT into fin_pos TABLE failed: ".mysqli_error($db_server));
					else $counter+=1;
				}
			}
		}
		else echo "FILE NOT FOUND!!!";
		echo "FILE COMPLETED! $counter records inserted.";
	
	
	fclose($fp);
?>