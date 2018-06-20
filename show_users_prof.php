<?php require_once 'login_tgc1.php';
/* 
	VIEW FOR USERS & RELATED PROFILES 
	
	OUTPUT:  HTML TABLE
	(c) 2018 TGC-1 project
*/
include ("header.php"); 
	
		
		$content="";
		//Set up mySQL connection
			$db_server = mysqli_connect($db_hostname, $db_username,$db_password);
			$db_server->set_charset("utf8");
			If (!$db_server) die("Can not connect to a database!!".mysqli_connect_error($db_server));
			mysqli_select_db($db_server,$db_database)or die(mysqli_error($db_server));
		
			$check_in_mysql="SELECT user.id,user.name,user.surname,user.father_name,sap.sap_id,user.email,profile.name,profile.description
							FROM user
							LEFT JOIN sap ON sap.user_id=user.id
							LEFT JOIN profile_reg ON sap.user_id=profile_reg.user_id
							LEFT JOIN profile ON profile.id=profile_reg.profile_id
							WHERE 1
							ORDER by user.id ";
					
					$answsqlcheck=mysqli_query($db_server,$check_in_mysql);
					if(!$answsqlcheck) die("LOOKUP into services TABLE failed: ".mysqli_error($db_server));
		// Top of the table
		
		$content.= '<h2>Перечень Пользователей</h2>';
		$content.= '<div class="">';
		$content.= '<table class="table table-hover table-sm ml-3 mr-1 mt-1">';
		$content.= '<thead class="thead-light">';
		$content.= '<tr><th>№</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>UserID</th><th>email</th>
					</tr></thead>';
		$content.= '<tbody>';
		// Iterating through the array
		$counter=1;
		$rec_prev=0;
		$isFirst=1;
		$content_tail='';
		$old_rec=0;
		while( $row = mysqli_fetch_row( $answsqlcheck ))  
		{ 
				$rec_id=$row[0];
				if($rec_id==$old_rec)
				{
						$content_tail.='<tr><td ></td><td>'.$row[6].'</td><td colspan="4">'.$row[7].'</td></tr>';
						
				}	
				else
				{
					$name=$row[1];
					$surname=$row[2];
					$fname=$row[3];
					$sap_id=$row[4];
					$email=$row[5];
					$content.=$content_tail;
					//$content.='<thead >';
					$content.= '<tr  class="table-dark"><th scope="col">'.$counter.'</th><th scope="col">'.$surname.'</th><th scope="col">'.$name.'</th><th scope="col">'.$fname.'</th><th scope="col">'.$sap_id.'</th><th scope="col">'.$email.'</th></tr>';
					//$content.='<thead>';
					$content_tail='';
					$counter+=1;
				}
			$old_rec=$rec_id;
		}
		
		$content.= '</tbody>';
		$content.= '</table>';
		$content.= '</div>';
	Show_page($content);
	mysqli_close($db_server);
	
?>
	