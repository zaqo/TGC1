<?php require_once 'login_tgc1.php';

include ("header.php"); 
	
		
		$content="";
		//Set up mySQL connection
			$db_server = mysqli_connect($db_hostname, $db_username,$db_password);
			$db_server->set_charset("utf8");
			If (!$db_server) die("Can not connect to a database!!".mysqli_connect_error($db_server));
			mysqli_select_db($db_server,$db_database)or die(mysqli_error($db_server));
		
			$check_in_mysql="SELECT user.id,user.name,user.surname,user.father_name,sap.sap_id,user.email
							FROM user
							LEFT JOIN sap ON sap.user_id=user.id
							WHERE 1
							ORDER by user.id ";
					
					$answsqlcheck=mysqli_query($db_server,$check_in_mysql);
					if(!$answsqlcheck) die("LOOKUP into services TABLE failed: ".mysqli_error($db_server));
		// Top of the table
		
		$content.= '<h2>Перечень Пользователей</h2>';
		$content.= '<div class="">';
		$content.= '<table class="table table-striped table-hover table-sm ml-3 mr-1 mt-1">';
		$content.= '<thead>';
		$content.= '<tr><th>ID</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>UserID</th><th>email</th>
					</tr>';
		$content.= '<tbody>';
		// Iterating through the array
		$counter=1;
		$rec_prev=0;
		$isFirst=1;
		while( $row = mysqli_fetch_row( $answsqlcheck ))  
		{ 
				$rec_id=$row[0];
				
				$name=$row[1];
				$surname=$row[2];
				$fname=$row[3];
				$sap_id=$row[4];
				$email=$row[5];
				$content.= '<tr><td>'.$rec_id.'</td><td>'.$surname.'</td><td>'.$name.'</td><td>'.$fname.'</td><td>'.$sap_id.'</td><td>'.$email.'</td></tr>';
				
			$counter+=1;
			
		}
		
		$content.= '</tbody>';
		$content.= '</table>';
		$content.= '</div>';
	Show_page($content);
	mysqli_close($db_server);
	
?>
	