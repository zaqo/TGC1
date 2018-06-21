 <?php require_once 'login_tgc1.php';
/*
 VIEW FOR USER CARD 
	
	OUTPUT:  HTML TABLE
	(c) 2018 TGC-1 project
*/
	include ("header.php"); 
	
		$id= $_REQUEST['id'];
		$content="";
		$image_path='/TGC1/src/AIRLINE.jpg';
		//Set up mySQL connection
			$db_server = mysqli_connect($db_hostname, $db_username,$db_password);
			$db_server->set_charset("utf8");
			If (!$db_server) die("Can not connect to a database!!".mysqli_connect_error($db_server));
			mysqli_select_db($db_server,$db_database)or die(mysqli_error($db_server));
		
			$check_in_mysql='SELECT user.name,user.surname,user.father_name,sap.sap_id,user.email,profile.name,profile.description
							FROM user
							LEFT JOIN sap ON sap.user_id=user.id
							LEFT JOIN profile_reg ON sap.user_id=profile_reg.user_id
							LEFT JOIN profile ON profile.id=profile_reg.profile_id
							WHERE user.id="'.$id.'"';
					
					$answsqlcheck=mysqli_query($db_server,$check_in_mysql);
					if(!$answsqlcheck) die("LOOKUP into user TABLE failed: ".mysqli_error($db_server));
		$row = mysqli_fetch_row( $answsqlcheck );
		
				$name=$row[0];
				$surname=$row[1];
				$fname=$row[2];
				$sap_id=$row[3];
				$email=$row[4];
				$pr_name=$row[5];
				$pr_desc=$row[6];
				
		  //=====================================//
		 //			PROFILES SECTION			//
		//-------------------------------------//
		
		$check_profiles='SELECT profile.name,profile.description
							FROM profile_reg 
							LEFT JOIN profile ON profile.id=profile_reg.profile_id
							WHERE profile_reg.user_id='.$id.' AND profile.isValid=1';
		//echo 	$check_discounts.'<br/>';		
					$answsqlprof=mysqli_query($db_server,$check_profiles);
					if(!$answsqlprof) die("LOOKUP into profile_reg TABLE failed: ".mysqli_error($db_server));
		$content_d= '';
		$content_d.= '<div class="col-sm-6">';
		$content_d.= '<div class="card mt-5 mr-5 border-light" style="max-width: 50rem;" >';
		$content_d.= '<div class="card-body collapse" id="Toggle">';
		

		$counter=1;
		$disc_count=0; // FOR BADGE
		$pro_name='';
		$pro_desc='';
		$content_d.='<ul class="list-group list-group-flush">';
		while($row = mysqli_fetch_row( $answsqlprof))
		{
			//var_dump($row);
			//echo "NEXT STRING <br/>";
			
				$pro_name=$row[0];
				$pro_desc=$row[1];
				$content_d.='<li class="list-group-item">'.$counter.'. <span class="discount">'.$pro_name.'</span>  <br/> '.$pro_desc.'  </li>';
				$counter+=1;
		
		}
		
		$content_d.='</ul>';
		
	
		$content_d.= '</div>';
		$content_d.= '</div>';
		$content_d.= '</div>'; //COLUMN END
			
	// Top of the table
		$content.= '<div class="row">
						<div class="col-sm-6">';
		$content.= '<div class="card mt-3 ml-3"  style="max-width: 28rem;">
						<div class="card-header"><h5 class="card-title"> # '.$id.' | '.$surname.' '.$name.' '.$fname.'</h5></div>';
		$content.= '<div class="card-body">';					
			$content.= '<ul class="list-group list-group-flush">';
				$content.= '<li class="list-group-item">email: '.$email.'</li>';
				$content.= '<li class="list-group-item active">USER ID:   '.$sap_id.'</li>';
				
				$content.= '<li class="list-group-item ">
								<button class="btn list-group-item list-group-item-action d-flex justify-content-between align-items-center" type="button" data-toggle="collapse" data-target="#Toggle" aria-controls="Toggle" aria-expanded="false" aria-label="Info">
									Профили  <span class="badge badge-primary badge-pill">'.($counter-1).'</span>
								</button>
							</li>';
				//$content.= '<li class="list-group-item">Российская а/к:<input type="checkbox" name="isRus" class="form-control" value="1" '.$status_Rus.' disabled/></li>';
				//$content.= '<li class="list-group-item">Базирование:<input type="checkbox" name="isBased" class="form-control" value="1" '.$status_Base.' disabled/></li>';
			$content.= '</ul>';	
		$content.= '</div>';//BODY
		$content.= '</div>';//CARD
		$content.= '</div>'; //COLUMN END
		
		$content.=$content_d;
		
		$content.= '</div>'; //ROW END
	Show_page($content);
	mysqli_close($db_server);
	
?>
	