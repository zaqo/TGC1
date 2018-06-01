<?php
/*
	FORM: search user records in the activity_log

	by S.Pavlov (c) 26/05/2018	
*/
include ("login_tgc1.php"); 
include ("header.php"); 

//if(!$loggedin) echo "<script>window.location.replace('/.../login.php');</script>";
?>
<html lang="ru">

	<div class="container mt-5">
		
		
		<h4 class="mb-3">Поиск:</h4>
		
			<form class=" mt-5" id="inlineForm" method="post" action="show_trn_by_date.php">
			<div class="form-row">
				<div class="col mb-2">
					
						<label  class="form-check-label" for="who">Пользователь:</label>
						<input type="text" class="form-control mb-2 mr-sm-2 livesearch_input" id="who" value="" name="who" autocomplete="off" onkeyup="showResult(this.value);" onclick="event.cancelBubble=true;" >
						<input type="hidden"  id="who_real" value="" name="who_real" >
						<ul  id="livesearch" class="inline search_result"></ul>
					
				</div >
				<div class="col mb-2">
					
						<label class="form-check-label" for="inlineFormInput">Дата:</label>
						<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInput" value="" name="from" onfocus="this.select();lcs(this)"
												onclick="event.cancelBubble=true;this.select();lcs(this)" >
					
				</div>
				
				
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary btn-lg " >ВВОД</button>
					</div>
				</div>
			</form>
		
	</div>
</html>