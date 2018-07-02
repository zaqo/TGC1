<?php
/* 
	THIS SCRIPT SUPPORTS COST CENTER vs PROFIT CENTER
	REGISTRY 
	INPUT: cost_center TABLE
	OUTPUT:  profit_center TABLE
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
	
	$list_cc='SELECT id,code FROM cost_center
					WHERE 1';

				$answsql=mysqli_query($db_server,$list_cc);
			//$row=mysqli_fetch_row($answsql);
			while($row=mysqli_fetch_row($answsql))
			{
				$flag=1;
				$id= $row[0];
				$code= substr($row[1],0,4);
				$find_pc='SELECT id,code FROM profit_center
					WHERE code LIKE "'.$code.'"';;
				//echo $find_pc.'<br/>';	
				$answsql_in=mysqli_query($db_server,$find_pc);
				
				if($row_f=mysqli_fetch_row($answsql_in))
				{
				// FIX
					$transfer_mysql='INSERT INTO cc_pc
					(cc_id,pc_id,isValid) 
					VALUES
					("'.$id.'","'.$row_f[0].'",1)';
				//echo $transfer_mysql.'<br/>';				
					$answsql_in=mysqli_query($db_server,$transfer_mysql);
							
					if(!$answsql_in) die("INSERT into cc_pc TABLE failed: ".mysqli_error($db_server));
					else $counter+=1;
				}
			}
		
		
		echo "TABLE PROCESSING COMPLETED! $counter records inserted.";
	
?>