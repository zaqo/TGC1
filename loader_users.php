<?php
/* 
	TEMPLATE FOR INPUT FROM FILE 
	INPUT: au/logs/users_<date>.csv
	updated version - filling out org chart, 
	OUTPUT:  user TABLE + org chart tables
	
	(c) 2018 TGC-1 project
	28.07.18
*/
require_once 'login_tgc1.php';
require_once 'tgc1_funcs.php';
include ("header.php");
//Set up mySQL connection
			$db_server = mysqli_connect($db_hostname, $db_username,$db_password);
			$db_server->set_charset("utf8");
			If (!$db_server) die("Can not connect to a database!!".mysqli_connect_error($db_server));
			mysqli_select_db($db_server,$db_database)or die(mysqli_error($db_server));
		
	$fp = fopen('./au/logs/users_210718_S.csv', 'r');
	$csv = array_map('str_getcsv', file('./au/logs/users_210718.csv'));
	
	$first=array_shift($csv);
	//echo $first[0]."<br/>";
	//array_walk($csv, 'process_strings');
	foreach( $csv as $key=>$value)
	{
		//process_strings( $key,$value);
		$value[0]=iconv('windows-1251','utf-8',$value[0]);
		$in_=explode(";",$value[0]);
		$sap_id=$in_[0];
		$fio=explode(" ",$in_[2]);
		$tab=$in_[1];
		$plant=$in_[5];
		$dpt=$in_[7];
		$dpt_name=$in_[8];
		$pos=$in_[9];
		$user_id=getUserBySAPID($db_server,$sap_id);
		if ($user_id)
		{
			//UPDATE USER
			$update_mysql='UPDATE user
					SET tab_num="'.$tab.'", position="'.$pos.'"
					WHERE id='.$user_id;
					
			//echo $update_mysql.'<br/>';					
			$answsqlnext=mysqli_query($db_server,$update_mysql);
							
			if(!$answsqlnext) die("UPDATE of user TABLE failed: ".mysqli_error($db_server));
			
		}
		else
		{
			//CREATE USER
				$transfer_mysql='INSERT INTO user
					(name,surname,father_name,tab_num,position) 
					VALUES
					("'.$fio[1].'","'.$fio[0].'","'.$fio[2].'","'.$tab.'","'.$pos.'")';
								
			$answsqlnext=mysqli_query($db_server,$transfer_mysql);
							
			if(!$answsqlnext) die("INSERT into user TABLE failed: ".mysqli_error($db_server));
			$user_id=mysqli_insert_id($db_server);
			$sap_mysql='INSERT INTO sap
					(user_id,sap_id) 
					VALUES
					("'.$user_id.'","'.$sap_id.'")';
								
			$answsqlnext=mysqli_query($db_server,$sap_mysql);
							
			if(!$answsqlnext) die("INSERT into sap TABLE failed: ".mysqli_error($db_server));
		}
		//UPDATE org_dpts
		//FIND DPT
				$find_dpt='SELECT id FROM org_dpts
							WHERE
							code LIKE "'.$dpt.'"';
								
			$answsqlfind=mysqli_query($db_server,$find_dpt);
							
			if(!$answsqlfind) die("SELECT into org_dpt TABLE failed: ".mysqli_error($db_server));
		
			$row = mysqli_fetch_row( $answsqlfind );
	if (!$row)
	//	echo "DPT EXISTS: ".$row[0]."<br/>";
	//else 
	{	
			// INSERT DPT 
		//1. FIND PLANT ID
		$find_pl='SELECT id FROM org_plants
					WHERE
					code LIKE "'.$plant.'"';
								
			$answsqlfind1=mysqli_query($db_server,$find_pl);
							
			if(!$answsqlfind1) die("SELECT into org_plants TABLE failed: ".mysqli_error($db_server));
		
			$row_pl = mysqli_fetch_row( $answsqlfind1 );
			$plant_id= $row_pl[0];
			if(!$plant_id)
				echo "WARNING: NO PLANT FOR $plant !<br/>";
			else
			{
				$insert_dpt='INSERT INTO org_dpts
					(code,name,plant_id) 
					VALUES
					("'.$dpt.'","'.$dpt_name.'","'.$plant_id.'")';
			//echo $insert_dpt.'<br/>';					
				$answsqldpt=mysqli_query($db_server,$insert_dpt);
							
				if(!$answsqldpt) die("INSERT into org_dpts TABLE failed: ".mysqli_error($db_server));
			}
	}	
		echo "$key. $in_[0] . ".$fio[0] ." $user_id | plant: $plant - $dpt_name <br />\n";
	}	
	
	//var_dump($csv);
	
	
	/*
	
	$in='';
	$in= fgets($fp);
	while(!feof($fp)) {
		$in= fgets($fp);
		$in_=iconv('windows-1251','utf-8',$in);
		$in__=explode(";",$in_);
	
		$fio=explode(" ",$in__[3]);
		///*
		echo $in__[0].'<br/>';
		echo $fio[0].'-'.$fio[1].'-'.$fio[2];
		echo $in__[13].'<br/>';
		// END OF COMMENTS
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
	//fwrite($fp, $txt);
//echo $fp." FILE HANDLE";
	fclose($fp);
	function process_strings( $key,$input)
	{
		$input[0]=iconv('windows-1251','utf-8',$input[0]);
		$in_=explode(";",$input[0]);
	
		$fio=explode(" ",$in_[2]);
		echo "$key. $in_[0] . ".$fio[0] ." <br />\n";
		//$user_id=getUserBySAPID($db_server,$sap_id);
	}
?>