 <?php 
/*
 VIEW FOR COST TYPES 
	
	OUTPUT:  HTML TABLE
	02/07/18
	(c) 2018 TGC-1 project
*/
	require_once 'login_tgc1.php';
	include ("header.php"); 
	
		$id= $_REQUEST['shpz'];
		$pc_id= $_REQUEST['pc'];// PROFIT CENTER
		//$pc.="%";
		//var_dump($_REQUEST);
		$content="";
		$image_path='/TGC1/src/AIRLINE.jpg';
		//Set up mySQL connection
			$db_server = mysqli_connect($db_hostname, $db_username,$db_password);
			$db_server->set_charset("utf8");
			If (!$db_server) die("Can not connect to a database!!".mysqli_connect_error($db_server));
			mysqli_select_db($db_server,$db_database)or die(mysqli_error($db_server));
		
			$check_in_mysql='SELECT cost.code,cost.description,account.code,account.description,pfm.code,pfm.description,pfm.id,
									fin_pos.code,fin_pos.short_desc,fin_pos.id, cost_center.code,cost_center.short_desc,cost.id
							FROM account
							LEFT JOIN costs_by_acc ON costs_by_acc.account_id=account.id
							LEFT JOIN cost ON costs_by_acc.cost_id=cost.id
							LEFT JOIN pfm_by_acc ON (costs_by_acc.cost_id=pfm_by_acc.cost_id )
							LEFT JOIN pfm ON (pfm_by_acc.pfm_id=pfm.id )
							LEFT JOIN mm_fp_material ON costs_by_acc.cost_id=mm_fp_material.cost_id
							LEFT JOIN fin_pos ON mm_fp_material.fp_id=fin_pos.id
							LEFT JOIN bpcj ON ( bpcj.fp_id=fin_pos.id AND bpcj.pfm_id=pfm.id )
							LEFT JOIN budget_matrix ON costs_by_acc.cost_id=budget_matrix.cost_id
							LEFT JOIN cost_center ON budget_matrix.cc_id=cost_center.id 
							WHERE account.id="'.$id.'"  AND account.isValid AND (pfm_by_acc.cc_id IN (SELECT cc_pc.cc_id FROM cc_pc WHERE cc_pc.pc_id="'.$pc_id.'"))  
							ORDER BY cost.id,pfm.id,fin_pos.id,cost_center.id';
					
					$answsqlcheck=mysqli_query($db_server,$check_in_mysql);
					if(!$answsqlcheck) die("LOOKUP into user TABLE failed: ".mysqli_error($db_server));
		$row = mysqli_fetch_row( $answsqlcheck );
		
				$cost_code=$row[0];
				$cost_desc=$row[1];
				$cost_id=$row[12];
				$shpz_code=$row[2];
				$shpz_desc=$row[3];
				$pfm_code=$row[4];
				$pfm_desc=$row[5];
				$pfm_id=$row[6];
				$fp_code=$row[7];
				$fp_desc=$row[8];
				$fp_id=$row[9];
				$cost_c_code=$row[10];
				$cost_c_desc=$row[11];
				
		if(!$row)
		{
			$content.= '<div class="alert alert-primary mt-5 ml-5 mr-5" role="alert">ПО ВАШЕМУ ЗАПРОСУ В БАЗЕ ДАННЫХ ЗАПИСЕЙ НЕ ОБНАРУЖЕНО!</div>';
		}
		else
		{
	// Top of the table
			$content.= '<div class="row">
						<div class="col-sm-8">';
			$content.= '<div class="card mt-3 ml-3"  style="max-width: 88rem;">
						<div class="card-header"><h5 class="card-title"> # ШПЗ : '.$shpz_code.' | '.$shpz_desc.' </h5>
						Вид затрат: '.$cost_code.' - '.$cost_desc.'<br/>
						<small>Фин.позиция: '.$fp_code.' | '.$fp_desc.'</small></div>';
			$content.= '<div class="card-body">';					
			$content.= '<ul class="list-group list-group-flush">';
				
				$pfm_message='<li class="list-group-item"> ПФМ: '.$pfm_code.' - '.$pfm_desc.' | <br/> МВЗ: <br/>';
				//$c_c_c_message=$cost_c_code.' - '.$cost_c_desc.'<br/>';
				$content.= $pfm_message;
				if((strlen($cost_c_code)>0)||(strlen($cost_c_desc)>0))
							{
								$content.='<small>'.$cost_c_code.' - '.$cost_c_desc.'</small><br/>';
								$count=1;
							}
				else $count=0;
				$head_flag=1; //LIST OPEN
				$new_card=0;
				while($row = mysqli_fetch_row( $answsqlcheck ))
				{
					if($cost_id!=$row[12]) //NEW CARD
					{
						// CLOSE LAST LINE
						if($count&&((strlen($cost_c_code)>0)||(strlen($cost_c_desc)>0))) $content.= ' 
									 Итого: '.$count.'</li>';
						$content.= '</ul>';	//LIST
						$content.= '</div>';//BODY
						$content.= '</div>';//CARD
						$cost_code=$row[0];
						$cost_desc=$row[1];
						$cost_id=$row[12];
						$shpz_code=$row[2];
						$shpz_desc=$row[3];
						$pfm_code=$row[4];
						$pfm_desc=$row[5];
						$pfm_id=$row[6];
						$fp_code=$row[7];
						$fp_desc=$row[8];
						$fp_id=$row[9];
						$content.= '<div class="row">
						<div class="col-sm-8">';
						$content.= '<div class="card mt-3 ml-3"  style="max-width: 88rem;">
						<div class="card-header"><h5 class="card-title"> # ШПЗ : '.$shpz_code.' | '.$shpz_desc.' </h5>
						Вид затрат: '.$cost_code.' - '.$cost_desc.'<br/>
						<small>Фин.позиция: '.$fp_code.' | '.$fp_desc.'</small></div>';
						$content.= '<div class="card-body">';					
						$content.= '<ul class="list-group list-group-flush">';
						$new_card=1;
					}
						if(($pfm_id!=$row[6])||($new_card)) // FINISH THE CYCLE: PRINT THE MESSAGE
						{
							if ($head_flag) 
							{	
								$content.= ' 
									 Итого: '.$count.'</li>';
								$head_flag=0;
							}
							$pfm_code=$row[4];
							$pfm_desc=$row[5];
							$pfm_id=$row[6];
							$content.='<li class="list-group-item"> ПФМ: '.$pfm_code.' - '.$pfm_desc.' | <br/> МВЗ: <br/>';
							$count=0;	
							$new_card=0;
							$c_c_c_message='';	
						}
						if (($cost_c_code!=$row[10])||(!$count)) // ADD STRING TO THE Cost Centers MESSAGE
						{	
							$cost_c_code=trim($row[10]);
							$cost_c_desc=trim($row[11]);
							if((strlen($cost_c_code)>0)||(strlen($cost_c_desc)>0))
							{
								$content.='<small>'.$cost_c_code.' - '.$cost_c_desc.'</small><br/>';
								$count+=1;
							}
						}	
					
				} // END OF CYCLE
			
			// PROCESS LAST LINE
			 if($count) $content.= ' 
									 Итого: '.$count.'</li>';
			$content.= '</ul>';	
			$content.= '</div>';//BODY
			$content.= '</div>';//CARD
			$content.= '</div>'; //COLUMN END
			$content.= '</div>'; //ROW END
		}
	Show_page($content);
	mysqli_close($db_server);
	
?>
	