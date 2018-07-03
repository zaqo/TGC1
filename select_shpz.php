<?php
/*
	FORM: search user profiles in the profile_reg

	by S.Pavlov (c) 02/07/2018	
*/
include ("login_tgc1.php"); 
include ("header.php"); 

//if(!$loggedin) echo "<script>window.location.replace('/.../login.php');</script>";

$select='<SELECT name="shpz" id="shpz" class="form-control" required/>';
$select.='<option selected value="" disabled /> ..выберите.. </option>';
$db_server = mysqli_connect($db_hostname, $db_username,$db_password);
			$db_server->set_charset("utf8");
			If (!$db_server) die("Can not connect to a database!!".mysqli_connect_error($db_server));
			mysqli_select_db($db_server,$db_database)or die(mysqli_error($db_server));
		
			$check_in_mysql='SELECT id,code,description
							FROM account
							WHERE 1 ORDER BY code';
					
					$answsql=mysqli_query($db_server,$check_in_mysql);
					if(!$answsql) die("LOOKUP into user TABLE failed: ".mysqli_error($db_server));
			while($row=mysqli_fetch_row($answsql))
			{
				$desc_abb=mb_substr($row[2],0,50,$enc=mb_internal_encoding());
				$select.='<option value="'.$row[0].'">'.$row[1].' | '.$desc_abb.'</option>';
			}
			$select.='</select>';
			//PROFIT CENTER SELECT
			$select_pc='<SELECT name="pc" id="pc" class="form-control" >';
			$select_pc.='<option selected value="" disabled /> ..выберите.. </option>';
			$check_pc='SELECT code, short_desc, id
							FROM profit_center
							WHERE 1';
					
					$answsql1=mysqli_query($db_server,$check_pc);
					if(!$answsql1) die("LOOKUP into profit_center TABLE failed: ".mysqli_error($db_server));
			while($row=mysqli_fetch_row($answsql1))
			{
				//$desc_abb=mb_substr($row[2],0,50,$enc=mb_internal_encoding());
				$select_pc.='<option value="'.$row[2].'">'.$row[0].' | '.$row[1].'</option>';
			}
			$select_pc.='</select>';
?>
<html lang="ru">

	<div class="container mt-5">
		
		
		<h4 class="mb-3">Моделирование Отнесения Затрат:</h4>
		
		<form class=" mt-5" id="inlineForm" method="post" action="model_shpz.php">
			<div class="form-row">		
						<label  class="form-check-label" for="shpz">Шифр Производственных Затрат:</label>
						<?php echo $select;?>
					
			</div >
			<div class="form-row">		
						<label  class="form-check-label" for="pc">МВП:</label>
						<?php echo $select_pc;?>
					
			</div >		
					
			<button type="submit" class="btn btn-primary btn-lg mt-2" >ВВОД</button>		
		</form>
		
	</div>
</html>