 <?php require_once 'login_tgc1.php';
/*
 VIEW FOR COST TYPES 
	
	OUTPUT:  HTML TABLE
	02/07/18
	(c) 2018 TGC-1 project
*/
	include ("header.php"); 
	
		$id= $_REQUEST['shpz'];
		//$pc= $_REQUEST['pc'];// PROFIT CENTER
		//$pc.="%";
		//var_dump($pc);
		$content="";
		$image_path='/TGC1/src/AIRLINE.jpg';
		//Set up mySQL connection
			$db_server = mysqli_connect($db_hostname, $db_username,$db_password);
			$db_server->set_charset("utf8");
			If (!$db_server) die("Can not connect to a database!!".mysqli_connect_error($db_server));
			mysqli_select_db($db_server,$db_database)or die(mysqli_error($db_server));
		
			$check_in_mysql='SELECT cost.code,cost.description,account.code,account.description,pfm.code,pfm.description,pfm.id,
									fin_pos.code,fin_pos.short_desc,fin_pos.id, cost_center.code,cost_center.short_desc
							FROM cost
							LEFT JOIN costs_by_acc ON costs_by_acc.cost_id=cost.id
							LEFT JOIN account ON costs_by_acc.account_id=account.id
							LEFT JOIN pfm_by_acc ON costs_by_acc.cost_id=pfm_by_acc.cost_id
							LEFT JOIN pfm ON pfm_by_acc.pfm_id=pfm.id 
							LEFT JOIN mm_fp_material ON costs_by_acc.cost_id=mm_fp_material.cost_id
							LEFT JOIN fin_pos ON mm_fp_material.fp_id=fin_pos.id
							LEFT JOIN bpcj ON ( bpcj.fp_id=fin_pos.id AND bpcj.pfm_id=pfm.id )
							LEFT JOIN budget_matrix ON costs_by_acc.cost_id=budget_matrix.cost_id
							LEFT JOIN cost_center ON budget_matrix.cc_id=cost_center.id
							WHERE (costs_by_acc.account_id="'.$id.'"  AND costs_by_acc.isValid)
							ORDER BY cost.id,pfm.id,fin_pos.id,cost_center.id';
					
					$answsqlcheck=mysqli_query($db_server,$check_in_mysql);
					if(!$answsqlcheck) die("LOOKUP into user TABLE failed: ".mysqli_error($db_server));
		$row = mysqli_fetch_row( $answsqlcheck );
		
				$code=$row[0];
				$cost_desc=$row[1];
				$shpz_code=$row[2];
				$shpz_desc=$row[3];
				$pfm_code=$row[4];
				$pfm_desc=$row[5];
				$pfm_id=$row[6];
				$fp_code=$row[7];
				$fp_desc=$row[8];
				$cost_c_code=$row[10];
				$desc=$row[11];
				

	// Top of the table
		$content.= '<div class="row">
						<div class="col-sm-8">';
		$content.= '<div class="card mt-3 ml-3"  style="max-width: 88rem;">
						<div class="card-header"><h5 class="card-title"> # ШПЗ : '.$shpz_code.' | '.$shpz_desc.' </h5>
						Вид затрат: '.$code.' - '.$cost_desc.'
						<small>Фин.позиция: '.$fp_code.' | '.$fp_desc.'</small></div>';
		$content.= '<div class="card-body">';					
			$content.= '<ul class="list-group list-group-flush">';
				$pfm_id_old=0;
				$c_c_c_old=$cost_c_code;
				$c_c_c_message='';
				$count=0;
				while($row = mysqli_fetch_row( $answsqlcheck ))
				{
						
						//$desc="*";
					if($pfm_id!=$row[6])
					{
						$content.= '<li class="list-group-item"> ПФМ: '.$pfm_code.' - '.$pfm_desc.' | <br/><small> МВЗ: <br/>'.$c_c_c_message.' 
									 Итого: '.$count.'</small></li>';
						$count=0;	
						$c_c_c_message='';		
					}
					$code=$row[0];
					$cost_desc=$row[1];
					$pfm_code=$row[4];
					$pfm_desc=$row[5];
					$pfm_id_old=$pfm_id;
					$pfm_id=$row[6];
					$fp_code=$row[7];
					$fp_desc=$row[8];
					
					if ($c_c_c_old!=$row[10]) 
					{	
						$c_c_c_message.=$c_c_c_old.' - '.$desc.'<br/>';
						$desc=$row[11];
						$c_c_c_old=$row[10];
						$count+=1;
					}	
				}
			if($pfm_id!=$pfm_id_old)	
				$content.= '<li class="list-group-item"> ПФМ: '.$pfm_code.' - '
							.$pfm_desc.' </small></li>';
			$content.= '</ul>';	
		$content.= '</div>';//BODY
		$content.= '</div>';//CARD
		$content.= '</div>'; //COLUMN END
		
		//$content.=$content_d;
		
		$content.= '</div>'; //ROW END
	Show_page($content);
	mysqli_close($db_server);
	
?>
	