﻿<?php require_once 'login_tgc1.php';
/*
	PURPOSE: OUTPUT of transaction data for users
	per USER per day
	date: 26/05/18
*/
include ("header.php"); 
	
		
		$content="";
		//Set up mySQL connection
			$db_server = mysqli_connect($db_hostname, $db_username,$db_password);
			$db_server->set_charset("utf8");
			If (!$db_server) die("Can not connect to a database!!".mysqli_connect_error($db_server));
			mysqli_select_db($db_server,$db_database)or die(mysqli_error($db_server));
		
			$check_in_mysql="SELECT user.name,user.father_name,user.surname,transactions.code,activity_reg.date,
									activity_reg.message,func_area.description,user.id,transactions.description
							FROM activity_reg
							LEFT JOIN user ON activity_reg.user_id=user.id
							LEFT JOIN transactions ON activity_reg.trn_id=transactions.id
							LEFT JOIN func_area ON transactions.area=func_area.id
							ORDER BY activity_reg.date,user.surname
							LIMIT 300  ";
					
					$answsqlcheck=mysqli_query($db_server,$check_in_mysql);
					if(!$answsqlcheck) die("LOOKUP into services TABLE failed: ".mysqli_error($db_server));
		$rows='';
		$counter=1;
		$rec_prev=0;
		$isFirst=1;
		$user_block='';
		$day_block='';
		$user_block_head='';
		$last_id=0;// Index to control switch to nex user_id
		while( $row = mysqli_fetch_row( $answsqlcheck ))  
		{ 
				
				$name=$row[2].' ';
				$name.=$row[0].' ';
				$name.=$row[1];
				$sap_code=$row[3];
				$trn_date=$row[4];
				//TIME CALCULATION BLOC
				$format = 'Y-m-d H:i:s';
				$trn_date_o = DateTime::createFromFormat($format,$trn_date);
				//echo "Формат: $format; " . $trn_date_o->format('d-m-Y H:i:s') . "\n";
				//$trn_time=substr($trn_date,-8);
				//$trn_date_cl=substr($trn_date,0,10);
				$trn_time=$trn_date_o->format('H:i:s');
				$trn_date_cl=$trn_date_o->format('d-m-y');
				$msg=$row[5];
				$area=$row[6];
				$user_id=$row[7];
				$tr_desc=$row[8];
				$user_block_head='<tr><td colspan="6"><b>'.$name.' : '.$trn_date_cl.'</b>';
				if(!$last_id) // VERY FIRST ITERATION
				{
					$start=DateTime::createFromFormat($format,$trn_date);
					$day_block.=$user_block_head;
				}
				elseif($user_id!=$last_id)
				{
					
						$interval = $start->diff($last_date);
						$total_time=$interval->format('%H : %I :%S');
						$day_block.=' Total time: '.$total_time.'</td></tr>';
	
					$day_block.=$user_block;
					$day_block.=$user_block_head;
					$user_block='';
					$start=DateTime::createFromFormat($format,$trn_date);
				}
				
				$user_block.= '<tr><td>'.$counter.'</td><td>'.$trn_time.'</td><td>'.$sap_code.'</td><td>'.$area.'</td><td>'.$tr_desc.'</td><td>'.$msg.'</td></tr>';
			
			$last_id=$user_id;
			$last_date=DateTime::createFromFormat($format,$trn_date);
			$counter+=1;
			//if ($counter>1000)break;
			
		}
		$interval = $start->diff($last_date);
						$total_time=$interval->format('%H : %I :%S');
						$day_block.=' Total time: '.$total_time.'</td></tr>';
		$day_block.=$user_block;
		// Top of the table
		
		$content.= '<h2 class="ml-3 mr-1 mt-3">Активность пользователей за сутки  </h2>';
		$content.= '<div class="">';
		$content.= '<table class="table table-striped table-hover table-sm ml-3 mr-1 mt-1">';
		$content.= '<thead>';
		$content.= '<tr><th>#</th><th>Время</th><th>Транзакция</th><th>Функц.область</th><th>Описание</th><th>Сообщение</th>
					</tr>';
		$content.= '<tbody>';
		$content.= $day_block;
		$content.= '</tbody>';
		$content.= '</table>';
		$content.= '</div>';
	Show_page($content);
	mysqli_close($db_server);
	
?>
	