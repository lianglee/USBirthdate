//<script>
Ossn.register_callback('ossn', 'init', 'us_birthdate_main_js');
function us_birthdate_main_js(){
	$(document).ready(function(){
		 if($('.ossn-profile-bottom').length){
				inp = $('input[name="birthdate"]').val();
				sp  = inp.split('/');
				nd  = sp[1]+'/'+sp[0]+'/'+sp[2];
				$('input[name="birthdate"]').val(nd);
		 }
	});
}