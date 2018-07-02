<?php
/* 
	TRANSACTIONS DEFINITIONS
	TEMPLATE FOR UPLOAD FROM FILE  
	INPUT: au/logs/trn_def.csv
	OUTPUT:  transactions TABLE
	(c) 2018 TGC-1 project
*/
require_once 'login_tgc1.php';
include ("header.php");
//Set up mySQL connection
			$db_server = mysqli_connect($db_hostname, $db_username,$db_password);
			$db_server->set_charset("utf8");
			If (!$db_server) die("Can not connect to a database!!".mysqli_connect_error($db_server));
			mysqli_select_db($db_server,$db_database)or die(mysqli_error($db_server));
		
	$fp = fopen('./au/logs/trn_def.csv', 'r');
	$in='';
	$areas=array("БНУ"=>2,"УСМТР"=>8,"УМиС"=>5,"УУ"=>6,"ТОиР"=>3,"НСИ"=>2,"NONE"=>17,"Базис"=>5
	,"УФ"=>7,"БД"=>18,"УИ"=>4,"ВД"=>3);
	//echo $areas['БНУ']; 
	$in= fgets($fp);
while(!feof($fp)) 
{
		
		$in= fgets($fp);
		//$in_=iconv('windows-1251','utf-8',$in);
	if(!empty($in))
	{		
		$in__=explode(";",$in);
	/*
		echo $in__[0].' ';
		echo $in__[1].' ';
		echo $in__[2].'<br/>';
	*/
		$code=sanitizeString($in__[0]);
		$descr=sanitizeString($in__[1]);
		$area=trim($in__[2]);
	
	
	// CHECK IF WE HAVE IT ALREADY
		$find_mysql='SELECT id FROM transactions WHERE code="'.$code.'"';
		$answsql=mysqli_query($db_server,$find_mysql);
							
		if(!$answsql) die("INSERT into TABLE failed: ".mysqli_error($db_server));
	
		$res=mysqli_fetch_assoc($answsql);
		if (!$res)
		{
			$area_ins=$areas[$area];
			$transfer_mysql='INSERT INTO transactions
					(code,description,area) 
					VALUES
					("'.$code.'","'.$descr.'","'.$area_ins.'")';
								
			echo " RECORD NOT FOUND FOR ".$code." ОБЛАСТЬ: ".$area_ins."<br/>";
		$answsqlnext=mysqli_query($db_server,$transfer_mysql);
							
		if(!$answsqlnext) die("INSERT into TABLE failed: ".mysqli_error($db_server));
		}
	}
}

	fclose($fp);
?>