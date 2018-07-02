<?php
/* 
	TEMPLATE FOR INPUT FROM FILE 
	INPUT: au/logs/budget.csv
	OUTPUT:  budget_matrix TABLE
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
	$fp = fopen('./au/logs/budget.csv', 'r');
	$fout = fopen('./au/logs/pfm_missing_bm.csv', 'w');
	if($fp)
	{
			$in='';
			$in= fgets($fp);
			
			$in__=explode(" ",$in);
			while(!feof($fp))
			{
				$flag=1;
				$in= fgets($fp);
				
				$in__=explode("\t",$in);
				$cost=$in__[0];
				$cc=$in__[1];
				$pfm=$in__[2];
				$cost=trim($cost);
				$pfm=trim($pfm);
				$cc=trim($cc);
				
				
				//GET account ID
				$get_acc='SELECT id FROM cost WHERE code LIKE "'.$cost.'" AND isValid=1';
				$answsql=mysqli_query($db_server,$get_acc);
							
				if(!$answsql) die("SELECT FROM cost TABLE failed: ".mysqli_error($db_server));
				$row = mysqli_fetch_row( $answsql );
				if($row) $cost_id=$row[0];
				else
				{
					echo 'WARNING: COST TYPE '.$cost.'NOT FOUND! LINE: '.($counter+1).' <br/>';
					fputs ($fout, $cost.";");
					$flag=0;
				}
				//GET Cost CENTER ID
				$get_cc='SELECT id FROM cost_center WHERE code LIKE "'.$cc.'" AND isValid=1';
				$answsql1=mysqli_query($db_server,$get_cc);
							
				if(!$answsql1) die("INSERT FROM cost TABLE failed: ".mysqli_error($db_server));
				$row_c = mysqli_fetch_row( $answsql1 );
				if($row_c) $cc_id=$row_c[0];
				else
				{
					echo 'WARNING: COST CENTER '.$cc.'NOT FOUND! LINE: '.($counter+1).' <br/>';
					fputs ($fout, $cc.";<br/>");
					
					$flag=0;
				}
				//GET PFM ID
				$get_pfm='SELECT id FROM pfm WHERE code LIKE "'.$pfm.'" AND isValid=1';
				$answsql2=mysqli_query($db_server,$get_pfm);
							
				if(!$answsql2) die("INSERT FROM pfm TABLE failed: ".mysqli_error($db_server));
				$row_p = mysqli_fetch_row( $answsql2 );
				if($row_p) $pfm_id=$row_p[0];
				else
				{
					echo 'WARNING: PFM '.$pfm.'NOT FOUND! LINE: '.($counter+1).' <br/>';
					fputs ($fout,$pfm.";<br/>");
					$flag=0;
				}
				// NOW FIX IT!
				if($flag)
				{
					$transfer_mysql='INSERT INTO budget_matrix
					(cc_id,cost_id,pfm_id,isValid) 
					VALUES
					("'.$cc_id.'","'.$cost_id.'","'.$pfm_id.'",1)';
				//echo $transfer_mysql.'<br/>';				
					$answsql3=mysqli_query($db_server,$transfer_mysql);
							
					if(!$answsql3) die("INSERT into budget_matrix TABLE failed: ".mysqli_error($db_server));
					else $counter+=1;
				}
				
			}
		}
		else echo "FILE NOT FOUND!!!";
		echo "FILE COMPLETED! $counter records inserted.";
	
	
	fclose($fp);fclose($fout);
?>