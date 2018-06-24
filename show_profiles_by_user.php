<?php require_once 'login_tgc1.php';
/* 
	VIEW FOR USERS & RELATED PROFILES 
	
	OUTPUT:  HTML TABLE
	(c) 2018 TGC-1 project
*/
include ("header.php"); 
set_time_limit(0);	
		//var_dump($_REQUEST);
		$who=$_REQUEST['who_real'];
		if (!$who) echo '<script>history.go(-1)</script>';// USER ID ONLY, NO text search!
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
							WHERE user.id=".$who;
					
					$answsqlcheck=mysqli_query($db_server,$check_in_mysql);
					if(!$answsqlcheck) die("LOOKUP into services TABLE failed: ".mysqli_error($db_server));
		// Top of the table
		$row = mysqli_fetch_row( $answsqlcheck );
		$content_tail='';
		$name=$row[1];
		$surname=$row[2];
		$fname=$row[3];
		$sap_id=$row[4];
		$email=$row[5];
		$content.= '<h2 class="ml-3 mr-1 mt-3">Перечень ролей для: '.$surname.' '.$name.' '.$fname.'</h2>';
		$content_tail.='<tr><td >1</td><td>'.$row[6].'</td><td colspan="4">'.$row[7].'</td></tr>';
		$content.= '<div class="">';
		$content.= '<table class="table table-hover table-sm ml-3 mr-1 mt-1">';
		$content.= '<thead class="thead-light">';
		$content.= '<tr><th>№</th><th>Код роли</th><th>Назначение</th>
					</tr></thead>';
		$content.= '<tbody>';
		// Iterating through the array
		$counter=2;
		
		while( $row = mysqli_fetch_row( $answsqlcheck ))  
		{ 
				
			$content_tail.='<tr><td >'.$counter.'</td><td>'.$row[6].'</td><td colspan="4">'.$row[7].'</td></tr>';
			$counter+=1;
		}
		$content.=$content_tail;
		$content.= '</tbody>';
		$content.= '</table>';
		$content.= '</div>';
	Show_page($content);
	mysqli_close($db_server);

?>
	