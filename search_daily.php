<?php
/*
	FORM: search user records in the activity_log

	by S.Pavlov (c) 26/05/2018	
*/
include ("login_tgc1.php"); 
include ("header.php"); 
//if(!$loggedin) echo "<script>window.location.replace('/Agents/login.php');</script>";
?>
<html lang="ru">
	
	 
<script src="/avia/js/calender.js" type="text/javascript"></script>

	<div class="container mt-5">
		<div class="col-md-8 order-md-1">
		
		<h4 class="mb-3">Поиск:</h4>
		
			<form class="form-inline mt-5" id="inlineForm" method="post" action="show_trn_by_date.php">
				<div class="mb-2">
					<div class="form-check">
						<input type="text" class="form-control mb-2 mr-sm-2 livesearch_input" id="who" value="" name="who" autocomplete="off" onkeyup="showResult(this.value);this.select();" onclick="event.cancelBubble=true;" >
						<input type="hidden"  id="who_real" value="" name="who_real" >
						<label  class="form-check-label" for="who">Пользователь</label>
						<ul id="livesearch" class="search_result"></ul>
					</div>
				</div >
				<div class="mb-2">
					<div class="form-check">
						<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInput" value="" name="from" onfocus="this.select();lcs(this)"
												onclick="event.cancelBubble=true;this.select();lcs(this)" required/>
						<label class="form-check-label" for="inlineFormInput">Дата</label>
					</div>
				</div>
				<hr class="mb-4">
				<button type="submit" class="btn btn-primary btn-lg " >ВВОД</button>
		
			</form>
		</div>
	</div>
</html>