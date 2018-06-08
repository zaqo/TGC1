<?php require_once 'login_tgc1.php';
/*
SHOWS A LIST OF SAP ERP TRANSACTIONS
INPUT: table transactions
*/
include ("header.php"); 
	
		
		$content="";
		//Set up mySQL connection
			$db_server = mysqli_connect($db_hostname, $db_username,$db_password);
			$db_server->set_charset("utf8");
			If (!$db_server) die("Can not connect to a database!!".mysqli_connect_error($db_server));
			mysqli_select_db($db_server,$db_database)or die(mysqli_error($db_server));
		
			$check_in_mysql="SELECT transactions.id,transactions.code,transactions.description,func_area.description
							FROM transactions
							LEFT JOIN func_area ON transactions.area=func_area.id
							WHERE 1
							ORDER by transactions.id ";
					
					$answsqlcheck=mysqli_query($db_server,$check_in_mysql);
					if(!$answsqlcheck) die("LOOKUP into services TABLE failed: ".mysqli_error($db_server));
		// Top of the table
		
		$content.= '<h2>SAP ERP список транзакций</h2>';
		$content.= '<div class="">';
		$content.= '<table class="table table-striped table-hover table-sm ml-3 mr-1 mt-1">';
		$content.= '<thead>';
		$content.= '<tr><th>№</th><th>Код</th><th>Описание</th><th>Функц.область</th>
					</tr>';
		$content.= '<tbody>';
		// Iterating through the array
		$counter=1;
		$rec_prev=0;
		$isFirst=1;
		while( $row = mysqli_fetch_row( $answsqlcheck ))  
		{ 
				$rec_id=$row[0];
				
				$code=$row[1];
				$dsc=$row[2];
				$f_area=$row[3];
				
				$content.= '<tr><td>'.$counter.'</td><td>'.$code.'</td><td>'.$dsc.'</td><td>'.$f_area.'</td></tr>';
				
			$counter+=1;
			
		}
		
		$content.= '</tbody>';
		$content.= '</table>';
		$content.= '</div>';
	Show_page($content);
	mysqli_close($db_server);
	
?>
	