<?php
/*
	FORM: search user profiles in the profile_reg

	by S.Pavlov (c) 24/06/2018	
*/
include ("login_tgc1.php"); 
include ("header.php"); 

//if(!$loggedin) echo "<script>window.location.replace('/.../login.php');</script>";
?>
<html lang="ru">

	<div class="container mt-5">
		
		
		<h4 class="mb-3">Права доступа:</h4>
		
		<form class=" mt-5" id="inlineForm" method="post" action="show_profiles_by_user.php">
			<div class="form-row">		
						<label  class="form-check-label" for="who">Фамилия:</label>
						<input type="text" class="form-control mb-2 mr-sm-2 livesearch_input" id="who" value="" name="who" autocomplete="off" onkeyup="showResult(this.value);" onclick="event.cancelBubble=true;" >
						<input type="hidden"  id="who_real" value="" name="who_real" >
						<ul  id="livesearch" class="inline search_result"></ul>
					
			</div >
					
					
			<button type="submit" class="btn btn-primary btn-lg " >ВВОД</button>		
		</form>
		
	</div>
</html>